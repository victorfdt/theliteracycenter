<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class AdminController extends Controller
{

    private $user;

    public function __construct()
    {
        //See if the there is an authenticated user
        $this->middleware('auth');

        //Check if this user is a admin
        $this->middleware('admin');

        $this->user = new User;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.home');
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

    public function account()
    {
        //Return all the results
        

        $users = $this->user->get()->each(function($user)
        {
            if($user->gender == 'm'){
                $user->gender = 'Male';
            } else {
                $user->gender = 'Female';
            }

                 
            
        });

        return view('admin.account', compact('users'));
    }
}
