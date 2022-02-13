<?php

return [
    'theme' => 'github-light',
    'token' => env('TORCHLIGHT_TOKEN'),
    'blade_components' => true,
    'host' => 'https://api.torchlight.dev',
    'cache_path' => 'torchlight_cache',
    'request_timeout' => 15,
    'options' => [
        'lineNumbers' => true,
        'lineNumbersStyle' => '',
        'diffIndicators' => true,
        'diffIndicatorsInPlaceOfLineNumbers' => true,
        'summaryCollapsedIndicator' => '...',
    ],
];
