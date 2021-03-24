<?php

namespace App\Models\Mongo;


use Jenssegers\Mongodb\Eloquent\Model;

class ContactModel extends Model

{
    protected $collection = 'sin_contacts';

    protected $connection = 'mongodb';

    protected $guarded = [];
}