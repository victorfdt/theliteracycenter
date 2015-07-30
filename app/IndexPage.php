<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndexPage extends Model
{
    //Constants index page's type
	const ONLINE = 1;
	const OFFLINE = 2;

    const IMAGE_LEFT = 1;
    const IMAGE_CENTER = 2;
    const IMAGE_RIGHT = 3;

	const DIRECTORY = 'images/upload/index_page';
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'index_page';

    /**
     * The attributes that are mass assignable.
     *s
     * @var array
     */
    protected $fillable = ['title', 'sub_title', 'content',
     'path', 'image_align', 'status'];

}
