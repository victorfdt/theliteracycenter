<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\MonthlyReport;

class MonthlyReportRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //This id is passed by the controller that calls the request class
        $report = MonthlyReport::find($this->id);

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'learner_name'      =>  'required',
                    'site'              =>  'required',
                    'total_prep_time'   =>  'required|numeric',
                    'total_travel_time' =>  'required|numeric',
                    'total_travel_time' =>  'required|numeric',
                    'total_mileage'     =>  'required|numeric',                    
                    'goals_progress'    =>  'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'learner_name'      =>  'required',
                    'site'              =>  'required',
                    'total_prep_time'   =>  'required|numeric',
                    'total_travel_time' =>  'required|numeric',
                    'total_travel_time' =>  'required|numeric',
                    'total_mileage'     =>  'required|numeric',                    
                    'goals_progress'    =>  'required',
                ];
            }
            default:break;
        }
    }
}
