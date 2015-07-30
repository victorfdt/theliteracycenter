<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\ImageHelper;
use App\Http\Requests\IndexPageRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\IndexPage;
use Carbon\Carbon;
use File;
use Session;
use Validator;

class IndexPageController extends Controller
{

    private $indexPage;

    //Helps to order, upload and manage images;
    private $imageHelper;

    public function __construct()
    {        
        //Check if this user is a admin
        $this->middleware('admin', ['except' => ['displayPosts']]);

        $this->indexPage = new IndexPage();

        $this->imageHelper = new ImageHelper();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function displayPosts()
    {
        //Find 3 most recent and online posts and pass as array.
        $posts = IndexPage::where('status', IndexPage::ONLINE)
                            ->orderBy('created_at', 'desc')
                            ->take(3)->get();


        return view('pages.index', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {            
        $posts = IndexPage::orderBy('created_at', 'desc')->get();
        return view('admin.indexpage.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $post = $this->indexPage;
        return view('admin.indexpage.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(IndexPageRequest $request)
    {
        //Creating the new member
        $post = $this->indexPage->create($request->all());
        $post->status = IndexPage::OFFLINE;

        //Setting the date
        $post->date = Carbon::now()->toFormattedDateString();

        //Moves and sets the uploaded image
        $this->imageHelper->uploadImage($request, $post); 

        //Save
        $post->save();

        //Sending the user to the member page
        return redirect()->route('indexpage/index'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //Find the post
        $post = IndexPage::find($id);

        return view('admin.indexpage.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //Find the post
        $post = IndexPage::find($id);

        return view('admin.indexpage.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(IndexPageRequest $request, $id)
    {
        //Find the post
        $post = IndexPage::find($id);

        $post->fill($request->all());

        //Checking if there was uploaded a image
        if ($request->file('image') != null) {

            //Delete the old post image from the filesystem
            File::delete($post->path);

            //Moves and sets the new uploaded image
            $this->imageHelper->uploadImage($request, $post);            
        }        
        
        $post->save();

        //Sending the user to the accounts page
        return redirect()->route('indexpage/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //Find the post
        $post = IndexPage::find($id);

        //Delete the post image on the filesystem
        File::delete($post->path);

        //Delete the image from the database
        $post->delete();        
        
        //Sending the user to the accounts page
        return redirect()->route('indexpage/index');
    }

    /*
    Change the status of the post 
    */
    public function changeStatus($id){

        $post = IndexPage::find($id);

        //Change the status
        if($post->status == IndexPage::ONLINE){
            $post->status = IndexPage::OFFLINE;
        } else{
            $post->status = IndexPage::ONLINE;
        }

        //Save the change
        $post->save();

        return redirect()->route('indexpage/index');
    }    
}
