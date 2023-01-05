<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2018/7/6
 * Time: 14:11
 */

return [
    'menu'=>[
        'data'=> ['label'=>'主页','items'=>[
                ['label' => 'Demo',
                    'items' => [
                        ['label' => 'Demo管理', 'url' => ['/demo']],
                    ]
                ],
                [
                    'label' => '商品分类',
                    'items' => [
                        ['label' => '手机', 'url' => ['/order']],
                    ]
                ]
            ]
        ],
        'setting'=> ['label'=>'系统设置', 'items'=>[
                ['label' => '权限管理',
                    'items' => [
                        ['label' => '用户管理', 'url' => ['/admin/user']],
                        ['label' => '角色管理', 'url' => ['/admin/roles']],
                        ['label' => '权限列表', 'url' => ['/admin/permission']],
                        ['label' => '路由列表', 'url' => ['/admin/route']],
                        ['label' => '规则列表', 'url' => ['/admin/rule']]
                    ]
                ],
                ['label' => '个人中心',
                    'items' => [
                        ['label' => '修改密码', 'url' => ['/admin/personal/reset-password']],
                        ['label' => '充值余额', 'url' => ['/buyer-account/view']],
                        ['label' => '我的购物车', 'url' => ['/shopping-cart']],
                    ],
                ],
                [
                    'label' => '商品管理中心',
                    'items' => [
                        ['label' => '管理商品', 'url' => ['/order/goods-index']],
                    ],
                ]
            ]
        ]
    ]
];
