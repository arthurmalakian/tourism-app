<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Url
    |--------------------------------------------------------------------------
    |
    | This value is the base url of the Queropassagem API your application will use.
    |
    */

    'url' => env('QUERO_PASSAGEM_URL', 'http://localhost:8000'),

    /*
    |--------------------------------------------------------------------------
    | API User
    |--------------------------------------------------------------------------
    |
    | This value is the name of the user for Queropassagem API. This is required
    | for authentication.
    |
    */

    'user' => env('QUERO_PASSAGEM_USER', 'user'),

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the password for Queropassagem API. This is required for
    | authentication.
    |
    */

    'password' => env('QUERO_PASSAGEM_PASSWORD', 'password'),

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the afiliate code for Queropassagem API.
    |
    */

    'code' => env('QUERO_PASSAGEM_CODE', 'code'),
];
