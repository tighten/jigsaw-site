---
extends: _layouts.documentation
section: documentation_content
---

#### [Collections](/docs/collections)
## Paths

### Default Path Setting

By default, each of your collection items (if they `extend` a parent template) will be assigned a path where the first segment is the name of the collection, and the second segment is the filename converted to a URL "slug"—all lowercase, with words separated by dashes. So the default path for a file named `My First Blog Post.md` in a collection named `posts` would be `/posts/my-first-blog-post`.

Jigsaw gives you the ability to customize your collection paths, however, by adding a `path` key to your collection array.


### Custom Path Shorthand

You can specify your collection path as a string. In this string, you can reference the values of any variables that are defined within the YAML front matter of the collection item, by specifying the variable name enclosed in `{}` brackets. If your collection items each include a `title` variable, for example, you could define your path as:

```php
'path' => 'blog/{title}' // 'blog/Title Of First Post'
```

In addition, the variables `filename` (containing the filename without extension) and `collection` (containing the collection name) are available:

```php
'path' => '{collection}/{filename}' // 'posts/my first blog post'
```

In most cases, when using filenames or titles, you will want to "slugify" them when used as part of a path. To do so, prepend a separator to the variable name:

```php
'path' => '{collection}/{-filename}' // 'posts/my-first-blog-post'
'path' => '{collection}/{_filename}' // 'posts/my_first_blog_post'
```

If you included a date as a variable in your collection items (in YYYY-MM-DD format), you can control the formatting of that date in your path by following the variable name with a pipe and using PHP date formatting codes. For any `/`s in your date formatting code, Jigsaw will create subdirectories as needed:

```php
'path' => '{collection}/{published|Y-m-d}/{-title}' // 'posts/2017-03-27/title-of-first-post'
'path' => '{collection}/{published|Y/m}/{-title}' // 'posts/2017/03/title-of-first-post'
'path' => 'blog-{published|F-Y}/{-title}' // 'blog-March-2017/title-of-first-post'
```


### Custom Path Closure

Though the path shorthand allows you to easily create the most common permalink formats, you can also return a closure from `path` if you require more control. The closure will receive the contents of the current collection item as its first parameter. For example:

```php
use Illuminate\Support\Str;

'path' => function ($page) {
    return 'posts/' . ($page->featured ? 'featured/' : '') . Str::slug($page->getFilename());
},
```
