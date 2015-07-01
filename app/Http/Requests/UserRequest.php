<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class UserRequest extends Request
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
        $user = User::find($this->id);
        
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
                'name'   =>  'required',
                'surname'   =>  'required',
                'email'   =>  'required|unique:users,email',
                'gender'   =>  'required',
                'role'   =>  'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [                
                'name'   =>  'required',
                'surname'   =>  'required',
                'email'   =>  'required|unique:users,email,'.$user->id,
                'gender'   =>  'required',
                'role'   =>  'required'
                ];
            }
            default:break;
        }
    }
}
