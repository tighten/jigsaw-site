---
extends: _layouts.documentation
section: documentation_content
---

#### [Collections](/docs/collections)
## Filtering

You can filter collection items by adding a `filter` key to the collection's array in `config.php`, and specifying a callable that accepts the collection item and returns a boolean. Items that return `false` from the filter will not be built.

A common use for filtering is to mark some blog posts as `published`, using a variable in the YAML front matter of each collection item that specifies a boolean or a date. Using a filter in `config.production.php`, draft posts can be made visible in the local or staging [environments](/docs/building-and-previewing-environments), but omitted from your production build.

> Note that by default, variables from environment-specific config files are _not_ merged recursively; only the top-level keys are considered for merging. For collections, you can override this behavior by setting `merge_collection_configs` to `true` in your main `config.php` file. This will allow you to only specify the environment-specific changes to your `collections` settings.

> _config.php_

```php
<?php

return [
    'merge_collection_configs' => true,
    'collections' => [
        'posts' => [
            'filter' => function ($item) {
                return $item->published;
            },
            // other settings for this collection...
        ],
        // other collections...
    ],
];
```

> _config.production.php_

```php
<?php

return [
    'collections' => [
        'posts' => [
            'filter' => function ($item) {
                return $item;
            }
        ],
    ],
];
```
