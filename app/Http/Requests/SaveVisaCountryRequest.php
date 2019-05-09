<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/7
 * Time: 19:14
 */

namespace App\Http\Requests;

class SaveVisaCountryRequest extends ApiRequest
{


    public function authorize()
    {
        return true;
    }


    public function rules(){
        return [
            'country_id' => 'required',
            'visa_country_id' => 'required',
        ];
    }
}