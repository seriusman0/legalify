<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Admin URL Key
    |--------------------------------------------------------------------------
    |
    | This key is used for the admin dashboard URL. It should be a random,
    | hard-to-guess string. Change this in your production environment
    | and keep it secret.
    |
    */
    'url_key' => env('ADMIN_URL_KEY', 'secure-' . bin2hex(random_bytes(8))),

    /*
    |--------------------------------------------------------------------------
    | Admin Access Settings
    |--------------------------------------------------------------------------
    |
    | Additional security settings for admin access
    |
    */
    'max_login_attempts' => 3,
    'lockout_time' => 300, // 5 minutes in seconds
];
