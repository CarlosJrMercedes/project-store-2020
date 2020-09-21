<?php

return [

    'client_id' => env('PAYPAL_CLIENT_ID'),

    'secret' => env('PAYPAL_SECRET'),

    'mode' => [
        'key' => env('PAYPAL_MODE'),
        'default' => env('sandbox'),
    ],
    'settings' => [
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => [
            'path' => storage_path('/logs/paypal.log'),
        ],
        'log.LogLevel' => 'ERROR'
    ],
];
