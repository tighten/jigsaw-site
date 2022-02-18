---
extends: _layouts.documentation
section: documentation_content
---

#### [Collections](/docs/collections)
## Mapping

You can map over your collection items by adding a `map` key to the collection's array in `config.php`, and specifying a callback that accepts the collection item. Each item is an instance of the `TightenCo\Jigsaw\Collection\CollectionItem` class, from which you can instantiate your own custom class using the static `fromItem()` method. Your custom class can include helper methods that might be too complex for storing in your `config.php` array.

> _config.php_

```php
<?php

return [
    'collections' => [
        'posts' => [
            'map' => function ($post) {
                return Post::fromItem($post);
            }
        ],
    ],
];
```

Your custom `Post` class should extend `TightenCo\Jigsaw\Collection\CollectionItem`, and could include helper functions, reference and/or modify page variables, etc.:

```php
<?php

use TightenCo\Jigsaw\Collection\CollectionItem;

class Post extends CollectionItem
{
    public function getAuthorNames()
    {
        return implode(', ', $this->author);
    }
}
```
