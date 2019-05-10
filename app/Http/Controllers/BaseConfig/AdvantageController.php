<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/10
 * Time: 13:52
 */



namespace App\Http\Controllers\BaseConfig;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Services\AdvantageService;
use App\Http\Requests\SaveAdvantageRequest;

class AdvantageController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $bannerService;

    protected $advantageService;

    public function __construct(AdvantageService $advantageService)
    {
        $this->advantageService = $advantageService;
    }

    public function index(Request $request)
    {
        $list = $this->advantageService->getList($request->all());
        return view('advantages.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advantages.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(SaveAdvantageRequest $request)
    {
        try {
            $this->advantageService->save($request->all());
            return $this->success();
        } catch(\Exception $e) {
            \Log::error($e->getMessage());
            \Log::error($e->getTraceAsString());
            return $this->failed($e->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $advantage = $this->advantageService->getAdvantageById($request->id);
        return view('advantages.create_or_edit', compact('advantage'));
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
            $this->advantageService->delete($request->id);
            return $this->success();

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            \Log::error($e->getTraceAsString());
            $this->failed($e->getMessage());

        }
    }
}
