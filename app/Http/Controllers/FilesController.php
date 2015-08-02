<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilesRequest;
use App\File;

class FilesController extends Controller
{

    private $file;
   
    public function __construct()
    {        
        //Check if this user is a admin
        $this->middleware('admin', ['except' => ['displayNewsletter', 'displayVolunteer']]);

        $this->file = new File();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function displayNewsletter()
    {
        //Find all File
        $files = File::where('type', File::NEWSLETTER)->get();

        //Send the your to the index page
        return view('pages.newsletter.index', compact('files'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function displayVolunteer()
    {
        //Find all File
        $files = File::where('type', File::VOLUNTEER)->get();

        //Send the your to the index page
        return view('volunteer.file.index', compact('files'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Find all File
        $files = File::orderBy('type', 'asc')->get();

        //Send the your to the index page
        return view('admin.file.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //It is necessary use some constants in the create page
        $file = new File();

        return view('admin.file.create', compact('file'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(FilesRequest $request)
    {
        //Creating the new file with the information from the from
        $file = $this->file->create($request->all());

        //Sending the user to the index page
        return redirect()->route('file/index');
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
        //Finding the file
        $file = File::find($id);

        //Seding the selected file to the edit page
        return view('admin.file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(FilesRequest $request, $id)
    {
        //Finding the file
        $file = File::find($id);

        //Setting the new information from the form
        $file->fill($request->all());

        //Save the changes
        $file->save();

        //Sending the user to the index page
        return redirect()->route('file/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //Finding the file
        $file = File::find($id);

        //Delitting the file
        $file->delete();

        //Sending the user to the index page
        return redirect()->route('file/index');
    }
}
