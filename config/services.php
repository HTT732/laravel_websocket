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
        'client_id' => '230665852225281',
        'client_secret' => '330aa90f7b3d349f29b2a4d73a40b35d',
        'redirect' => 'https://f64469936053.ngrok.io/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '655612937910-mkcdtk1up1o3ju2hiisetrtffpkj06qt.apps.googleusercontent.com',
        'client_secret' => 'hYjkUvLLOGRYEL1ScGvQEnLp',
        'redirect' => 'https://f64469936053.ngrok.io/login/google/callback',
    ]
];
