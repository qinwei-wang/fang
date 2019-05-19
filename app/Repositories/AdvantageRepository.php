<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/10
 * Time: 13:54
 */






namespace App\Repositories;


class AdvantageRepository
{

    public function makeModel()
    {
        return app(\App\Models\AdvantageModel::class);

    }


    public function getAdvantagesByCountryId($country_id)
    {
        return $this->makeModel()->where('country_id', $country_id)->get();
    }

}