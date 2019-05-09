<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/5
 * Time: 18:16
 */



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryDetailModel extends Model
{

    protected $table = 'cms_country_details';

    protected $guarded = [];


    public function country()
    {
        return $this->belongsTo('App\Models\CountryModel', 'country_id');
    }

}