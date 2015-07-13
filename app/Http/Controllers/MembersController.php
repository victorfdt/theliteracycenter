<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use File;

use App\Member;

class MembersController extends Controller
{

    private $member;

    public function __construct()
    {
        //See if the there is an authenticated user
        $this->middleware('auth');

        //Check if this user is a admin
        $this->middleware('admin');

        $this->member = new Member();  
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Return all the results
        $members = $this->member->orderBy('type', 'asc')->get();

        //Passing the Role to use its constants
        return view('admin.member.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $member = $this->member;
        return view('admin.member.create', compact('member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(MemberRequest $request)
    {
        //If the order of this image have already been setted,
        //move the order of others members one step forward
        $type = $request->input('type');
        $order = $request->input('order');

        $this->adjustImagesOrder($type, $order);

        //Creating the new member
        $member = $this->member->create($request->all());

        //Moves and sets the uploaded image
        $this->uploadImage($request, $member); 

        //Saving
        $member->save();

        //Sending the user to the accounts page
        return redirect()->route('member/index');
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
        $member = $this->member->find($id);
        return view('admin.member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, MemberRequest $request)
    {
        //If the order of this image have already been used,
        //move the order of others images one step forward
        $type = $request->input('type');
        $order = $request->input('order');

        $this->adjustImagesOrder($type, $order);

        //Fill the member with the new form fields
        $member = $this->member->find($id);
        $member->fill($request->all());
        
        //Checking if there was uploaded a image
        if ($request->file('image') != null) {
            
            //Delete the old member image from the filesystem
            File::delete($member->path);

            //Moves and sets the new uploaded image
            $this->uploadImage($request, $member);            
        }        
        
        $member->save();


        //Sending the user to the accounts page
        return redirect()->route('member/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $member = $this->member->find($id);
        

        //Moving the order of all images of sted backward
        $members = $member->where('type', $member->type)->where('order','>', $member->order)->get();            
        foreach ($members as $member) {

            $member->order = $member->order - 1;
            $member->save();
        }            

        //Delete the member image on the filesystem
        File::delete($member->path);

        //Delete the image from the database
        $member->delete();
        
        
        //Sending the user to the accounts page
        return redirect()->route('member/index');
    }

    /*
    Move all images' order one step forward if the parameterized is already used
    */
    public function adjustImagesOrder($type, $order){
        $members = Member::where('type', $type)->where('order','>=', $order)->get();  

        foreach ($members as $member) {

            $member->order = $member->order + 1;
            $member->save();
        }
    }

    /*
    Gets the image uploaded from the form, and moves it to the directory.
    */
    public function uploadImage($request, $image){
        //Getting the upload image
        
        //There is a erro on the upload image, show message error
        if($request->file('image')->getError() == 1 && $request->file('image')->getClientSize() == 0){
            
            //Set the message and the error class
            Session::flash('message', 'The can not exceed 2MB!'); 
            Session::flash('alert-class', 'alert-danger');
        } else {
            dd(false);
        }

        $imageName = $request->input('name') . '.' . $request->file('image')->getClientOriginalExtension();
       
        //Moving the image to the folder, and getting the path
        $request->file('image')->move(base_path() . '/public/' . Member::DIRECTORY, $imageName);
        $imagePath = Member::DIRECTORY . '/' . $imageName;

        //Setting the path
        $image->path = $imagePath;
    }
}
