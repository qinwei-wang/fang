<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/6
 * Time: 23:11
 */

/**
 * 项目后期如果需求变大，需将api单独作为一个项目实现
 */
namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Services\Api\Managers\HomeManager;
use App\Services\Api\Managers\ContactManager;
use App\Http\Requests\CreateCustomerRequest;
use Illuminate\Http\Request;
use App\Services\Api\CountryService;
use App\Services\Api\NewsService;
use Torann\GeoIP\Facades\GeoIP;
use Mail;
use App\Services\NewHouseService;
use App\Services\SecondHandHouseService;

class HomeController extends Controller
{
    use ApiResponse;



    public function index(HomeManager $homeManager, Request $request)
    {
        return $this->success($homeManager->run($request->all()));
    }

    public function contact(ContactManager $contactManager, Request $request)
    {
        try {
            $contactManager->run($request->all());
            return $this->success();
        } catch (\Exception $e){
            \Log::error($e->getMessage());
            \Log::error($e->getTraceAsString());
            return $this->failed($e->getMessage());

        }
    }

    public function sendEmail(Request $request)
    {
        $params = $request->all();
        Mail::send('emails.reminder', ['params' => $params], function ($m) use ($params) {
            $m->from(env('MAIL_USERNAME'));
            $m->to('peterwusg@gmail.com')->subject($params['name']);
        });
        return $this->success();
    }


    public function getRecommendCountries(CountryService $countryService, Request $request)
    {
        return $this->success($countryService->getRecommendCountries($request->all()));
    }

    public function getCountryInfo(CountryService $countryService, $id)
    {
        return $this->success($countryService->getCountryInfoById($id));
    }


    public function getPassportsInfo(CountryService $countryService)
    {
        $passport_info = $countryService->getPassportsInfo();
        return $this->success($passport_info);
    }

    public function getNewsList(Request $request, NewsService $newsService)
    {
        $news = $newsService->getNewsList($request);
        return $this->success(['news_list' => $news]);
    }

    public function getNews(Request $request, NewsService $newsService)
    {
        $news = $newsService->getNewsById($request->id);
        return $this->success($news);
    }

    public function getRecommendNews(Request $request, NewsService $newsService)
    {
        $news = $newsService->getRecommendNews($request);
        return $this->success(['recommend_news_list' => $news]);
    }

    public function getCountry(Request $request)
    {
        $location = GeoIP::getLocation($request->ip);
        $isChina = in_array($location->iso_code, ['CN', 'HK', 'TW'])? 1 : 0;
        return $this->success(['isChina' => $isChina]);
    }

    public function getNewHouseList(Request $request, NewHouseService $newHouseService)
    {
        $list = $newHouseService->getApiList($request->all());
        return $this->success($list);
    }

    public function getNewHouseDetail(Request $request,  NewHouseService $newHouseService)
    {
        $house = $newHouseService->getApiDetail($request->id);
        return $this->success(['new_house' => $house]); 
    }

    public function getNewHouseRecommend(Request $request,  NewHouseService $newHouseService)
    {
        $result = $newHouseService->getApiRecommend();
        return $this->success($result); 
    }

    public function getSecondHandHouseList(Request $request, SecondHandHouseService $newHouseService)
    {
        $list = $newHouseService->getApiList($request->all());
        return $this->success($list);
    }

    public function getSecondHandHouseDetail(Request $request,  SecondHandHouseService $newHouseService)
    {
        $house = $newHouseService->getApiDetail($request->id);
        return $this->success(['second_hand_house' => $house]); 
    }
}
