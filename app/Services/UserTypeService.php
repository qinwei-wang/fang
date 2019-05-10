<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/10
 * Time: 20:50
 */




namespace App\Services;

use App\Repositories\UserTypeRepository;

class UserTypeService
{

    protected $userTypeRepository;

    public function __construct(UserTypeRepository $userTypeRepository)
    {
        $this->userTypeRepository = $userTypeRepository;
    }


    public function getList($params)
    {
        return $this->userTypeRepository->makeModel()->paginate(20);
    }


    public function save($params)
    {
        return $this->userTypeRepository->makeModel()->updateOrCreate(['id' => array_get($params, 'id', -1)], [
            'title' => $params['title'],
            'description' => $params['description']
        ]);
    }


    public function getUserTypeById($id)
    {
        return $this->userTypeRepository->makeModel()->where('id', $id)->first();
    }


    public function delete($id)
    {
        return $this->userTypeRepository->makeModel()->where('id', $id)->delete();
    }



}