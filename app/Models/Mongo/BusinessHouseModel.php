<?php

namespace App\Models\Mongo;


use Jenssegers\Mongodb\Eloquent\Model;

class BusinessHouseModel extends Model
{
    protected $collection = 'sin_business_houses';

    protected $connection = 'mongodb';

    protected $guarded = [];
}