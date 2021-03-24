<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/7
 * Time: 18:02
 */


namespace App\Services\Api;
use App\Repositories\CustomerRepository;
use App\Models\Mongo\ContactModel;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function contact($params)
    {
        return ContactModel::create($params);
    }
}