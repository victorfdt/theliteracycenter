<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;

use App\User;
use Auth;

class VolunteerController extends Controller
{

    private $user;

    public function __construct()
    {     
        //Check if this user is a admin
        $this->middleware('volunteer');

        $this->user = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('volunteer.home', compact('user'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function passwordEdit(){
        return view('volunteer.edit_password', compact('user'));        
    }

    public function passwordUpdate(ChangePasswordRequest $request){

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        //Sending the user to the accounts page
        return redirect()->route('volunteer');
    }
}
