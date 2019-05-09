<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/10
 * Time: 2:32
 */




namespace App\Repositories;


class VisaCountryRepository
{

    public function makeModel()
    {
        return app(\App\Models\VisaCountryModel::class);

    }

}