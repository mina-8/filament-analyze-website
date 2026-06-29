<?php

return [
    'title' => 'Analyze Website',
    'description' => 'Analyze your website and get a detailed report on its performance, SEO, and security.',
    'reports' =>[
        'title' => 'Reports',
        'description' => 'View and analyze website reports.',
        'from' => 'From',
        'to' => 'To',
    ],
    'widget' => [

        'today_visitors' => 'Today Visitors',
        'unique_visitors' => 'Unique Visitors',
        'total_visitors' => 'Total Visits',

        'today_visitors_description' => 'Visits during the current day.',
        'unique_visitors_description' => 'Total unique visitors.',
        'total_visitors_description' => 'Total visits of all time.',

    ],

    'chart' => [
        'heading' => 'Visits Last 7 Days',
        'label' => 'Visits',
    ],

    'top_referrers' => [
        'heading' => 'Top Referrers',
        'referer' => 'Referrer',
        'total' => 'Visits',
    ],
    'top_pages' => [
    'heading' => 'Top Pages',
    'path' => 'Page',
    'total' => 'Visits',
],
];
