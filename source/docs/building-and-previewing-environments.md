---
extends: _layouts.documentation
section: documentation_content
---

#### [Building & Previewing](/docs/building-and-previewing)
## Environments

Often you might want to use different site variables in your development and production environments. For example, in production you might want to render your Google Analytics tracking snippet, but not include it in development so you don't skew your results.

Jigsaw makes this simple by allowing you to create additional `config.php` files for your different environments.

Say your base `config.php` file looks like this:

```php
<?php

return [
    'staging' => true,
    'company' => 'Tighten',
];
```

You can override the `staging` variable in your production environment by creating a new file called `config.production.php`:

```php
<?php

return [
    'staging' => false,
];
```

This file is _merged_ on top of `config.php`, so you only need to specify the variables that you are changing.

> Note: Variables from environment-specific config files are _not_ merged recursively; only the top-level keys are considered for merging. For collections, you can override this behavior by setting `merge_collection_configs` to `true` in your main `config.php` file. This is particularly useful if you use [collection filtering](docs/collections-filtering/) to disable some collection items, such as draft blog posts, in particular environments.

### Building files for a specific environment

To build files for a specific environment, just pass the environment name as an argument when running the `build` command:

```bash
vendor/bin/jigsaw build production
```

Alternatively, if you are [using Laravel Mix to compile your assets](/docs/compiling-assets), you can run the `production` script found in `package.json`:

```bash
npm run prod
```

This will generate your site into a new folder called `build_production`, leaving your `build_local` folder untouched.
