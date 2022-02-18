---
extends: _layouts.documentation
section: documentation_content
---

## Page Metadata

For each page, Jigsaw provides you with certain metadata values through `get` functions accessed on the `$page` object:

`$page->getPath()` returns the path to the current page, relative to the site root

`$page->getRelativePath()` returns the relative path (i.e. parent directories) of the current page, relative to the site root

`$page->getUrl()` returns the full URL to the item, if `baseUrl` was defined in `config.php`

`$page->getFilename()` returns the filename of the page, without extension (e.g. `my-first-page`)

`$page->getExtension()` returns the file extension (e.g. `md`)

`$page->getModifiedTime()` returns the last modified time of the file, as a Unix timestamp
