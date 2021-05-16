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

        $params['email_title'] = $params['email_title'] ?? '';

        $map = [
            'type' => '咨询方向',
            'name' => '名称',
            'property_location' => '物业所在位置',
            'expected_price' => '期望价格',
            'name' => '姓名',
            'email' => '邮箱地址',
            'contact' => '联系方式',
            'house_number' => '门牌unit',
            'big_house_number' => '大牌block',
            'tel' => '号码',
            'message' => '留言',
            'advisory_type' => '类型',
        ];
        $data = [];
        foreach ($params as $k => $item) {
            if ($k == 'address_type') {
                $data[$item] = $params['address'];
            } else {
                $key = isset($map[$k]) ? $map[$k] : $k;
                $data[$key] = $item;
            }
        }

        unset($data['address']);
        unset($data['email_title']);
        unset($data['protocol']);

        

        Mail::send('emails.house', ['params' => $data], function ($m) use ($params) {
            $m->from(env('MAIL_USERNAME'));
            $m->to('pwzcapital@hotmail.com')->subject('有一封新邮件');
        });
       
        return $this->customerService->contact($params);
    }
}