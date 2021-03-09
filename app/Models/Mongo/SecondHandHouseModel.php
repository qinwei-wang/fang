<?php

namespace App\Models\Mongo;


use Jenssegers\Mongodb\Eloquent\Model;

class SecondHandHouseModel extends Model
{
    protected $collection = 'sin_second_hand_houses';

    protected $connection = 'mongodb';

    protected $guarded = [];
}