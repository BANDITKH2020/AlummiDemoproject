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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    
        
        'google' => [
            'client_id' => '717261811237-rc473vdh42k2u7l1tusf3vp8iitdjk02.apps.googleusercontent.com',
            'client_secret' => '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',
            'redirect' => 'http://localhost:8085/auth/google/callback',
        ],



        'recaptcha' => [
            'site_key' => env('RECAPTCHA_SECRET'),
            'secret' => env('RECAPTCHA_SITEKEY'),
        ],
        
    
    

    

];
