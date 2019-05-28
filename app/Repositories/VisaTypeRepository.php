<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/16
 * Time: 1:19
 */


namespace App\Repositories;


class VisaTypeRepository
{

    public function makeModel()
    {
        return app(\App\Models\VisaTypeModel::class);

    }


    public function getVisaTypeByid($id)
    {
        return $this->makeModel()->where('id', $id)->value('name');
    }

}