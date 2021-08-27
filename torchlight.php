<?php

return [
    'theme' => 'github-light',
    'token' => env('TORCHLIGHT_TOKEN'),
    'blade_components' => true,
    'request_timeout' => 15,
    'options' => [
        'lineNumbers' => true,
        // 'lineNumbersStyle' => '',
        'diffIndicators' => true,
        'diffIndicatorsInPlaceOfLineNumbers' => true,
        // 'summaryCollapsedIndicator' => '...',
    ],
];
