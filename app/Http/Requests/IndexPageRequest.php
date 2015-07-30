<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IndexPageRequest extends Request
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
                    'title'         =>  'required',
                    'content'       =>  'required',
                    'image'         =>  'required|image|mimes:jpeg,bmp,png',                    
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title'         =>  'required',
                    'content'       =>  'required',
                    'image'         =>  'image|mimes:jpeg,bmp,png',                    
                ];
            }
            default:break;
        }
    }
}
