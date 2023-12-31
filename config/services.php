<?php

use App\Services\Meli\Contracts\MeliService;

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
        'domain'   => env('MAILGUN_DOMAIN'),
        'secret'   => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme'   => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key'    => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'meli' => [

    ],

    'mercadolibre' => [
        'client_id'       => env('MERCADOLIBRE_CLIENT_ID'),
        'client_secret'   => env('MERCADOLIBRE_CLIENT_SECRET'),
        'redirect'        => env('MERCADOLIBRE_REDIRECT_URI'),
        'country'         => env('MERCADOLIBRE_COUNTRY', 'AR'),
        'site_id'         => env('MERCADOLIBRE_SITE_ID'),
        'base_url'        => env('MERCADOLIBRE_BASE_URL', MeliService::BASE_URL),
        'timeout'         => env('MERCADOLIBRE_TIMEOUT', 15),
        'connect_timeout' => env('MERCADOLIBRE_CONNECT_TIMEOUT', 15),
        'access_token'    => env('MERCADOLIBRE_ACCESS_TOKEN')
    ],
];
