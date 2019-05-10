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
use App\Repositories\VisaCountryRepository;
use App\Services\AdvantageService;

class CountryService
{


    protected $countryRepository;

    protected $countryDetailRepository;

    protected $visaCountryRepository;

    protected $advantageService;

    public function __construct(
        CountryRepository $countryRepository,
        CountryDetailRepository $countryDetailRepository,
        VisaCountryRepository $visaCountryRepository,
        AdvantageService $advantageService
    )
    {
        $this->countryRepository = $countryRepository;
        $this->countryDetailRepository = $countryDetailRepository;
        $this->visaCountryRepository = $visaCountryRepository;
        $this->advantageService = $advantageService;
    }


    /**
     * 获取国家列表
     * @param $params
     * @return mixed
     */
    public function getList($params)
    {
        return $this->countryDetailRepository->makeModel()->paginate(20);
    }

    /**
     * 获取国家列表
     * @param $params
     * @return mixed
     */
    public function getCountries($params)
    {
        return $this->countryRepository->makeModel()->paginate(10);
    }

    /**
     * 获取国家列表
     * @param $params
     * @return mixed
     */
    public function getSelectCountries($params)
    {
        $country_ids= $this->countryDetailRepository->makeModel()->pluck('country_id')->toArray();
        $model = $this->countryRepository->makeModel()->whereNotIn('id', $country_ids);
        if (isset($params['name']) && !empty($params['name'])) {
            $model = $model->where('name', 'like', '%' . $params['name'] .'%');
        }
        return $model->paginate(10);
    }


    public function selectVisaCountries($params)
    {
        $model = $this->countryRepository->makeModel()->where('id','!=', $params['country_id']);
        if (isset($params['name']) && !empty($params['name'])) {
            $model = $model->where('name', 'like', '%' . $params['name'] .'%');
        }
        return $model->paginate(10);
    }


    /**
     * 获取国家详情
     * @param $country_id
     */
    public function getDetail($country_id)
    {
        $data = $this->countryDetailRepository->getDetailByCountryId($country_id);
        if (!empty($data)) {
            $data->banner = $data->banner ? json_decode($data->banner, true) : '';
            $data->advantage_ids = !empty($data->advantage_ids) ? json_decode($data->advantage_ids,true) : '';

        }
        return $data;
    }


    public function getAdvantages()
    {
        return $this->advantageService->getAll();
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
            'visa_free' => $params['visa_free'],
            'migrate' => $params['migrate'],
            'ID_type' => $params['ID_type'],
            'description' => $params['description'],
            'country_id'=> $params['country_id'],
            'passport' => $params['passport'],
            'process' => $params['process'],
            'advantage_ids' => $params['advantage_ids'] ? json_encode($params['advantage_ids']) : '',
            'rank' => $params['rank']

        ];
        return $this->countryDetailRepository->makeModel()->updateOrCreate(['id' => $params['id']], $data);
    }


    public function saveSelectCountry($country_id)
    {
        return $this->countryDetailRepository->makeModel()->create(['country_id' => $country_id]);
    }


    public function getVisaCountries($params)
    {
        return $this->visaCountryRepository->makeModel()->where('country_id', $params['country_id'])->paginate(20);
    }


    public function saveVisaCountry($params)
    {
         $this->visaCountryRepository->makeModel()->updateOrCreate(['country_id' => $params['country_id'], 'visa_country_id' => $params['visa_country_id']], [
             'country_id' => $params['country_id'],
             'type' => array_get($params, 'type', 0)
         ]);
    }


    public function showVisaCountry($id)
    {
        return $this->visaCountryRepository->makeModel()->where('id', $id)->first();
    }

    public function deleteVisaCountry($id)
    {
        return $this->visaCountryRepository->makeModel()->where('id', $id)->delete();
    }
}