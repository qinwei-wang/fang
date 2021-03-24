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
use App\Services\NewHouseService;
use App\Services\SecondHandHouseService;
use App\Services\RentedHouseService;
use App\Services\BusinessHouseService;
use App\Services\NewsService;

class HomeManager
{

    protected $newHouseService;
    protected $secondHandHouseService;
    protected $businessHouseService;
    protected $rentedHouseService;
    protected $newsService;

    public function __construct(NewHouseService $newHouseService, SecondHandHouseService $secondHandHouseService, RentedHouseService $rentedHouseService, BusinessHouseService $businessHouseService, NewsService $newsService)
    {
        $this->newHouseService = $newHouseService;
        $this->secondHandHouseService = $secondHandHouseService;
        $this->businessHouseService = $businessHouseService;
        $this->rentedHouseService = $rentedHouseService;
        $this->newsService = $newsService;

    }

    public function run($params)
    {
        $news = $this->newsService->getApiNewsList();
        $newHouses = $this->newHouseService->getApiNewHouseList();
        $secondHandedHouses = $this->secondHandHouseService->getApiSecondHandedHouseList();
        $rentedHouses = $this->rentedHouseService->getApiRentedHouseList();
        $business = $this->businessHouseService->getApiBusinessHouseList();
        return compact('ners', 'newHouses', 'secondHandedHouses', 'rentedHouses', 'rentedHouse', 'business');
    }
}