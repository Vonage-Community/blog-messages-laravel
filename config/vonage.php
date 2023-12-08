<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Credentials
    |--------------------------------------------------------------------------
    |
    | If you're using API credentials, change these settings. Get your
    | credentials from https://dashboard.nexmo.com | 'Settings'.
    |
    */

    'application_id' => env('VONAGE_APPLICATION_ID'),
    'private_key_path' => base_path() . '/' . env('VONAGE_PRIVATE_KEY_PATH'),
    'from_number' => env('VONAGE_FROM_NUMBER'),
];
