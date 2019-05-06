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
use Illuminate\Http\Request;

class CountryController extends Controller
{

    protected $countryService;

    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }


    public function index(Request $request)
    {
        $list = $this->countryService->getList($request->all());
        return view('countries.index', compact('list'));
    }


    /**
     * 详情
     */
    public function detail(Request $request)
    {
        $country_detail = $this->countryService->getDetail($request->id);
        return view('countries.detail', compact('country_detail'));
    }
}