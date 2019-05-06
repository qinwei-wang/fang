<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/6
 * Time: 19:23
 */


namespace App\Http\Requests;
use  App\Traits\ApiResponse;

class ApiRequest extends Request
{
    use ApiResponse;

    public function response(array $errors)
    {
        return $this->failed(current($errors));
    }
}