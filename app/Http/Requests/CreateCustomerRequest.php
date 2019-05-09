<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/7
 * Time: 19:14
 */

namespace App\Http\Requests;

class CreateCustomerRequest extends ApiRequest
{


    public function authorize()
    {
        return true;
    }


    public function rules(){
        return [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
        ];
    }
}