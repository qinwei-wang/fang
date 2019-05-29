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
use App\Services\UserTypeService;
use App\Services\ApplyConditionService;
use App\Services\TagService;
use App\Services\VisaTypeService;

class CountryService
{


    protected $countryRepository;

    protected $countryDetailRepository;

    protected $visaCountryRepository;

    protected $advantageService;

    protected $userTypeService;

    protected $applyConditionService;

    protected $tagService;

    protected $visaTypeService;

    public function __construct(
        CountryRepository $countryRepository,
        CountryDetailRepository $countryDetailRepository,
        VisaCountryRepository $visaCountryRepository,
        AdvantageService $advantageService,
        UserTypeService $userTypeService,
        ApplyConditionService $applyConditionService,
        TagService $tagService,
        VisaTypeService $visaTypeService
    )
    {
        $this->countryRepository = $countryRepository;
        $this->countryDetailRepository = $countryDetailRepository;
        $this->visaCountryRepository = $visaCountryRepository;
        $this->advantageService = $advantageService;
        $this->userTypeService = $userTypeService;
        $this->applyConditionService = $applyConditionService;
        $this->tagService = $tagService;
        $this->visaTypeSerivce = $visaTypeService;
    }


    /**
     * 获取国家列表
     * @param $params
     * @return mixed
     */
    public function getList($params)
    {
        return $this->countryDetailRepository->makeModel()->orderBy('sort','desc')->paginate(20);
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
        if (isset($params['ch_name']) && !empty($params['ch_name'])) {
            $model = $model->where('ch_name', 'like', '%' . $params['ch_name'] .'%');
        }
        return $model->paginate(10);
    }


    public function selectVisaCountries($params)
    {
        $country_ids = $this->visaCountryRepository->makeModel()->where('country_id', $params['country_id'])->pluck('visa_country_id');
        if ($country_ids) $country_ids = $country_ids->toArray();
        $model = $this->countryRepository->makeModel()->where('id','!=', $params['country_id'])->whereNotIn('id', $country_ids);
        if (isset($params['ch_name']) && !empty($params['ch_name'])) {
            $model = $model->where('ch_name', 'like', '%' . $params['ch_name'] .'%');
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
            $data->banner = $data->banner ? json_decode($data->banner, true) : [];
            $data->advantage_ids = !empty($data->advantage_ids) ? json_decode($data->advantage_ids,true) : [];
            $data->apply_condition_ids = !empty($data->apply_condition_ids) ? json_decode($data->apply_condition_ids,true) : [];
            $data->user_type_ids = !empty($data->user_type_ids) ? json_decode($data->user_type_ids,true) : [];
            $data->advantage = json_decode($data->advantage,true);
            $data->disadvantage = json_decode($data->disadvantage,true);
            $data->tags = !empty($data->tags) ? json_decode($data->tags,true) : [];

        }
        return $data;
    }


    public function getAdvantages()
    {
        return $this->advantageService->getAll();
    }

    public function getApplyConditions()
    {
        return $this->applyConditionService->getAll();
    }

    public function getUserTypes()
    {
        return $this->userTypeService->getAll();
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
//            'advantage_ids' => array_get($params,'advantage_ids', '') ? json_encode($params['advantage_ids']) : '',
            'user_type_ids' => array_get($params,'user_type_ids', '') ? json_encode($params['user_type_ids']) : '',
            'apply_condition_ids' => array_get($params, 'apply_condition_ids', '') ? json_encode($params['apply_condition_ids']) : '',
            'introduction' => $params['introduction'],
            'sort' => array_get($params, 'sort',0),
            'rank' => $params['rank'],
            'advantage' => json_encode($params['advantage']),
            'disadvantage' => json_encode($params['disadvantage']),
            'tags' => array_get($params, 'tags', '') ? json_encode($params['tags']) : '',

        ];
        return $this->countryDetailRepository->makeModel()->updateOrCreate(['id' => $params['id']], $data);
    }


    public function saveSelectCountry($country_ids)
    {
        foreach ($country_ids as $country_id) {
            $this->countryDetailRepository->makeModel()->create(['country_id' => $country_id]);
        }
    }


    public function getVisaCountries($params)
    {
        return $this->visaCountryRepository->makeModel()->where('country_id', $params['country_id'])->orderBy('id', 'desc')->paginate(50);
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


    public function delete($id)
    {
        return $this->countryDetailRepository->makeModel()->where('id', $id)->delete();
    }


    public function sort($params)
    {
        return $this->countryDetailRepository->makeModel()->where('id', $params['id'])->update(['sort' => $params['sort']]);
    }

    public function getTags()
    {
        return $this->tagService->getAll();
    }


    public function getVisaTypes()
    {
        return $this->visaTypeSerivce->getAll();
    }
}