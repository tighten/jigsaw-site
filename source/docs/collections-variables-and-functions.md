---
extends: _layouts.documentation
section: documentation_content
---

#### [Collections](/docs/collections)
## Variables & Helper Functions

Each collection can have its own set of variables and helper methods defined in the collection array in `config.php`. These follow the same format as the site-wide [variables](/docs/site-variables) and [helper methods](/docs/helper-methods) that are defined at the top level of the `config.php` array.

### Variables

Just as with site-wide variables, collection variables defined in `config.php` can act as defaults, which can be overridden by variables of the same name specified in the YAML front matter of a collection item. In fact, top-level variables in `config.php` will be overridden by variables of the same name in a collection's array, which will be further overridden by references in the YAML header of any individual page, allowing you to set up a cascade of variable defaults. For example:

> _config.php_

```php
<?php

return [
    'author' => 'Default Site Author',
    'collections' => [
        'posts' => [
            'author' => 'Default Blog Author',
        ],
    ],
];
```

> _\_posts/blog-post-1.blade.php_

```blade
---
extends: _layouts.post
title: My First Post
author: Keith Damiani
---
@section ('content')

<h1>{{ $page->title }}</h1>
<p>By {{ $page->author }}</p>

@endsection
```

For this collection item, author will be *Keith Damiani*, the value from the YAML header.

---

> _\_posts/blog-post-2.blade.php_

```blade
---
extends: _layouts.post
title: My Second Post
---
@section ('content')

<h1>{{ $page->title }}</h1>
<p>By {{ $page->author }}</p>

@endsection
```

For this collection item, author will be *Default Blog Author*, the value from the `posts` array in `config.php`.

> _about-us.blade.php_

```blade
---
extends: _layouts.about
title: About our company
---
@section ('content')

<h1>{{ $page->title }}</h1>
<p>By {{ $page->author }}</p>

@endsection
```

For this regular (non-collection) page, author will be *Default Site Author*, the value from the top level of `config.php.`

### Helper Functions

Helper functions can be included in the collection settings array in `config.php`, and will be available to all of that collection's items. The same cascading rules that apply to variables also apply to functions, i.e. functions defined for a collection will override a function of the same name defined at the top level. For example:

> _config.php_

```php
<?php

return [
    'excerpt' => function ($page, $characters = 100) {
        return substr($page->getContent(), 0, $characters);
    },
    'collections' => [
        'posts' => [
            'excerpt' => function ($page, $characters = 50) {
                return substr(strip_tags($page->getContent()), 0, $characters);
            },
        ],
    ],
];
```
