<?php

use Illuminate\Support\Facades\Auth;

return [
    /**
     * 巡覽列
     *
     * 基本格式：'連結名稱' => '連結路由'
     *
     * 多層：二級選單以下拉式選單呈現，更多層級以巢狀顯示，太多層可能會超過螢幕顯示範圍
     * 外部連結：在連結路由部分，直接填上完整網址（開頭需包含協定類型）
     * 新分頁開啟：外部連結或路由開頭為「!」者會由新分頁開啟
     */

    //基本巡覽列
    'navbar' => [],
    //會員
    'user' => [
        '%user%' => [
            '個人資料' => 'user/profile',
            '修改密碼' => 'user/change-password',
            '登出' => 'user/logout'
        ]
    ],
    //管理員
    'admin' => [
        'Dashboard' => [
            'Record' => 'dashboard/record'
        ],
        '站點管理' => [
            '成員清單' => 'user'
        ]
    ],
    //遊客
    'guest' => [
        '登入' => 'user/login'
    ]
];
