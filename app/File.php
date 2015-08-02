<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //Constants member's type
	const NEWSLETTER = 1;
	const VOLUNTEER = 2;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'files';

    /**
     * The attributes that are mass assignable.
     *s
     * @var array
     */
    protected $fillable = ['name', 'link', 'description', 'type'];
}
