<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
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
        'client_id'     => '127909734464044',
        'client_secret' => 'cc36e90c51780504f9de27215237c74c',
        'redirect'      => 'http://localhost/studyenglishtoday/facebook/callback',
    ],
    'google' => [
        'client_id'     => '761218673365-e45nusp7mk3jo9ujvdcu4opj6b21aopt.apps.googleusercontent.com',
        'client_secret' => '91fR57ImkHanNtrqG7kDzpfi',
        'redirect'      => 'http://localhost/studyenglishtoday/google/callback',
    ],
];
