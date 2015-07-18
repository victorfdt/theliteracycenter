<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'wishlist';

    /**
     * The attributes that are mass assignable.
     *s
     * @var array
     */
    protected $fillable = ['item', 'link', 'description', 'status'];
}
