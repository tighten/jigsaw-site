<?php

use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;

return [
    'production' => false,
    'baseUrl' => 'http://jigsaw-site.test',
    'navigation' => include_once('./navigation.php'),
    'commonmark' => [
        'config' => [
            'heading_permalink' => [
                'id_prefix' => '',
                'apply_id_to_heading' => true,
                'heading_class' => '',
                'insert' => 'none',
            ],
        ],
        'extensions' => [
            new HeadingPermalinkExtension(),
        ],
    ],
];
