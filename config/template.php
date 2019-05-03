<?php
/**
 * Created by PhpStorm.
 * User: patpat
 * Date: 2019/5/3
 * Time: 13:56
 */



return [
    'menus' => [
        [
            'roles' => '*',
            'is_open' => false,
            'icon' => 'fa fa-gear',
            'site' => '*',
            'title' => '基础配置',
            'menus' => [

                [
                    'icon' => 'fa fa-fire',
                    'title' => 'banner设置',
                    'site' => '*',
                    'link' => '/base-config/banner',
                    'roles' => '*',
                    'is_active' => false,
                ],
                [
                    'icon' => 'fa fa-exchange',
                    'title' => 'Exchange rate',
                    'site' => '*',
                    'link' => '/config/exchange_rate/list',
                    'roles' => '*',
                    'is_active' => false,
                ],

            ]
        ]
    ]
];



