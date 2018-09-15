<?php

return [

    /*
     * Use this setting to enable the cookie consent dialog.
     */
    'enabled' => env('COOKIE_CONSENT_ENABLED', true),

    /*
     * The name of the cookie in which we store if the user
     * has agreed to accept the conditions.
     */
    'cookie_name' => env('LARAVEL_COOKIE_CONTENT', 'laravel_cookie_consent'),

    /*
     * Set the cookie duration in days.  Default is 365 * 20.
     */
    'cookie_lifetime' => env('COOKIE_LIFETIME', 365 * 20),
];
