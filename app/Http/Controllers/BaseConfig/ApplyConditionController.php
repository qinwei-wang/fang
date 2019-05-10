<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/11
 * Time: 1:37
 */





namespace App\Http\Controllers\BaseConfig;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Services\ApplyConditionService;

class ApplyConditionController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $applyConditionService;

    public function __construct(ApplyConditionService $applyConditionService)
    {
        $this->applyConditionService = $applyConditionService;
    }

    public function index(Request $request)
    {
        $list = $this->applyConditionService->getList($request->all());
        return view('apply_conditions.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apply_conditions.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        try {
            $this->applyConditionService->save($request->all());
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
        $apply_condition = $this->applyConditionService->getAdvantageById($request->id);
        return view('apply_conditions.create_or_edit', compact('apply_condition'));
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
            $this->applyConditionService->delete($request->id);
            return $this->success();

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            \Log::error($e->getTraceAsString());
            $this->failed($e->getMessage());

        }
    }
}
