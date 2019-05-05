<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/5
 * Time: 17:04
 */


namespace App\Repositories;


class CountryRepository
{

    public function makeModel()
    {
        return app(\App\Models\CountryModel::class);

    }

}