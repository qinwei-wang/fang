<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/5
 * Time: 18:15
 */


namespace App\Repositories;

class CountryDetailRepository
{

    public function makeModel()
    {
        return app(\App\Models\CountryDetailModel::class);
    }


    public function getDetailByCountryId($country_id)
    {
        return $this->makeModel()->where('country_id', $country_id)->first();
    }


    public function getAll()
    {
        return $this->makeModel()->orderBy('sort')->get();

    }

}