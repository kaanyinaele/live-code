<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => '2554376681551720',
        'client_secret' =>'8821cc694a3b0bb62086a81b663198fd',
        'redirect' =>'https://ogaworkmen.devtechnosys.tech/auth/facebook/callback/',

    ],
    'twitter' => [
         'client_id' => '9lqAJECa6GkIi2AZFafrdH69X',
         'client_secret' => 'X6ryAnfuTQEpPArr9nCMP0DtcjGHOHnd1g6A8MApn6SfbjvB9f',
         'redirect' => 'https://ogaworkmen.devtechnosys.tech/auth/twitter/callback/',
     ],
     'google' => [
         'client_id' => '211182903351-27cujbh1j6b8gulfmi0rt7dfsu24rl9d.apps.googleusercontent.com',
         'client_secret' => 'tnjU4EhwmG8XWWGYnj90-2NU',
         'redirect' => 'http://ogaworkmen.devtechnosys.tech/auth/google/callback',
     ],

];
