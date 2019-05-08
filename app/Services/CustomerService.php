<?php
/**
 * Created by PhpStorm.
 * User: sin
 * Date: 2019/5/5
 * Time: 17:04
 */


namespace App\Services;

use App\Repositories\CustomerRepository;

class CustomerService
{

    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }


    public function getCustomers($params)
    {
        $model = $this->customerRepository->makeModel();
        if (isset($params['name']) && !empty($params['name'])) {
            $model = $model->where('name', 'like', '%' . $params['name'] . '%');
        }

        if (isset($params['email']) && !empty($params['email'])) {
            $model = $model->where('email', 'like', '%' . $params['email'] . '%');
        }

        if (isset($params['phone']) && !empty($params['phone'])) {
            $model = $model->where('phone', 'like', '%' . $params['phone'] . '%');
        }

        return $model->paginate(20);
    }



}