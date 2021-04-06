<?php

namespace App\Models\Mongo;


use Jenssegers\Mongodb\Eloquent\Model;

class NewHouseModel extends Model
{
    protected $collection = 'sin_new_houses';

    protected $connection = 'mongodb';

    protected $guarded = [];


    const REGION  = [
        'east' => '东部',
        'west' => '西部',
        'south' => '南部',
        'north' => '北部',
        'middle' => '中部',
        'east_north' => '东北部',
        'other' => '其他地区',
    ];

    const MAP = [
        'traffic' => '交通',
        'edua' => '教育',
        'hospital' => '医院',
        'bank' => '银行',
        'casual' => '休闲',
        'food' => '美食',
        'shopping' => '购物',
        'fitness' => '健身',
    ];
}