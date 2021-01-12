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
            'email' => array_get($params, 'email'),
            'name' => array_get($params, 'name'),
            'phone' => array_get($params, 'phone'),
            'age' => array_get($params, 'age'),
            'english_level' => array_get($params, 'english_level'),
            'education' => array_get($params, 'education'),
            'we_chat' => array_get($params, 'we_chat'),
            'text' => array_get($params, 'text'),
        ]);
    }
}