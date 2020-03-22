<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    //

    protected $table = 'cms_news_categories';

    public function news()
    {
        return $this->hasMany(NewsModel::class, 'category_id', 'id');
    }
}
