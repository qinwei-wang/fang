<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/5
 * Time: 16:44
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{

    protected $table = 'cms_countries';

    protected $guarded = [];


    protected function  hasManyVisaCountries()
    {
        return $this->hasMany('App\Models\VisaCountryModel', 'country_id');

    }
}
