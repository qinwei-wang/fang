<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/7
 * Time: 17:17
 */


namespace App\Services\Api\Managers;

use App\Services\Api\BannerService;

class HomeManager
{

    protected $bannerService;

    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function run($params)
    {
        $banners = $this->bannerService->getBanners();
        return compact('banners');
    }
}