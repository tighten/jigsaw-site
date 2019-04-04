---
extends: _layouts.documentation
section: documentation_content
---
### Building

#### 1. Define A Categories Collection. 

The categories section in the example below has an additional `posts` attribute which returns a collection of posts that are associated to the category.

[View Collections](/docs/collections)

```php
// config.php
'collections' => [
    // additional collections
    'categories' => [
        'path' => '/blog/categories/{filename}',
        'posts' => function ($page, $allPosts) {
            return $allPosts->filter(function ($post) use ($page) {
                return $post->categories ? in_array($page->getFilename(), $post->categories, true) : false;
            });
        },
    ],
],
```

> The `path` attribute is used to define where the categories are located.

#### 2. Add Category Content

Add [content](/docs/content) to to `/blog/categories/` or the path you declare in the config. 

```yaml
# /blog/categories/_accessibility.md
---
extends: _layouts.category
title: Accessibility
description: Posts related to accessibility
---

A description about the Accessibility category.
```

#### 3. Create The Markup

With a collection of Categories, you can iterate over `$categories` to access it's attributes.  

```html
<div>
    <small class="block uppercase text-blue-darker font-medium mb-2">
        Categories
    </small>
    @foreach ($categories as $category)
        <a
            href="{{ '/blog/categories/' . $category->title }}"
            class="inline-block bg-grey-light hover:bg-blue-lighter leading-loose tracking-wide text-grey-darkest uppercase text-xs font-semibold rounded mr-2 mb-2 px-3"
        >{{ $category->title }}</a>
    @endforeach
</div>
```
### Example
<img src="/assets/img/examples-tag-cloud.png" alt="Screenshot of tag cloud." class="border shadow rounded">
