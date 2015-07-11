<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use File;
use Session;

use App\Banner;

class BannersController extends Controller
{

    private $banner;

    public function __construct()
    {
        //See if the there is an authenticated user
        $this->middleware('auth');

        //Check if this user is a admin
        $this->middleware('admin');

        $this->banner = new Banner();        
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Return all the results
        $banner = $this->banner->get();

        //Passing the Role to use its constants
        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $banner = $this->banner;
        return view('admin.banner.create', compact('banner'));
    }

    /*
        Gets the image uploaded from the form, and moves it to the directory.
    */
    public function uploadImage($request, $banner){
    //Getting the upload image
        $imageName = $request->input('name') . '.' . $request->file('image')->getClientOriginalExtension();
        
    //Moving the image to the folder, and getting the path
        $request->file('image')->move(base_path() . '/public/images/upload/banner', $imageName);
        $bannerPath = 'images/upload/banner'. '/' . $imageName;
        
    //Setting the path
        $banner->path = $bannerPath;
    }

    /*
        Move all banners' order forward if the parameterized order match
    */
        public function adjustBannersOrder($type, $order){
            $banners = Banner::where('type', $type)->where('order','>=', $order)->get();  
            
            foreach ($banners as $image) {

                $image->order = $image->order + 1;
                $image->save();
            }
        }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(BannerRequest $request)
    {
        //If the order of this banner have been already used,
        //move greater order one step forward
        $type = $request->input('type');
        $order = $request->input('order');

        $this->adjustBannersOrder($type, $order);

        //Creating the new banner image
        $banner = $this->banner->create($request->all());
        $banner->active = true;

        //Moves and sets the uploaded image
        $this->uploadImage($request, $banner); 

        //Saving
        $banner->save();

        //Sending the user to the accounts page
        return redirect()->route('banners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $banner = $this->banner->find($id);              
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, BannerRequest $request)
    {
        //If the order of this banner have been already used,
        //move greater order one step forward
        $type = $request->input('type');
        $order = $request->input('order');

        $this->adjustBannersOrder($type, $order);

        //Fill the banner with the new form fields
        $banner = $this->banner->find($id);
        $banner->fill($request->all());

        //Moves and sets the uploaded image
        $this->uploadImage($request, $banner);

        $banner->save();

        //Sending the user to the accounts page
        return redirect()->route('banners.index');
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $banner = $this->banner->find($id);

        //Must be always at least one activate banner of each type     
        if($banner->where('type', $banner->type)->where('active', true)->count() == 1){

            //Set the message and the error class
            Session::flash('message', 'Must be registered at least one activate of this image category!'); 
            Session::flash('alert-class', 'alert-danger');

        } else {

            //Moving the order of all banners of sted backward
            $banners = $banner->where('type', $banner->type)->where('order','>', $banner->order)->get();            
            foreach ($banners as $image) {

                $image->order = $image->order - 1;
                $image->save();
            }            

            //Delete the banner image on the filesystem
            File::delete($banner->path);

            //Delete the banner from the database
            $banner->delete();
        }
        
        //Sending the user to the accounts page
        return redirect()->route('banners.index');
    }

    /* 
        Changes the status of the image
    */
        public function changeStatus($id){
            $banner = $this->banner->find($id);

            //Checking if there is only on active banner of the banner type.
            if($banner->where('type', $banner->type)->where('active', true)->count() == 1){

            //Set the message and the error class
                Session::flash('message', 'You can not deactive the only active button.'); 
                Session::flash('alert-class', 'alert-danger');

            } else {

                //Change the status
                if($banner->active == true){
                    $banner->active = false;
                } else{
                    $banner->active = true;
                }

                //Save the change
                $banner->save();
            }

            //Sending the user to the accounts page
            return redirect()->route('banners.index');
        }    
    }
