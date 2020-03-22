<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use softDelete;

class NewsModel extends Model
{
    //

    protected $table = 'cms_news';

    protected $guarded = [];

    public function category()
    {
        return $this->hasOne(NewsCategory::class, 'id', 'category_id');
    }
}
