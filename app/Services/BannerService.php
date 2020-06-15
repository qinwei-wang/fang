<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/4
 * Time: 18:08
 */


namespace App\Services;

use App\Repositories\BannerRepository;


class BannerService
{

    protected $bannerRepository;

    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }


    /**
     * 获取列表
     * @return mixed
     */
    public function getList($platform)
    {
        return $this->bannerRepository->getAllByPlatform($platform);
    }


    /**
     * 通过id获取banner
     * @param $id
     */
    public function getBannerById($id)
    {
        return $this->bannerRepository->getBannerById($id);
    }


    /**
     * 新增或者更新
     * @param $params
     * @return mixed
     */
    public function save($params)
    {
        return $this->bannerRepository->save([
            'id' => $params['id'],
            'title' => $params['title'],
            'img' => $params['img'],
            'description'=> $params['description'],
            'sort'=> $params['sort'],
            'platform'=> $params['platform'],
            'action' => $params['action'],
        ]);
    }


    /**
     * 删除
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->bannerRepository->delele($id);
    }

}