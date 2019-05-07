<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/7
 * Time: 18:00
 */


namespace App\Repositories;


class CustomerRepository
{

    public function makeModel()
    {
        return app(\App\Models\CustomerModel::class);

    }

}