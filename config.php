<?php

use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\SmartPunct\SmartPunctExtension;
use League\CommonMark\Extension\Strikethrough\StrikethroughExtension;
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
            new AttributesExtension,
            new SmartPunctExtension,
            new StrikethroughExtension,
            new TableExtension,
            new HeadingPermalinkExtension(),
        ],
    ],
];
