<?php

return [
    /**
     * rtl || ltr
     */
    'alignment' => 'rtl',

    /*
     * "name" means route name
     */
    'separator_driver' => 'name',

    'ignore_list' => [
        '',
        'admin',
        'admin.',
        'admin.dashboard',
        'dashboard',
        'panel',
        'login',
        'logout',
        'admin.login',
        'admin.logout'
    ]
];
