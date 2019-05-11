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
use App\Services\Api\AdvantageService;
use App\Services\Api\UserTypeService;
use App\Services\Api\ApplyConditionService;


class CountryService
{
    protected $countryRepository;

    protected $countryDetailRepository;

    protected $visaCountryRepository;

    protected $advantageService;

    protected $userTypeService;

    protected $applyConditionService;

    const ID_TYPES = [ 1 => '护照'];

    const VISA_TYPES = [
            1 => '签证入境',
            2 => '落地签入境',
            3 => '免签目的国',
            4 => 'eVisa'
        ];




    public function __construct(
        CountryRepository $countryRepository,
        CountryDetailRepository $countryDetailRepository,
        VisaCountryRepository $visaCountryRepository,
        AdvantageService $advantageService,
        UserTypeService $userTypeService,
        ApplyConditionService $applyConditionService
    )
    {
        $this->countryRepository = $countryRepository;
        $this->countryDetailRepository = $countryDetailRepository;
        $this->visaCountryRepository = $visaCountryRepository;
        $this->advantageService = $advantageService;
        $this->userTypeService = $userTypeService;
        $this->applyConditionService = $applyConditionService;
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
            $arr['require'] = $country->live;
            $arr['migrate_cycle'] = $country->migrate;
            $arr['visa_free_number'] = $country->visa_free;
            $arr['description'] = $country->description;
            $arr['process'] = $country->process ? explode(',' , $country->process) : '';
            $arr['advantages'] = $country->advantage_ids ? $this->advantageService->getAdvantages(json_decode($country->advantage_ids, true)) : [];
            $arr['user_types'] = $country->user_type_ids ? $this->userTypeService->getUserTypes(json_decode($country->user_type_ids, true)) : [];
            $arr['apply_conditions'] = $country->apply_condition_ids ? $this->applyConditionService->getApplyConditions(json_decode($country->apply_condition_ids, true)) : [];
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


    /**
     * 获取国家信息
     * @param $country_id
     */
    public function getCountryInfoById($country_id)
    {
        $country = $this->countryDetailRepository->getDetailByCountryId($country_id);
        $data = [];
        $data['country_id'] = $country->country->id;
        $data['name'] = $country->country->ch_name;
        $data['flag'] = $country->country->flag;
        $data['banner'] = json_decode($country->banner, true);
        $data['description'] = $country->description;
        $data['process'] = $country->process ? explode(';', $country->process) : '';
        $data['advantages'] = $country->advantage_ids ? $this->advantageService->getAdvantages(json_decode($country->advantage_ids, true)) : [];
        $data['user_types'] = $country->user_type_ids ? $this->userTypeService->getUserTypes(json_decode($country->user_type_ids, true)) : [];
        $data['apply_conditions'] = $country->apply_condition_ids ? $this->applyConditionService->getApplyConditions(json_decode($country->apply_condition_ids, true)) : [];
        return $data;
    }


    public function getPassportInfoByCountryId($country_id)
    {
        $country = $this->countryDetailRepository->getDetailByCountryId($country_id);
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
        return $passport;
    }


    public function getRecommendCountries($params)
    {
        $result = [];
        $countries = $this->countryDetailRepository->getAll();
        foreach ($countries as $country) {
            $arr = [];
            $arr['country_id'] = $country->country->id;
            $arr['name'] = $country->country->ch_name;
            $arr['flag'] = $country->country->flag;
            $arr['img'] = $country->img;
            $arr['passport'] = $country->passport;
            $arr['ID_type'] = isset(self::ID_TYPES[$country->ID_type]) ? self::ID_TYPES[$country->ID_type] : '';
            $arr['require'] = $country->live;
            $arr['migrate_cycle'] = $country->migrate;
            $arr['visa_free_number'] = $country->visa_free;
            $arr['rank'] = $country->rank;
            $arr['introduction'] = $country->introduction;
            $result[] = $arr;
        }
        return $result;
    }






}
