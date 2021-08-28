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
	   'client_id' => '142291624732207', //Facebook API
	   'client_secret' => '7a7accb424fa01df51b4d58dd3359957', //Facebook Secret
	   'redirect' => 'http://localhost/mindfire/laravel/login/facebook/callback',
	],

	'google' => [
	   'client_id' => '482453504227-mvo27j2jnfdf4qnqueu22u1idjo46h0o.apps.googleusercontent.com',
	   'client_secret' => 'jdhO8EBAx16cAHwnFW6xYsZe',
	   'redirect' => 'http://localhost/mindfire/laravel/login/google/callback',
	],

];
