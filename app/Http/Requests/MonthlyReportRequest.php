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

        $requiredInputs = [
                    'learner_name'      =>  'required',
                    'site'              =>  'required',
                    'year'              =>  'required|numeric|min:4',
                    'total_prep_time'   =>  'required|numeric',
                    'total_travel_time' =>  'required|numeric',
                    'total_travel_time' =>  'required|numeric',
                    'total_mileage'     =>  'required|numeric',                    
                    'goals_progress'    =>  'required',
                ];

        //Required inputs when the student is absent all the month
        $requiredInputsNoStudent = [
            'learner_name'      =>  'required',
            'year'              =>  'required|numeric|min:4',
        ];

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {   
                $fields = $requiredInputs;

                if($this->input('student_present') == false){
                    $fields = $requiredInputsNoStudent;
                }

                return $fields;
            }
            case 'PUT':
            case 'PATCH':
            {
                $fields = $requiredInputs;

                if($this->input('student_present') == false){
                    $fields = $requiredInputsNoStudent;
                }

                return $fields;
            }
            default:break;
        }
    }
}
