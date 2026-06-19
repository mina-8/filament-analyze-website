<?php

return [

    'enabled' => true,

    'track_guests' => true,

    'track_authenticated' => true,

    'middleware' => true,

    'exclude_urls' => [
        'admin/*',
        'api/*',
        '_debugbar/*',
        'livewire/*',
    ],

    'exclude_extensions' => [
        'css',
        'js',
        'png',
        'jpg',
        'jpeg',
        'gif',
        'svg',
        'ico',
        'woff',
        'woff2',
    ],

    'driver' => env('ANALYTICS_DRIVER', 'database'),

];
