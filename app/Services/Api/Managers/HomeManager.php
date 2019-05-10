<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/7
 * Time: 17:17
 */


namespace App\Services\Api\Managers;

use App\Services\Api\BannerService;
use App\Services\Api\CountryService;

class HomeManager
{

    protected $bannerService;
    protected $countryService;

    public function __construct(BannerService $bannerService, CountryService $countryService)
    {
        $this->bannerService = $bannerService;
        $this->countryService = $countryService;
    }

    public function run($params)
    {
        $banners = $this->bannerService->getBanners();
        $countries = $this->countryService->getCountryInfo($params);
        $passports = $this->countryService->getPassports($params);
        return compact('banners', 'countries', 'passports');
    }
}