<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
     //Constants member's type
	const STAFF = 1;
	const BOARD_DIRECTOR = 2;

	const DIRECTORY = 'images/upload/member';

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'members';

    /**
     * The attributes that are mass assignable.
     *s
     * @var array
     */
    protected $fillable = ['name', 'email', 'description', 'type',
     'link', 'path', 'description','phone', 'position', 'order', 'link', 'link_label'];
}
