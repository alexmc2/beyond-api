<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    // 'paths' => ['*'],

    // 'allowed_methods' => ['*'],

    // 'allowed_origins' => [env('FRONTEND_URL', 'http://localhost:3000, http://localhost:3001')],

    // 'allowed_origins_patterns' => [],

    // 'allowed_headers' => ['*'],

    // 'exposed_headers' => [],

    // 'max_age' => 0,

    // 'supports_credentials' => true,


    'paths' => ['*'], // Applies to all routes
    'allowed_methods' => ['*'], // Allows all HTTP methods
    'allowed_origins' => ['*'], // Allows all origins
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'], // Allows all headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true, // Allows cookies to be sent
];
