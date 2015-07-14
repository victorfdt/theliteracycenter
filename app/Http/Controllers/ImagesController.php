<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\ImageHelper;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use File;
use Session;

use App\Image;

class ImagesController extends Controller
{
    private $image;

    private $imageHelper;

    public function __construct()
    {
        //See if the there is an authenticated user
        $this->middleware('auth');

        //Check if this user is a admin
        $this->middleware('admin');

        $this->image = new Image();

        $this->imageHelper = new ImageHelper(); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Return all the results
        $images = $this->image->orderBy('type', 'asc')->orderBy('order', 'asc')->get();

        //Passing the Role to use its constants
        return view('admin.image.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $image = $this->image;
        return view('admin.image.create', compact('image'));
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ImageRequest $request)
    {
        //If the order of this image have already been used,
        //move the order of others images one step forward
        $type = $request->input('type');
        $order = $request->input('order');

        /* 
        Laravel can not handle using the request manager the validation
        of the size image that exceeds the configuration of php.in
        */
        if($this->imageHelper->fileImageSizeExceeded($request->file('image'))){
            //Set the message and the error class
            Session::flash('message', 'The file image can not be greater than 2MB!'); 
            Session::flash('alert-class', 'alert-danger');

            return redirect()->back()
            ->withInput()
            ->withErrors('image');
        }

        $this->imageHelper->adjustOrder($type, $order, $this->image, 'store');

        //Creating the new image
        $image = $this->image->create($request->all());        
        $image->active = true;

        //Moves and sets the uploaded image
        $this->imageHelper->uploadImage($request, $image); 

        //Saving
        $image->save();

        //Sending the user to the accounts page
        return redirect()->route('image/index');
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
        $image = $this->image->find($id);
        return view('admin.image.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ImageRequest $request)
    {
        //If the order of this image have already been used,
        //move the order of others images one step forward
        $type = $request->input('type');
        $order = $request->input('order');

        /* 
        Laravel can not handle using the request manager the validation
        of the size image that exceeds the configuration of php.in
        */
        if($this->imageHelper->fileImageSizeExceeded($request->file('image'))){
            //Set the message and the error class
            Session::flash('message', 'The file image can not be greater than 2MB!'); 
            Session::flash('alert-class', 'alert-danger');

            return redirect()->back();
        }

        //Find the image
        $image = $this->image->find($id);

        //If the admin changed the member order, so it is necessary adjust the others members.
        if($image->order != $request->input('order')){
            $this->imageHelper->adjustOrder($type, $order, $this->image, 'update');
        }

        //Fill the image with the new form fields
        $image->fill($request->all());
        
        //Checking if there was uploaded a image
        if ($request->file('image') != null) {

            //Delete the old image from the filesystem
            File::delete($image->path);

            //Moves and sets the new uploaded image
            $this->imageHelper->uploadImage($request, $image);          
        }        
        
        $image->save();

        //Sending the user to the accounts page
        return redirect()->route('image/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        $image = $this->image->find($id);

        //Must be always at least one activate image of each type     
        if($image->where('type', $image->type)->where('active', true)->count() == 1){

            //Set the message and the error class
            Session::flash('message', 'Must be registered at least one activate of this image category!'); 
            Session::flash('alert-class', 'alert-danger');

        } else {

            //Adjust the order of the images when delete this oe.
            $this->imageHelper->adjustOrder($image->type, $image->order, $image, 'destroy');

            //Delete the image on the filesystem
            File::delete($image->path);

            //Delete the image from the database
            $image->delete();
        }
        
        //Sending the user to the accounts page
        return redirect()->route('image/index');
    }    

    /* 
    Changes the status of the image
    */
    public function changeStatus($id){
        $image = $this->image->find($id);


        //Checking if there is only one active image of the image type.
        if($image->where('type', $image->type)->where('active', true)->where('id', $image->id)->count() == 1){

            //Set the message and the error class
            Session::flash('message', 'You can not deactive the only active image of this category.'); 
            Session::flash('alert-class', 'alert-danger');

        } else {

            //Change the status
            if($image->active == true){
                $image->active = false;
            } else{
                $image->active = true;
            }

            //Save the change
            $image->save();
        }

        //Sending the user to the accounts page
        return redirect()->route('image/index');
    }
}
