<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Payment Driver
    |--------------------------------------------------------------------------
    */
    'ipg' => env('IPG', 'stripe'),

    /*
     |--------------------------------------------------------------------------
     | Payment ipgs
     |--------------------------------------------------------------------------
     */
    'drivers' => [
        'stripe' => [
            'mode' => env('STRIPE_MODE', 'test'),
            'test_secret_key' => env('STRIPE_TEST_SECRET_KEY'),
            'test_public_key' => env('STRIPE_TEST_PUBLIC_KEY'),
            'live_secret_key' => env('STRIPE_LIVE_SECRET_KEY'),
            'live_public_key' => env('STRIPE_LIVE_PUBLIC_KEY'),
        ],
        'common_web' => [
            'mode' => env('COMMON_WEB_MODE', 'test'),
            'ssl' => env('SSL', false), //if set to true must have the ssl file
            'ssl_certificate' => env('SSL_CERTIFICATE', null),
            'ssl_verify_peer' => env('SSL_VERIFY_PEER', 0), // 0 = don't verify peer, 1 = do verify
            'ssl_verify_host' => env('SSL_VERIFY_HOST', 0), // 0 = don't verify hostname, 1 = check for existence of hostame, 2 = verify
            'vpc_version' => env('VPC_VERSION', 2),
            'merchant_id' => env('MERCHANT_ID'),
            'merchant_access_code' => env('MERCHANT_ACCESS_CODE'),
            'secure_hash' => env('SECURE_HASH'),
            'default_language' => env('DEFAULT_LANGUAGE', 'en_AU'),
            'currency' => env('CURRENCY', 'AUD'),
            'vpc_client_url' => env('VPC_CLIENT_URL'),
            'vpc_return_url' => env('VPC_RETURN_URL'),
        ]

    ]
];

