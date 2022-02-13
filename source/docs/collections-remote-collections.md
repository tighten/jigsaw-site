---
extends: _layouts.documentation
section: documentation_content
---

#### [Collections](/docs/collections)
## Remote Collections

In addition to using Markdown or Blade files for your collection items, you can return collection items directly from the `collections` array in `config.php`. This allows you to generate items programmatically—for example, you can [fetch items from a remote source](#remoteItems) such as an external API or API-based content management systems like Contentful, GraphCMS, or DatoCMS.

---

### Building collection items in config.php

For any collection, items can be built by returning an array or collection of `items` from the collection's configuration array in `config.php`. Each item should be an array; the keys of the item will be converted to page variables (such as those that would typically appear in the YAML header of a Markdown file), while the value of the `content` key will serve as the content of the collection item. This content will be parsed as Markdown, and thus can contain either Markdown or HTML content; it will be available within your Blade templates with `@yield('content')` or by echoing `{!! $page->getContent() !!}`:

>_config.php_

```php
return [
    'collections' => [
        'posts' => [
            'extends' => '_layouts.post',
            'items' => [
                [
                    'title' => 'Title of my first post',
                    'content' => '## The first post content',
                ],
                [
                    'title' => 'Title of my second post',
                    'content' => '## The second post content',
                ],
            ],
        ],
    ],
];
```

> _\_layouts/post.blade.php_

```blade
@extends('_layouts.master')

@section('body')
    <h1>{{ $page->title }}</h1>

    @yield('content')
@endsection
```

Under the hood, Jigsaw will:

1. Create a `_tmp` directory in the collection's directory (e.g. `source/_posts/_tmp`) to store temporary Markdown files for each remote collection item
2. Process the temporary files as though they were `*.blade.md` files
3. Remove the temporary files when `jigsaw build` is complete

In addition to `content`, each item can specify a `filename` key, which will be used as the name of the temporary Markdown file. If omitted, the filename will default to the name of the collection followed by an index, so `post-1.blade.md`, `post-2.blade.md`, etc. The resulting `path` of the output file will be processed according to the normal rules for collections.

Alternatively, the `items` array can contain simple string values, which will be treated as the item's Markdown content, with no page variables:

>_config.php_

```php
return [
    'collections' => [
        'posts' => [
            'extends' => '_layouts.post',
            'items' => [
                '## The content for post 1',
                '## The content for post 2',
                '## The content for post 3',
            ],
        ],
    ],
];
```

---

<a name="remoteItems"></a>
### Fetching collection items from a remote API

The `items` key in `config.php` can also reference a closure that returns an array or collection of items. By using a closure, collection items can be fetched from anywhere—from a remote API, from other places on the filesystem, or built up programmatically. The resulting data can then be transformed before collection items are built. For example:

>_config.php_

```php
return [
    'collections' => [
        'posts' => [
            'extends' => '_layouts.post',
            'items' => function ($config) {
                $posts = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/posts'));

                return collect($posts)->map(function ($post) {
                    return [
                        'title' => $post->title,
                        'content' => $post->body,
                    ];
                });
            },
        ],
    ],
];
```

If you want the remote API to only be called when building for particular environments, you can place the `items` closure in the appropriate `config.{environment}.php` file. For example, to only access your remote API when running `build production`, create a `config.production.php` file and include your `items` closure there. This will prevent potentially long build times while running `build local` in development.

The `items` closure receives the `config` array as a parameter, so you may also reference other config values (for example, an API URL) inside the closure.
