<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/7
 * Time: 17:57
 */




namespace App\Services\Api\Managers;

use App\Services\Api\CustomerService;
use Mail;

class ContactManager
{

    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function run($params)
    {
        Mail::send('emails.reminder', ['params' => $params], function ($m) use ($params) {
            $m->from(env('MAIL_USERNAME'));
            $m->to('156738818@qq.com')->subject($params['name']);
        });
        return $this->customerService->contact($params);
    }
}