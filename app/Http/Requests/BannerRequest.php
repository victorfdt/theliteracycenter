<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Banner;


class BannerRequest extends Request
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
        $banner = Banner::find($this->id);

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
                'name'   =>  'required|unique:banners,name',
                'type'   =>  'required',
                'order'   =>  'required|numeric',
                'image'   =>  'required|image|mimes:jpeg,bmp,png',                
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [                
                'name'   =>  'required|unique:banners,name,'. $banner->id,
                'type'   =>  'required',
                'order'   =>  'required|numeric',
                'image'   =>  'required|image|mimes:jpeg,bmp,png',  
                ];
            }
            default:break;
        }
    }
}
