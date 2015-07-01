<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest; 
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Controllers\Controller;


use App\User;
use App\Role;
use Auth;

class AdminController extends Controller
{

    private $user;

    public function __construct()
    {
        //See if the there is an authenticated user
        $this->middleware('auth');

        //Check if this user is a admin
        $this->middleware('admin');

        $this->user = new User();
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

    /**
     * Show the main account page
     *
     * @param 
     * @return Response
     */
    public function account()
    {
        //Return all the results
        $users = $this->user->get();
        $role = new Role();


        //Passing the Role to use its constants
        return view('admin.account', compact('users', 'role'));
    }

    /**
     * Display the create account page
     *
     * @param  int  $id
     * @return Response
     */
    public function accountCreate()
    {
        $role = new Role();

        //Passing the Role to use its constants
        return view('admin.account_create', compact('role'));
    }

    /**
     * Create the new account
     *
     * @param  
     * @return 
     */
    public function accountStore(UserRequest $request){

        //Creating the new user
        $newUser = new User();
        $newUser = $newUser->create($request->all());
        $newUser->password = bcrypt($newUser->name . 'litcenter');
        $newUser->save();

        //Getting the user role and creating a new register
        $role = new Role();
        $role->user_id = $newUser->id;
        $role->privilege = $request->input('role');
        $role->save();          

        //Sending the user to the accounts page
        return redirect()->route('admin/account');
    }

    /**
     * Delete an existing account.
     *
     * @param  
     * @return 
     */
    public function accountDestroy($id){
        $this->user->find($id)->delete();

        //Sending the user to the accounts page
        return redirect()->route('admin/account');
    }

    /**
     * Displays the update account page
     *
     * @param  
     * @return 
     */
    public function accountEdit($id){

        //Find the selected user
        $user = $this->user->find($id);             
        return view('admin.account_edit', compact('user'));
    }

    /**
     * Update the account
     *
     * @param  
     * @return 
     */
    public function accountUpdate($id, UserRequest $request){        
        //Find the selected user
        $user = $this->user->find($id);

        //Getting the new information and setting
        $user->fill($request->input())->save();

        //Setting the user 
        $role = $user->role;        
        $role->privilege = $request->input('role');
        $role->save(); 

        //Sending the user to the accounts page
        return redirect()->route('admin/account');

    }

    public function passwordEdit(){
        return view('admin.edit_password', compact('user'));        
    }

    public function passwordUpdate(ChangePasswordRequest $request){

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        //Sending the user to the accounts page
        return redirect()->route('admin/account');
    }
}
