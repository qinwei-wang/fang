<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsModel extends Model
{
    use SoftDeletes;
    //

    protected $table = 'cms_news';

    protected $guarded = [];

    public function category()
    {
        return $this->hasOne(NewsCategory::class, 'id', 'category_id');
    }
}
