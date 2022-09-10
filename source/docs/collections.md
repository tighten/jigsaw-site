---
extends: _layouts.documentation
section: documentation_content
---

## Collections

Jigsaw provides powerful features for working with groups of related pages, or _collections_. Collections give you the ability to access your content at an aggregate level, enabling you to easily add near-dynamic features like menus, pagination, categories, and tags to your static site.

Collections can be used to generate pages of related content—for example, blog posts or articles that are sorted by date, with an index page displaying summaries of the five most recent posts—or for embedding related blocks of content _within_ a page, for content like staff bios, product descriptions, or a portfolio of projects.

### Defining a Collection

To define a collection, add an array named `collections` to `config.php`. Each collection should be indicated by the name of the collection (typically, plural), followed by an array of settings. For example:

> _config.php_

```php
<?php

return [
    'company' => 'Tighten',
    'contact_email' => 'support@tighten.co',
    'collections' => [
        'people' => [
            'path' => 'people',
            'sort' => 'last_name',
        ],
        'posts' => [
            'path' => 'blog/{date|Y-m-d}/{filename}',
            'author' => 'Tighten',
        ],
    ],
];
```

Jigsaw will look for collection items in a directory with the same name as your collection, preceded by an underscore: in this example, `_people` and `_posts`. Collection items can be Markdown or Blade files, or even [Blade/Markdown hybrid](/docs/content-other-file-types) files.

<div class="files">
    <div class="folder folder--open">source
        <div class="folder">_assets</div>
        <div class="folder folder--open">_layouts
            <div class="file">master.blade.php</div>
            <div class="file">post.blade.php</div>
        </div>
        <div class="folder folder--open">_people
            <div class="file">george-michael-bluth.blade.php</div>
            <div class="file">j-walter-weatherman.blade.php</div>
            <div class="file">steve-holt.blade.php</div>
        </div>
        <div class="folder folder--open focus">_posts
            <div class="file">1-my-first-post.md</div>
            <div class="file">2-my-second-post.md</div>
            <div class="file">3-my-third-post.md</div>
        </div>
        <div class="folder">assets</div>
        <div class="file">about-us.blade.php</div>
        <div class="file">blog.blade.php</div>
        <div class="file">index.blade.php</div>
    </div>
    <div class="folder">tasks</div>
    <div class="folder">vendor</div>
    <div class="file">bootstrap.php</div>
    <div class="file">composer.json</div>
    <div class="file">composer.lock</div>
    <div class="file">config.php</div>
    <div class="file">package.json</div>
    <div class="file">webpack.mix.js</div>
</div>

In `config.php`, the array where you define your collection can contain [path](/docs/collections-paths) and [sort](/docs/collections-sorting) settings for the collection, as well as [variables and helper functions](/docs/collections-variables-and-functions/). None of these elements are required, however; if omitted, default path and sort settings will be used. In fact, for the simplest configuration using default settings and no variables or functions, you can define a collection with simply its name:

> _config.php_

```php
<?php

return [
    'collections' => [ 'posts' ],
];
```

### Generating Collection Pages

If you'd like to generate an individual page for each of your collection items—for example, a page for each blog post—specify a [parent template](/docs/collections-extending-parent-templates) file in the `extends` key of the YAML front matter, or with the `@extends` directive in a Blade file, just as you would with a regular Jigsaw page. For example:

> _my-first-post.md_

```markdown
---
extends: _layouts.post
title: My First Blog Post
author: Keith Damiani
date: 2017-03-23
section: content
---

This post is *profoundly* interesting.
```

> _\_layouts/post.blade.php_

```blade
@extends('_layouts.master')

@section('body')
    <h1>{{ $page->title }}</h1>
    <p>By {{ $page->author }} • {{ date('F j, Y', $page->date) }}</p>

    @yield('content')
@endsection
```

### Accessing Collection Items

In any Blade template, you have access to each of your collections using a variable with the collection's name. This variable references an object that contains all the elements in your collection, and can be iterated over to
access individual collection items. The collection variable also behaves as if it were an [Illuminate Collection](https://laravel.com/docs/collections) in Laravel, meaning you have access to all of Laravel's standard collection methods like `count()`, `filter()`, and `where()`.

For example, to create a list of the titles for all your blog posts, you can iterate over the `$posts` object in a Blade `@foreach` loop, and display the `title` property that you defined in the YAML front matter of each post:

> _posts.blade.php_

```blade
<p>Total of {{ $posts->count() }} posts</p>

<ul>
@foreach ($posts as $post)
    <li>{{ $post->title }}</li>
@endforeach
</ul>
```

For example, assuming that all posts have on their YAML front matter the property `author`, to filter all posts from a particular author, you can filter the collection of `$posts` and generate a new collection:

> _author\_posts.blade.php_

```blade
@php
    $authorPosts = $posts->filter(function ($value, $key) use ($page) {
        return $value->author == $page->author;
    });
@endphp

@if ($authorPosts->count() > 0)
    <ul>
        @foreach ($authorPosts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ul>
@endif
```

### Collection Metadata

In addition to the [metadata](/docs/page-metadata/) available for every page, such as `getPath()`, `getUrl()`, and `getFilename()`, collection items have access to a few additional functions:

- `getContent()` returns the main content of the collection item, i.e. the body of the Markdown file (currently, `getContent()` is available for Markdown files only)
- `getCollection()` returns the name of the collection
- `getPrevious()` and `getNext()` give you the adjacent items in the collection, based on the collection's default [sort order](/docs/collections-sorting)
- `getFirst()` returns the first item of a collection (as does the Laravel collection method `first()`)
- `getLast()` returns the last item of a collection (as does the Laravel collection method `last()`)

> _\_layouts/post.blade.php_

```blade
@extends('_layouts.master')

@section('body')
    <h1>{{ $page->title }}</h1>

    @yield('content')

    @if ($page->getNext())
        <p>Read my next post:
            <a href="{{ $page->getNext()->getPath() }}">{{ $page->getNext()->title }}</a>
        </p>
    @endif
@endsection
```
