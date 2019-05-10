<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/10
 * Time: 20:49
 */



namespace App\Http\Controllers\BaseConfig;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use App\Services\UserTypeService;
use App\Http\Requests\SaveUserTypeRequest;

class UserTypeController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $userTypeService;

    public function __construct(UserTypeService $userTypeService)
    {
        $this->userTypeService = $userTypeService;
    }

    public function index(Request $request)
    {
        $list = $this->userTypeService->getList($request->all());
        return view('user_types.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_types.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(SaveUserTypeRequest $request)
    {
        try {
            $this->userTypeService->save($request->all());
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
        $user_type = $this->userTypeService->getUserTypeById($request->id);
        return view('user_types.create_or_edit', compact('user_type'));
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
            $this->userTypeService->delete($request->id);
            return $this->success();

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            \Log::error($e->getTraceAsString());
            $this->failed($e->getMessage());

        }
    }
}
