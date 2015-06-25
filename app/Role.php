<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   //Constants of the roles
  	const ADMIN = 1;
  	const VOLUNTEER = 2;
  	const USER = 3;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    public function user(){
      return $this->belongsTo('App\User');
    }

}
