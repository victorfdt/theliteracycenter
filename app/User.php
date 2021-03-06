<?php

namespace App;

use Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;   

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'surname', 'email', 'password', 'gender'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /* 
        Return the user's role.
    */
    public function role()
    {
        return $this->hasOne('App\Role');

    }

    public function monthlyReport(){
        return $this->hasMany('App\MonthlyReport');
    }

    /* 
        Verify if the user is administrator
    */
    public function isAdmin()
    {
        $condition = false;

        //Checking if the user is administrator
        if($this->role->privilege == Role::ADMIN){           
           $condition = true;
        }         

        return $condition;
    }

    /* 
        Verify if the user is a volunteer
    */
    public function isVolunteer()
    {
        $condition = false;

        //Checking if the user is administrator
        if($this->role->privilege == Role::VOLUNTEER){           
           $condition = true;
        }         

        return $condition;
    }
}
