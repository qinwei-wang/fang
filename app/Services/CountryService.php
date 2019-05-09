<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/5
 * Time: 17:04
 */


namespace App\Services;

use App\Repositories\CountryRepository;
use App\Repositories\CountryDetailRepository;

class CountryService
{


    protected $countryRepository;

    protected $countryDetailRepository;


    public function __construct(CountryRepository $countryRepository, CountryDetailRepository $countryDetailRepository)
    {
        $this->countryRepository = $countryRepository;
        $this->countryDetailRepository = $countryDetailRepository;
    }


    /**
     * 获取国家列表
     * @param $params
     * @return mixed
     */
    public function getList($params)
    {
        $model = $this->countryRepository->makeModel()->select('cms_countries.*');
        if (isset($params['name']) && !empty($params['name'])) {
            $model = $model->where('name', 'like', '%' . $params['name'] . '%');
        }
        if (isset($params['status']) && $params['status'] !== '') {
            $model = $model->leftJoin('cms_country_details', 'cms_country_details.country_id', '=', 'cms_countries.id')->where('cms_country_details.status',  $params['status'])->groupBy('cms_countries.id');
        }

        return $model->paginate(20);
    }


    /**
     * 获取国家详情
     * @param $country_id
     */
    public function getDetail($country_id)
    {
        $data = $this->countryDetailRepository->getDetailByCountryId($country_id);
        $data->banner = $data->banner ? json_decode($data->banner, true) : '';
        return $data;
    }


    /**
     * 保存详情设置
     * @param $params
     * @return mixed
     */
    public function saveDetail($params)
    {
        $data = [
            'id'=> $params['id'],
            'banner' => json_encode($params['banner']),
            'img' => $params['img'],
            'live' => $params['live'],
            'visa' => $params['visa'],
            'migrate' => $params['migrate'],
            'ID_type' => $params['ID_type'],
            'description' => $params['description'],
            'country_id'=> $params['country_id'],
            'status' => $params['status']
        ];
        return $this->countryDetailRepository->makeModel()->updateOrCreate(['id' => $params['id']], $data);
    }


    public function getVisaCountries($params)
    {
        return [];
    }
}