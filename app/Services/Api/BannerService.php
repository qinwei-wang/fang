<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/7
 * Time: 17:16
 */


namespace App\Services\Api;
use App\Repositories\BannerRepository;

class BannerService
{
    protected $bannerRepository;

    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    public function getBanners()
    {
        $data = $this->bannerRepository->getAll();
        $result = [];
        foreach ($data as $item) {
            $key = $item->platform == 'PC' ? 'web' : 'wap';
            $result[$key] = $item;
        }
        return $result;
    }
}