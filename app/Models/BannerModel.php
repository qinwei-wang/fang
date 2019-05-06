<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerModel extends Model
{
    //
//    use SoftDeletes;

    protected $table = 'cms_banners';

    protected $guarded = [];


}
