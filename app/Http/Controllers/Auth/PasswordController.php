<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

use App\User;
use Auth;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    private $user;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->user = Auth::user();
    }

    public function edit(){
        $user = $this->user;
        dd($user);

        return view('pages.edit_password', compact('user'));        
    }

    public function updatePassword(ChangePasswordRequest $request){

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        if($user->isAdmin()){
            //Sending the user to the admin page
            return redirect()->route('admin');
        } else {
            //Sending the user to the volunteer page
            return redirect()->route('volunteer');
        }
        
    }
}
