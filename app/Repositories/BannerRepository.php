<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/4
 * Time: 18:03
 */

namespace App\Repositories;

class BannerRepository
{


    protected function makeModel()
    {
        return app(\App\Models\BannerModel::class);
    }


    public function getAllByPlatform($platform)
    {
        return $this->makeModel()->where('platform',$platform)->orderBy('sort')->get();
    }


    public function getBannerById($id)
    {
        return $this->makeModel()->where('id', $id)->first();
    }


    public function save($params)
    {
        return $this->makeModel()->updateOrCreate(['id' => array_get($params,'id')], $params);
    }

    public function delele($id)
    {
        return $this->makeModel()->where('id', $id)->delete();
    }
}
