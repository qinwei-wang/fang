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
use App\Models\VisaTypeModel;
use App\Models\UserTypeModel;
class OfficeController extends Controller
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
        $params['type'] = '5';
        $list = $this->newHouseService->getList($params);
      
        return view('office.index', compact('list')); 
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tags = UserTypeModel::all();
        $dities = VisaTypeModel::orderBy('color')->get();
        return view('office.create_or_edit', ['tags' => $tags, 'dities' => $dities]); 
        
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
        $tags = UserTypeModel::all();
        $dities = VisaTypeModel::orderBy('color')->get();
        $house = $this->newHouseService->getItem($request->id);
        return view('office.create_or_edit', compact('house', 'tags', 'dities'));
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