<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/10
 * Time: 12:06
 */


namespace App\Services\Api;
use App\Repositories\CountryRepository;
use App\Repositories\CountryDetailRepository;
use App\Repositories\VisaCountryRepository;

class CountryService
{
    protected $countryRepository;

    protected $countryDetailRepository;

    protected $visaCountryRepository;

    const ID_TYPES = [ 1 => '护照'];

    const VISA_TYPES = [
            1 => '签证入境',
            2 => '落地签入境',
            3 => '免签目的国',
            4 => 'eVisa'
        ];




    public function __construct(CountryRepository $countryRepository, CountryDetailRepository $countryDetailRepository, VisaCountryRepository $visaCountryRepository)
    {
        $this->countryRepository = $countryRepository;
        $this->countryDetailRepository = $countryDetailRepository;
        $this->visaCountryRepository = $visaCountryRepository;
    }

    public function getCountryInfo($params)
    {
        $result = [];
        $countries = $this->countryDetailRepository->makeModel()->get();
        foreach ($countries as $country) {
            $arr = [];
            $arr['country_id'] = $country->country->id;
            $arr['name'] = $country->country->ch_name;
            $arr['flag'] = $country->country->flag;
            $arr['banner'] = json_decode($country->banner, true);
            $arr['img'] = $country->img;
            $arr['ID_type'] = isset(self::ID_TYPES[$country->ID_type]) ? self::ID_TYPES[$country->ID_type] : '';
            $arr['live'] = $country->live;
            $arr['migrate'] = $country->migrate;
            $arr['visa_free_number'] = $country->visa_free;
            $arr['description'] = $country->description;
            $result[] = $arr;
        }
        return $result;
    }


    public function getPassports($params)
    {
        $result = [];
        $countries = $this->countryDetailRepository->makeModel()->get();
        foreach ($countries as $country) {
            $passport = [];
            $passport['country_id'] = $country->country_id;
            $passport['flag'] = $country->country->flag;
            $passport['passport'] = $country->passport;
            $passport['visa_free_number'] = $country->visa_free;
            $passport['rank'] = $country->rank;
            foreach ($country->country->hasManyVisaCountries as $k => $item) {
                $passport['visa_countries'][$k]['country_id'] = $item->visa_country_id;
                $passport['visa_countries'][$k]['type'] = isset(self::VISA_TYPES[$item->type]) ? self::VISA_TYPES[$item->type] : '';
                $passport['visa_countries'][$k]['flag'] = $item->country->flag;
            }
            $result[] = $passport;
        }
        return $result;
    }


}
