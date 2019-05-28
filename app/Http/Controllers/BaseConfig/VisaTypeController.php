<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/16
 * Time: 1:05
 */



namespace App\Http\Controllers\BaseConfig;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Services\VisaTypeService;

class VisaTypeController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $visaTypeService;

    public function __construct(VisaTypeService $visaTypeService)
    {
        $this->visaTypeService = $visaTypeService;
    }

    public function index(Request $request)
    {
        $list = $this->visaTypeService->getList($request->all());
        return view('visa_type.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visa_type.create_or_edit');
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
            $this->visaTypeService->save($request->all());
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
        $visa_type = $this->visaTypeService->getTagById($request->id);
        return view('visa_type.create_or_edit', compact('visa_type'));
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
            $this->visaTypeService->delete($request->id);
            return $this->success();

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            \Log::error($e->getTraceAsString());
            $this->failed($e->getMessage());

        }
    }
}