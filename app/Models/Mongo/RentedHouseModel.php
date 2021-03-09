<?php

namespace App\Models\Mongo;


use Jenssegers\Mongodb\Eloquent\Model;

class RentedHouseModel extends Model
{
    protected $collection = 'sin_rented_houses';

    protected $connection = 'mongodb';

    protected $guarded = [];
}