---
extends: _layouts.documentation
section: documentation_content
---

## Generating Your Site

### Build for production

To generate your static site for deployment, run the following command:

```sh
npm run build
```

You'll see an output similar to this:

```text
> build
> vite build

vite v6.3.5 building for production...
✓ 2 modules transformed.
source/assets/build/manifest.json            0.30 kB │ gzip: 0.15 kB
source/assets/build/assets/main-La0jHWj3.css 5.18 kB │ gzip: 1.52 kB
source/assets/build/assets/main-ByIq-FUT.js  0.03 kB │ gzip: 0.05 kB
✓ built in 503ms

Build time: 0.03 seconds
Site built successfully!
```

Your complete static site will be generated in the `/build_production` directory, ready for deployment.

As the output shows, Vite compiles, minifies, and versions your assets. This process includes bundling, where Vite combines multiple JavaScript and CSS files into fewer, optimized ones.

The bundled asset paths are referenced in your generated HTML files, like this:

```html
<link rel="stylesheet" href="/assets/build/assets/main-La0jHWj3.css">
<script defer type="module" src="/assets/build/assets/main-ByIq-FUT.js"></script>
```

Assets that do not require compilation (e.g., images, fonts) are simply copied from your `source/assets` directory to the equivalent `assets` path within `/build_production`. For example, an image located at `source/assets/img/1.png` will be copied to `/build_production/assets/img/1.png`.

This means the paths you use in your original files for these assets remain unchanged:

```html
<img src="/assets/img/1.png">
```

### Environments

Often you might want to use different site variables in your development and production environments. For example, in production you might want to render your Google Analytics tracking snippet, but not include it in development so you don't skew your results.

Jigsaw makes this simple by allowing you to create additional `config.php` files for your different environments.

Say your base `config.php` file looks like this:

```php
<?php

return [
    'debug' => true,
    'company' => 'Tighten',
];
```

You can override the `staging` variable in your production environment by creating a new file called `config.production.php`:

```php
<?php

return [
    'debug' => false,
];
```

This file is _merged_ on top of `config.php`, so you only need to specify the variables that you are changing.

> Note: Variables from environment-specific config files are _not_ merged recursively; only the top-level keys are considered for merging. For collections, you can override this behavior by setting `merge_collection_configs` to `true` in your main `config.php` file. This is particularly useful if you use [collection filtering](/docs/collections-filtering/) to disable some collection items, such as draft blog posts, in particular environments.

### Build for a specific environment

To build files for a specific environment, set the `NODE_ENV` variable when running the `build` command:

```bash
NODE_ENV=staging npm run build
```

This will output the site to a new folder named `build_staging`, leaving other build directories (`build_local`, `build_production`) untouched.

If you're not using Vite to compile assets, you can run Jigsaw's `build` command directly and pass the environment name:

```bash
vendor/bin/jigsaw build staging
```
