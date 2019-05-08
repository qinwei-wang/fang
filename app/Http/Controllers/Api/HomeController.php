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

class HomeController extends Controller
{
    use ApiResponse;


    public function index(HomeManager $homeManager, Request $request)
    {
        return $this->success($homeManager->run($request->all()));
    }

    public function contact(ContactManager $contactManager, CreateCustomerRequest $request)
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
}