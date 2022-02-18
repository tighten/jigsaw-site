---
extends: _layouts.documentation
section: documentation_content
---

#### [Collections](/docs/collections)
## Pagination

You can create a Blade template that displays your collection items in a paginated format by including a `pagination` key in the template's YAML front matter. The pagination header should include the `collection` name and the `perPage` count:


> _posts.blade.php_

```blade
---
pagination:
  collection: posts
  perPage: 5
---
@extends('_layouts.master')
...
```

> If you don't provide a `perPage` value in your template, a default value can be set for specific collection by adding a `perPage` key to the collection's settings in `config.php`, or globally by adding a `perPage` key to the top level of `config.php`. Otherwise, the default value will be 10.

Once the `pagination` has been defined in the header, the template will have access to a special `$pagination` variable, which has several attributes:

- `$pagination->items` contains an array of collection items for the current page
- `$pagination->currentPage` contains the page number of the current page
- `$pagination->totalPages` contains the total number of pages
- `$pagination->pages` contains an array of paths to each page

> Note that the `pages` are indexed by their page number, i.e. they are 1-based. So you can refer to the paths of a page by the page number, i.e. `$pagination->page[1]` will return the path to the first page.

- `$pagination->first` contains the path to the first page (the same as `$pagination->path[1]`)
- `$pagination->last` contains the path to the last page
- `$pagination->next` contains the path to the next page
- `$pagination->previous` contains the path to the previous page

Using these `$pagination` attributes, you can build a set of pagination buttons and links:

```blade
@if ($previous = $pagination->previous)
    <a href="{{ $page->baseUrl }}{{ $pagination->first }}">&lt;&lt;</a>
    <a href="{{ $page->baseUrl }}{{ $previous }}">&lt;</a>
@else
    &lt;&lt; &lt;
@endif

@foreach ($pagination->pages as $pageNumber => $path)
    <a href="{{ $page->baseUrl }}{{ $path }}"
        class="{{ $pagination->currentPage == $pageNumber ? 'selected' : '' }}">
        {{ $pageNumber }}
    </a>
@endforeach

@if ($next = $pagination->next)
    <a href="{{ $page->baseUrl }}{{ $next }}">&gt;</a>
    <a href="{{ $page->baseUrl }}{{ $pagination->last }}">&gt;&gt;</a>
@else
    &gt; &gt;&gt;
@endif
```

To display the items on each page, iterate over the `$pagination->items` collection:

```blade
@foreach ($pagination->items as $post)
    <h3><a href="{{ $post->getUrl() }}">{{ $post->title }}</a></h3>
    <p class="text-sm">by {{ $post->author }} • {{ date('F j, Y', $post->date) }}</p>
    <div>{!! $post->getContent() !!}</div>
@endforeach
```
