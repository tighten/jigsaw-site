---
extends: _layouts.documentation
section: documentation_content
---

#### [Collections](/docs/collections)
## Sorting

You can control the order in which your collection items are sorted. When iterating over your collection in a `@foreach` loop, the items will be returned in the order you specify.


### Default Sort

By default, collection items will be sorted by their filenames in ascending order. This can be a handy way to order items by date, for instance, by prepending the date to each filename:

```text
2017-01-01-my-first-post.md
2017-02-14-my-second-post.md
2017-03-15-my-third-post.md
...
```

### Sorting by a Variable

You can also sort your collection by the values of variables defined in the YAML front matter of each collection item. Add a `sort` key to the collection's array in `config.php`, and specify the name of the field to sort by:

> _config.php_

```php
<?php

return [
    'collections' => [
        'posts' => [
            'sort' => 'sort_order',
        ],
    ],
];
```

To sort by multiple variables (for a hierarchical sort), specify an array of variables:

> _config.php_

```php
<?php

return [
    'collections' => [
        'posts' => [
            'sort' => ['featured', 'date'],
        ],
    ],
];
```

To sort in descending order, prepend a `-` to the variable name:

> _config.php_

```php
<?php

return [
    'collections' => [
        'posts' => [
            'sort' => ['featured', '-date'],
        ],
    ],
];
```
