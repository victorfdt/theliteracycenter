<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model as ;

class User extends Model
{

	//Constants of the roles
	define(ADMIN, 1);
	define(VOLUNTEER, 2);
	define(USER, 3;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';


}

?>