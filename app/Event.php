<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    const DIRECTORY = 'images/upload/event';

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *s
     * @var array
     */
    protected $fillable = ['name', 'description', 'link', 'date', 'path'];
}
