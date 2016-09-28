<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '367247323663971',
        'client_secret' => 'b56a7ede55369b6af44a984651fa2990',
        'redirect' => 'http://forneeds.dev/login/callback/facebook',
    ],
    'google' => [
        'client_id' => '552797852029-i1944u6ua63008n0t3ar2mej9ntf9sn3.apps.googleusercontent.com',
        'client_secret' => '10Kjp3eYmEEiHa3OLQnOdc6-',
        'redirect' => 'http://forneeds.dev/login/callback/google',
    ],
];
