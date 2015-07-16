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

    //Helps to order, upload and manage images;
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

    /*
    Find the staff members, and send them to the staff view page
    */
    public function staff()
    {
        //Find the staff members
        $members = $this->member->where('type', Member::STAFF)->orderBy('order', 'asc')->get();

        return view('pages.about.staff', compact('members'));
    }

/*
    Find the board of directors members, and send them to the staff view page
    */
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
        $action = 'create';

        return view('admin.member.create', compact('member', 'action'));
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

        //Getting the max permitted position
        $maxPosition = Member::where('type', $type)->count() + 1;
        
        //If the admin informed a greater position, set the position as the maximum one
        if($order > $maxPosition){
            $order = $maxPosition;
        } 
        
        //Adjust the order
        $this->imageHelper->adjustStoreOrder($type, $order, $this->member);

        //Creating the new member
        $member = $this->member->create($request->all());
        $member->order = $order;

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
        $action = 'update';

        return view('admin.member.edit', compact('member', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, MemberRequest $request)
    {
        $member = Member::find($id);
        $oldOrder = $member->order;
        $newOrder = $request->input('order');
        $type = $request->input('type');

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

        //Fill this member with the new form information
        $member->fill($request->all()); 
        
        //Getting the max permitted position
        $maxPosition = Member::where('type', $type)->count();

        //If the admin informed a greater position, set the position as the maximum one
        if($member->order > $maxPosition){
            $member->order = $maxPosition;
            $newOrder = $maxPosition;
        }

        //Setting the right order 
        $this->imageHelper->adjustUpdateOrder($type, $oldOrder, $newOrder, $member);        
        
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
        $this->imageHelper->adjustDestroyOrder($member->type, $member->order, $member);

        //Delete the member image on the filesystem
        File::delete($member->path);

        //Delete the image from the database
        $member->delete();        
        
        //Sending the user to the accounts page
        return redirect()->route('member/index');
    }
}
