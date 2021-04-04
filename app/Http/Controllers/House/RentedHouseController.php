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
use App\Services\RentedHouseService;
use App\Traits\ApiResponse;
use App\Models\TagModel;
use App\Models\VisaTypeModel;
use App\Models\UserTypeModel;

class RentedHouseController extends Controller
{
    use ApiResponse;

    public $newHouseService;

    public function __construct(RentedHouseService $newHouseService)
    {
        $this->newHouseService = $newHouseService;
    }

    public function index(Request $request)
    {
        $list = $this->newHouseService->getList($request->all());
        return view('rented_houses.index', compact('list')); 
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userTypes = UserTypeModel::all();
        $tags = TagModel::all();
        $dities = VisaTypeModel::orderBy('color')->get();
        return view('rented_houses.create_or_edit', ['tags' => $tags, 'dities' => $dities, 'userTypes' => $userTypes]);
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
        $dities = VisaTypeModel::orderBy('color')->get();
        $userTypes = UserTypeModel::all();

        $house = $this->newHouseService->getItem($request->id);
        return view('rented_houses.create_or_edit', ['house' => $house, 'tags' => $tags, 'dities' => $dities, 'userTypes' => $userTypes]);
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