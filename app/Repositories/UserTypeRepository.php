<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/10
 * Time: 20:51
 */


namespace App\Repositories;


class UserTypeRepository
{

    public function makeModel()
    {
        return app(\App\Models\UserTypeModel::class);

    }

}