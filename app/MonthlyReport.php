<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyReport extends Model
{
    const FRESH = 1;
    const OLD = 2;

	private $monthName = array(
		'1'   => 'January',
		'2'   => 'February',
		'3'   => 'March',
		'4'   => 'April',
		'5'   => 'May',  
		'6'   => 'June',
		'7'   => 'July',
		'8'   => 'August',
		'9'   => 'September',
		'10'  => 'October',
		'11'  => 'November',
		'12'  => 'December',
		);

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'monthly_reports';

    /**
     * The attributes that are mass assignable.
     *s
     * @var array
     */
    protected $fillable = ['learner_name', 'month', 'site', 'total_prep_time',
     'total_travel_time', 'total_mileage','goals_archieved', 
     'goals_progress', 'material_used', 'comments', 'user_id'];   

    public function user(){
    	return $this->belongsTo('App\User')->first();
    }

    public function sessions(){
    	return $this->hasMany('App\Session')->get();
    }

    /** Returns the name of the month by the key*/
    public function getMonthName($month){

    	return $this->monthName[$month];
    }
}
