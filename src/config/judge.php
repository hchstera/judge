<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authenticatable Model
    |--------------------------------------------------------------------------
    |
    */

    'models' => [
        'users' => 'App\User',
        'fakeusers' => 'Hchs\Judge\Permission\FakeUser', // for testing
    ],
];
