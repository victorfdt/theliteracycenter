<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest; 
use App\Http\Requests\ChangePasswordRequest;

use App\User;
use App\Role;
use Auth;


class UsersController extends Controller
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
        //Return all the results
        $users = $this->user->get();
        $role = new Role();


        //Passing the Role to use its constants
        return view('admin.user.index', compact('users', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $role = new Role();

        //Passing the Role to use its constants
        return view('admin.user.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
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
        return redirect()->route('users.index');
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
        //Find the selected user
        $user = $this->user->find($id); 
        $role = new Role();            
        return view('admin.user.edit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
        //Find the selected user
        $user = $this->user->find($id);

        //Getting the new information and setting
        $user->fill($request->input())->save();

        //Setting the user 
        $role = $user->role;        
        $role->privilege = $request->input('role');
        $role->save(); 

        //Sending the user to the accounts page
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->user->find($id)->delete();

        //Sending the user to the accounts page
        return redirect()->route('users.index');
    }

    /** Changes user passord */
    public function passwordReset(ChangePasswordRequest $request, $id){

        $this->user->find($id);
        $user->password = bcrypt($newUser->name . 'litcenter');
        $user->save();

        //Sending the user to the accounts page
        return redirect()->route('users.index');
    }

    /*
        If the user forget his password, the admin can reset it
    */
    public function resetPassword($id){
        //Find the user
        $user = User::find($id);

        $user->password = bcrypt($user->name . 'litcenter');
        $user->save();

        //Sending the user to the accounts page
        return redirect()->route('users.index');
    }
}
