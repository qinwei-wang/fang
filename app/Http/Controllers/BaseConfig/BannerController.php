<?php

namespace App\Http\Controllers\BaseConfig;

use Illuminate\Cache\Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BannerService;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected $bannerService;

    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function index(Request $request)
    {
        $list = $this->bannerService->getList($request->input('platform', 'PC'));
        return view('banners.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banners.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->bannerService->save($request->all());
            return ['status' => 'success'];
        } catch(\Exception $e) {
           \Log::error($e->getMessage());
           \Log::error($e->getTrace());
           return ['status' => 'fail', 'message'=> $e->getMessage()];
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = $this->bannerService->getBannerById($id);
        return view('banners.create_or_edit', compact('banner'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        try {
            $this->bannerService->delete($request->id);
            return ['status' => 'success'];

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            \Log::error($e->getTrace());
            return ['status' => 'fail', 'message' => $e->getMessage()];

        }
    }
}
