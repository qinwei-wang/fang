<?php

namespace App\Models\Mongo;


use Jenssegers\Mongodb\Eloquent\Model;

class RentedHouseModel extends Model
{
    protected $collection = 'sin_rented_houses';

    protected $connection = 'mongodb';

    protected $guarded = [];

    const HOUSE = [
        1 => 'studio',
        2 => '一卧室',
        3 => '2卧室',
        4 => '3卧室',
        5 => '4卧室',
        6 => '5卧室',
        7 => '独栋洋房',
        8 => '半独立洋房',
    ];
}