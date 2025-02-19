<?php

return [

    'auth' => [
        'guard' => env('FILAMENT_AUTH_GUARD', 'web'),
        'pages' => [
            'login' => \App\Filament\Pages\Auth\Login::class,
            'register' => \App\Filament\Pages\Auth\Register::class,
        ],
    ],

];
