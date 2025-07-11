---
extends: _layouts.documentation
section: documentation_content
---

## Pretty URLs

By default, any Blade files _not_ named `index.blade.php` are rendered as `index.html` in a subfolder named after the original file.

For example, if you have a file named `about-us.blade.php` in your `/source` directory:

<div class="files">
    <div class="folder folder--open">source
        <div class="folder">_assets</div>
        <div class="folder">_layouts</div>
        <div class="folder">assets</div>
        <div class="file focus">about-us.blade.php</div>
        <div class="file">blog.blade.php</div>
        <div class="file">index.blade.php</div>
    </div>
    <div class="ellipsis">...</div>
</div>

...it will be rendered as `index.html` in the `/build/about-us` directory:

<div class="files">
    <div class="folder folder--open">build_local
        <div class="folder folder--open focus">about-us
            <div class="file">index.html</div>
        </div>
        <div class="folder folder--open">blog
            <div class="file">index.html</div>
        </div>
        <div class="file">index.html</div>
    </div>
    <div class="ellipsis">...</div>
</div>

This means your "About us" page will be available at `http://example.com/about-us/` instead of `http://example.com/about-us.html`.

### Disabling Pretty URLs

To disable this behavior, set the `pretty` option to `false` in your config file:

```php
return [
    'pretty' => false,
];
```
