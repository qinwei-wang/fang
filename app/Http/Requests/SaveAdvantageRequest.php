<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/7
 * Time: 19:14
 */

namespace App\Http\Requests;

class SaveAdvantageRequest extends ApiRequest
{


    public function authorize()
    {
        return true;
    }


    public function rules(){
        return [
            'title' => 'required',
            'img' => 'required',
            'description' => 'required'
        ];
    }
}