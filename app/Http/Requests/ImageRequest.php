<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Image;

class ImageRequest extends Request
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
        $image = Image::find($this->id);

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
                    'name'  =>  'required|unique:images,name',
                    'type'  =>  'required',
                    'order' =>  'numeric',
                    'image' =>  'required|image|mimes:jpeg,bmp,png',
                    'link'  =>  'string'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'  =>  'required|unique:images,name,'. $image->id,
                    'type'  =>  'required',
                    'order' =>  'numeric',
                    'image' =>  'image|mimes:jpeg,bmp,png',
                    'link'  =>  'string'
                ];
            }
            default:break;
        }
    }
}
