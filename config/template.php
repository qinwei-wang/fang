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
                    'title' => 'banner',
                    'site' => '*',
                    'link' => '/base-config/banner',
                    'roles' => '*',
                    'is_active' => false,
                ],
                [
                    'icon' => 'fa fa-fire',
                    'title' => '国家列表',
                    'site' => '*',
                    'link' => '/base-config/country',
                    'roles' => '*',
                    'is_active' => false,
                ],

            ]
        ],
        [
            'roles' => '*',
            'is_open' => false,
            'icon' => 'fa fa-gear',
            'site' => '*',
            'title' => '内容管理',
            'menus' => [

                [
                    'icon' => 'fa fa-fire',
                    'title' => '签证国家',
                    'site' => '*',
                    'link' => '/base-config/banner',
                    'roles' => '*',
                    'is_active' => false,
                ],

            ]
        ]
    ]
];



