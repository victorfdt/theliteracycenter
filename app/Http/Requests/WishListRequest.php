<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\WishList;

class WishListRequest extends Request
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
        $wishlist = WishList::find($this->id);
        
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
                'item'   =>  'required|unique:wishlist,item',
                'link'   =>  'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [                
                'item'   =>  'required||unique:wishlist,item,'.$wishlist->id,
                'link'   =>  'required',
                ];
            }
            default:break;
        }
    }
}
