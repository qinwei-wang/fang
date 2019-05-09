<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/5
 * Time: 16:44
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisaCountryModel extends Model
{

    protected $table = 'cms_visa_countries';

    protected $guarded = [];


    public function country()
    {
        return $this->belongsTo('App\Models\CountryModel', 'visa_country_id');
    }


}
