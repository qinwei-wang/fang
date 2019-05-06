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
use App\Services\Api\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ApiResponse;

    protected $homeService;

    public function index(HomeService $homeService, Request $request)
    {
        try {
           return $this->success($homeService->run($request->all()));
        } catch (\Exception $e) {
            return $this->failed($e->getMessage());
        }
    }
}