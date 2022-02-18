---
extends: _layouts.documentation
section: documentation_content
---

## Helper Methods

In addition to storing variables in `config.php`, you can also define helper methods by adding a key with the name of the function and returning a closure. Helper methods are called by referencing the method name from the `$page` object in any Blade template.

The method's closure automatically receives the current `$page` as its first parameter. Additional parameters can be specified as well, and passed to the method when it is called in your template.

For instance, you can add a method that identifies if the current page belongs to a particular section, for highlighting the current section in a menu template:


> _config.php_

```php
<?php

use Illuminate\Support\Str;

return [
    'company' => 'Tighten',
    'selected' => function ($page, $section) {
        return Str::contains($page->getPath(), $section) ? 'selected' : '';
    },
];
```

This method is accessible by calling `$page->selected()` from any page.

Now, we can build a menu partial that highlights the current menu item for each page:

> _\_menu.blade.php_

```blade
<a class="{{ $page->selected('about') }}" href="{{ $page->baseUrl }}/about">About Us</a>
<a class="{{ $page->selected('projects') }}" href="{{ $page->baseUrl }}/projects">Projects</a>
<a class="{{ $page->selected('posts') }}" href="{{ $page->baseUrl }}/posts">Blog</a>
```

Alternatively, global helper methods can be stored in a separate `helpers.php` file, located at the root level of your project. This file should return an array, and will be merged into `config.php` automatically if present.
