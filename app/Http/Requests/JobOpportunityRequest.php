<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use App\JobOpportunity;

class JobOpportunityRequest extends Request
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
        $job = JobOpportunity::find($this->id);

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
                'name'                  =>  'required|unique:job_opportunities,name',
                'description'           =>  'required',
                'responsabilities'      =>  'required',
                'requirements'          =>  'required',
                'skills'                =>  'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                'name'                  =>  'required|unique:job_opportunities,name,'. $job->id,
                'description'           =>  'required',
                'responsabilities'      =>  'required',
                'requirements'          =>  'required',
                'skills'                =>  'required',
                ];
            }
            default:break;
        }
    }
}
