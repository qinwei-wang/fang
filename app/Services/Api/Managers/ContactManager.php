<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/7
 * Time: 17:57
 */




namespace App\Services\Api\Managers;

use App\Services\Api\CustomerService;

class ContactManager
{

    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function run($params)
    {
        return $this->customerService->contact($params);
    }
}