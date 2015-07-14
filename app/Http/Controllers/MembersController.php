<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Helpers\ImageHelper;
use App\Http\Requests\MemberRequest;
use File;
use Session;

use App\Member;

class MembersController extends Controller
{

    private $member;

    private $imageHelper;

    public function __construct()
    {
        //See if the there is an authenticated user
        $this->middleware('auth');

        //Check if this user is a admin
        $this->middleware('admin');

        $this->member = new Member();

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
        $members = $this->member->orderBy('type', 'asc')->orderBy('order', 'asc')->get();

        //Passing the Role to use its constants
        return view('admin.member.index', compact('members'));
    }

    public function staff()
    {
        //Find the staff members
        $members = $this->member->where('type', Member::STAFF)->orderBy('order', 'asc')->get();

        return view('pages.about.staff', compact('members'));
    }

    public function boardOfdirector()
    {
        //Find the board directors members
        $members = $this->member->where('type', Member::BOARD_DIRECTOR)->orderBy('order', 'asc')->get();

        return view('pages.about.boardofdirectors', compact('members'));
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

        $this->imageHelper->adjustOrder($type, $order, $this->member, 'store');

        //Creating the new member
        $member = $this->member->create($request->all());

        //Moves and sets the uploaded image
        $this->imageHelper->uploadImage($request, $member); 

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

        //Find the member
        $member = $this->member->find($id);
       
        //If the admin changed the member order, so it is necessary adjust the others members.
        if($member->order != $request->input('order')){
            $this->imageHelper->adjustOrder($type, $order, $this->member, 'update');
        }

        //Fill this member with the new form information
        $member->fill($request->all());        
        
        //Checking if there was uploaded a image
        if ($request->file('image') != null) {

            //Delete the old member image from the filesystem
            File::delete($member->path);

            //Moves and sets the new uploaded image
            $this->imageHelper->uploadImage($request, $member);            
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

        //Adjust the order of the members when delete this .
        $this->imageHelper->adjustOrder($member->type, $member->order, $member, 'destroy');

        //Delete the member image on the filesystem
        File::delete($member->path);

        //Delete the image from the database
        $member->delete();        
        
        //Sending the user to the accounts page
        return redirect()->route('member/index');
    }    
}
