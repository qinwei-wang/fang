<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/7
 * Time: 18:02
 */


namespace App\Services\Api;
use App\Repositories\CustomerRepository;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function contact($params)
    {
        return $this->customerRepository->makeModel()->create([
            'email' => $params['email'],
            'name' => $params['name'],
            'phone' => $params['phone'],
            'age' => $params['age'],
            'english_level' => $params['english_level'],
            'education' => $params['education'],
        ]);
    }
}