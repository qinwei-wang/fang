<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/11
 * Time: 11:59
 */


namespace App\Services\Api;
use App\Repositories\UserTypeRepository;

class UserTypeService
{
    protected $userTypeRepository;

    public function __construct(UserTypeRepository $userTypeRepository)
    {
        $this->userTypeRepository = $userTypeRepository;
    }

    public function getUserTypes($ids)
    {
        return $this->userTypeRepository->makeModel()->whereIn('id', $ids)->get();
    }
}