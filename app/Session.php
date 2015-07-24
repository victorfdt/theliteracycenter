<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sessions';

    /**
     * The attributes that are mass assignable.
     *s
     * @var array
     */
    protected $fillable = ['day', 'hours'];

    public function monthlyReport(){
      return $this->belongsTo('App\MonthlyReport');
    }
}
