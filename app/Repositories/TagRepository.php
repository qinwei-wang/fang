<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/16
 * Time: 1:19
 */


namespace App\Repositories;


class TagRepository
{

    public function makeModel()
    {
        return app(\App\Models\TagModel::class);

    }

}