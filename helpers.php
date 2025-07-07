<?php

use Illuminate\Support\Str;

return [
    'selected' => function ($page, $section) {
        return Str::contains($page->getPath(), $section);
    },
];
