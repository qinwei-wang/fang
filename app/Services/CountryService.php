<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/5
 * Time: 17:04
 */


namespace App\Services;

use App\Repositories\CountryRepository;

class CountryService
{


    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }


    /**
     * 获取国家列表
     * @param $params
     * @return mixed
     */
    public function getList($params)
    {
        $model = $this->countryRepository->makeModel();
        if (isset($params['name']) && !empty($params['name'])) {
            $model = $model->where('name', 'like', '%' . $params['name'] . '%');
        }
        return $model->paginate(20);
    }


    /**
     * 获取国家详情
     * @param $country_id
     */
    public function getDetail($country_id)
    {

    }
}