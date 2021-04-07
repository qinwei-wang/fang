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
use App\Services\NewHouseService;
use App\Traits\ApiResponse;
use App\Services\BusinessHouseService;
use App\Models\TagModel;
use App\Models\UserTypeModel;

class BusinessHouseController extends Controller
{
    use ApiResponse;

    public $newHouseService;

    public function __construct(BusinessHouseService $newHouseService)
    {
        $this->newHouseService = $newHouseService;
    }

    public function index(Request $request)
    {
        $params = $request->all();
        $params['type'] = '4';
        $list = $this->newHouseService->getList($params);
        return view('estate.index', compact('list')); 
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tags = TagModel::all();
        $userTypes = UserTypeModel::all();
        return view('estate.create_or_edit', ['tags' => $tags, 'user_types' => $userTypes]);
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
        $tags = TagModel::all();
        $userTypes = UserTypeModel::all();

        $house = $this->newHouseService->getItem($request->id);
        return view('estate.create_or_edit', compact('house', 'tags', 'user_types'));
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