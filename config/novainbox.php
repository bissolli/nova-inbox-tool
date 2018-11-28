<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Tables name
    |--------------------------------------------------------------------------
    */
    'tables' => [
        'threads' => 'threads',
        'messages' => 'messages',
    ],

    'models' => [
        'admin' => \App\User::class,
        'member' => \App\Member::class,
    ]
];
