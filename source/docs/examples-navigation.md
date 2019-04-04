---
extends: _layouts.documentation
section: documentation_content
---

## Creating A Navigation

Out-of-the-box the starter templates come with a pre-built navigation.
```php
<?php
// config.php
return [
    // site configuration
    
    // helpers
    'isActive' => function ($page, $path) {
        return ends_with(trimPath($page->getPath()), trimPath($path));
    },
    'isActiveParent' => function ($page, $menuItem) {
        if (is_object($menuItem) && $menuItem->children) {
            return $menuItem->children->contains(function ($child) use ($page) {
                return trimPath($page->getPath()) == trimPath($child);
            });
        }
    },
    'url' => function ($page, $path) {
        return starts_with($path, 'http') ? $path : '/' . trimPath($path);
    },
];
```



```php
<?php
// navigation.php
return [
    'Installation' => [
        'root' => '/docs/installation',
        'children' => [
            'Using a Starter Template' => ['root' => '/docs/starter-templates'],
        ],
    ],
    'Building & Previewing' => ['root' => '/docs/building-and-previewing'],
    'Compiling Assets' => ['root' => '/docs/compiling-assets'],

    // more navigation items
];
```

```html
@php $level = $level ?? 0 @endphp

<ul class="list-reset my-0">
    @foreach ($items as $label => $item)
        @include('_nav.menu-item')
    @endforeach
</ul>
```

```html
<li class="list-reset pl-4">
    @if ($url = is_string($item) ? $item : $item->url)
        {{-- Menu item with URL--}}
        <a href="{{ $page->url($url) }}"
            class="{{ 'lvl' . $level }} {{ $page->isActiveParent($item) ? 'lvl' . $level . '-active' : '' }} {{ $page->isActive($url) ? 'active font-semibold text-blue' : '' }} nav-menu__item hover:text-blue"
        >
            {{ $label }}
        </a>
    @else
        {{-- Menu item without URL--}}
        <p class="nav-menu__item text-grey-dark">{{ $label }}</p>
    @endif

    @if (! is_string($item) && $item->children)
        {{-- Recursively handle children --}}
        @include('_nav.menu', ['items' => $item->children, 'level' => ++$level])
    @endif
</li>
```
