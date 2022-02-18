---
extends: _layouts.documentation
section: documentation_content
---

#### [Creating Your Site's Content](/docs/content)
## Markdown

Have some pages you'd rather write in Markdown than Blade? [We know the feeling](https://github.com/tighten/jigsaw-site/tree/master/source/docs).

Using Markdown in Jigsaw is as simple as using a ` .markdown` or `.md` extension, and specifying a few details in YAML front matter.

For example, say you have this layout and you'd like to populate the `content` section using Markdown:

```blade
<html>
    <head><!-- ... --></head>
    <body>
        @yield('content')
    </body>
</html>
```

If that layout was named `master` in the `_layouts` folder, you could create a Markdown page that used this layout like so:

```markdown
---
extends: _layouts.master
section: content
---

# My awesome heading!

My awesome content!
```

The end result would be a generated page that looked like this:

```html
<html>
    <head><!-- ... --></head>
    <body>
        <h1>My awesome heading!</h1>
        <p>My awesome content!</p>
    </body>
</html>
```

### Custom front matter variables

Imagine you have a layout named `post.blade.php` in your `_layouts` folder that looks like this:

> _\_layouts/post.blade.php_

```blade
@extends('_layouts.master')

@section('content')
    <h1>{{ $page->title }}</h1>
    <h2>by {{ $page->author }}</h2>

    @yield('postContent')
@endsection
```

You can populate the `title` and `author` variables by adding custom keys to the YAML front matter:

> _my-post.md_

```markdown
---
extends: _layouts.post
section: postContent
title: "Jigsaw is awesome!"
author: "Adam Wathan"
---

Jigsaw is one of the greatest static site generators of all time.
```

...which would generate this:

```html
<html>
    <head><!-- ... --></head>
    <body>
        <h1>Jigsaw is awesome!</h1>
        <h2>by Adam Wathan</h2>

        <p>Jigsaw is one of the greatest static site generators of all time.</p>
    </body>
</html>
```

<br>

### Formatting dates

The YAML processor converts any dates that it finds in a Markdown file's front matter into integer timestamps. When outputting a date variable in your Blade template, you can use PHP's `date()` function to specify a date format. For example:


> _my-post.md_

```markdown
---
extends: _layouts.post
section: postContent
date: 2018-02-16
---
```

> _\_layouts/post.blade.php_

```blade
<p>The formatted date is {{ date('F j, Y', $post->date) }}</p>
```


<br>

### Specifying a permalink

You can specify a `permalink` in the YAML front matter to override the default path of a file when your site is built. This can be used, for example, to create a [custom 404](/docs/custom-404-page) page that is output to `404.html` (instead of the default `404/index.html`):

> _source/404.md_

```markdown
---
extends: _layouts.master
section: content
permalink: 404.html
---

### Sorry, that page does not exist.
```

