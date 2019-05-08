<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/5
 * Time: 17:02
 */


namespace App\Http\Controllers\BaseConfig;

use App\Http\Controllers\Controller;
use App\Services\CountryService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    use ApiResponse;

    protected $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    /**
     * 首页国家列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $list = $this->countryService->getList($request->all());
        return view('countries.index', compact('list'));
    }


    /**
     * 移民详情
     */
    public function detail(Request $request)
    {
        $country_detail = $this->countryService->getDetail($request->country_id);
        return view('countries.detail', compact('country_detail'));
    }


    /**
     * 保存国家移民详情设置
     * @param Request $request
     */
    public function saveDetail(Request $request)
    {
        try {
             $this->countryService->saveDetail($request->all());
             return $this->success();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            \Log::error($e->getTrace());
            return $this->failed($e->getMessage());
        }
    }


    public function passport()
    {

    }

}