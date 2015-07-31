<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventsRequest extends Request
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
        return [
            'name'          =>  'required',
            'date'          =>  'required|date_format:m/d/Y',
            'image'         =>  'image|mimes:jpeg,bmp,png|max:1500', 
        ];
    }
}
