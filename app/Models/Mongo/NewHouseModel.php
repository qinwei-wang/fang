<?php

namespace App\Models\Mongo;


use Jenssegers\Mongodb\Eloquent\Model;

class NewHouseModel extends Model
{
    protected $collection = 'sin_new_houses';

    protected $connection = 'mongodb';

    protected $guarded = [];
}