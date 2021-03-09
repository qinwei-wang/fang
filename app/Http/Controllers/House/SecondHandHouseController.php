<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/8
 * Time: 14:12
 */


namespace App\Http\Controllers\House;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SecondHandHouseService;
use App\Traits\ApiResponse;

class SecondHandhouseController extends Controller
{
    use ApiResponse;

    public $newHouseService;

    public function __construct(SecondHandHouseService $newHouseService)
    {
        $this->newHouseService = $newHouseService;
    }

    public function index(Request $request)
    {
        $list = $this->newHouseService->getList($request->all());
        return view('second_hand_houses.index', compact('list')); 
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('second_hand_houses.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $this->newHouseService->save($request->all());
        return $this->success();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $house = $this->newHouseService->getItem($request->id);
        return view('second_hand_houses.create_or_edit', compact('house'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $this->newHouseService->deleteItem($request->id);
        return $this->success();
    }
}