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
            'title' => '客户管理',
            'menus' => [

                [
                    'icon' => 'fa fa-fire',
                    'title' => '咨询客户',
                    'site' => '*',
                    'link' => '/customers',
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
            'title' => '新闻管理',
            'menus' => [

                [
                    'icon' => 'fa fa-fire',
                    'title' => '新闻',
                    'site' => '*',
                    'link' => '/news',
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
                'title' => '房屋管理',
                'menus' => [
    
                    [
                        'icon' => 'fa fa-fire',
                        'title' => '新房',
                        'site' => '*',
                        'link' => '/house/new_house',
                        'roles' => '*',
                        'is_active' => false,
                    ],
                    [
                        'icon' => 'fa fa-fire',
                        'title' => '二手房',
                        'site' => '*',
                        'link' => '/house/second_hand_house',
                        'roles' => '*',
                        'is_active' => false,
                    ],
                    [
                        'icon' => 'fa fa-fire',
                        'title' => '租房',
                        'site' => '*',
                        'link' => '/house/rented_house',
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
                    'title' => '商业地产',
                    'menus' => [
        
                        [
                            'icon' => 'fa fa-fire',
                            'title' => '新加坡商业地产',
                            'site' => '*',
                            'link' => '/business/estate',
                            'roles' => '*',
                            'is_active' => false,
                        ],
                        [
                            'icon' => 'fa fa-fire',
                            'title' => '分层地契商业办公大楼',
                            'site' => '*',
                            'link' => '/business/office',
                            'roles' => '*',
                            'is_active' => false,
                        ],
                        [
                            'icon' => 'fa fa-fire',
                            'title' => '保留型店屋',
                            'site' => '*',  
                            'link' => '/business/retention',
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
                        'title' => '设置',
                        'menus' => [
            
                            [
                                'icon' => 'fa fa-fire',
                                'title' => '公共设施',
                                'site' => '*',
                                'link' => '/base-config/tag',
                                'roles' => '*',
                                'is_active' => false,
                            ],
                            [
                                'icon' => 'fa fa-fire',
                                'title' => '便利设施',
                                'site' => '*',
                                'link' => '/base-config/user_type',
                                'roles' => '*',
                                'is_active' => false,   
                            ],
                            [
                                'icon' => 'fa fa-fire',
                                'title' => '地铁',
                                'site' => '*',
                                'link' => '/base-config/visa_type',
                                'roles' => '*',
                                'is_active' => false,   
                            ],
                          
            
                        ]
                    ]
    ]
];



