<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Uber Environment
    |--------------------------------------------------------------------------
    |
    | Set to sandbox mode using "local" or "production"
    |
    */
    'uber_env' => env('UBER_ENV', env('APP_ENV')),

    /*
    |--------------------------------------------------------------------------
    | Uber ID
    |--------------------------------------------------------------------------
    |
    | Access token that can be found in your Uber dashboard
    |
    */
    'uber_id' => env('UBER_ID'),

    /*
    |--------------------------------------------------------------------------
    | Uber Secret
    |--------------------------------------------------------------------------
    |
    | Access token that can be found in your Uber dashboard
    |
    */
    'uber_secret' => env('UBER_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem driver used to send to Uber Business
    |--------------------------------------------------------------------------
    |
    | Must be sent via SFTP
    |
    */
    'sftp_driver' => env('UBER_DRIVER', 'sftp'),
];
