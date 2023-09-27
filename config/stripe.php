<?php

use Illuminate\Support\Facades\Facade;

return [
    /*
    |--------------------------------------------------------------------------
    | Stripe payment config file
    |--------------------------------------------------------------------------
    |
    | Add stripe related config and env config values here.
    |
    */
    'stripe_key' => env('STRIPE_KEY'),
    'stripe_secret' => env('STRIPE_SECRET'),
];
