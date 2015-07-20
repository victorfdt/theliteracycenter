<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOpportunity extends Model
{
    //Constants member's type
	const PART_TIME = 1;
	const FULL_TIME = 2;

	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'job_opportunities';

    /**
     * The attributes that are mass assignable.
     *s
     * @var array
     */
    protected $fillable = ['name', 'function', 'contract', 'payed',
     'description', 'responsabilities', 'requirements','skills'];
}
