---
extends: _layouts.documentation
section: documentation_content
---

## Event Listeners

Jigsaw provides three events that you can hook into, in order to run custom code before and after your build is processed.

- **A `beforeBuild` event is fired before any `source` files have been processed**. This gives you an opportunity to programmatically modify `config.php` variables, fetch data from external sources, or modify files in the `source` folder.

- **An `afterCollections` event is fired after any collections have been processed, but before any output files are built.** This gives you access to the parsed contents of collection items.

- **An `afterBuild` event is fired after the build is complete, and all output files have been written to the `build` directory.** This allows you to obtain a list of the output file paths (to use, for example, when creating a `sitemap.xml` file), programmatically create output files, or take care of any other post-processing tasks.

---

### Registering event listeners as closures

To add an event listener, head over to `bootstrap.php`. There, you can access the event bus with the `$events` variable, adding listeners by calling the name of the event:

> _bootstrap.php_

```php
$events->beforeBuild(function ($jigsaw) {
   // your code here
});

$events->afterCollections(function ($jigsaw) {
   // your code here
});

$events->afterBuild(function ($jigsaw) {
   // your code here
});
```

At its simplest, you can define your event listeners as closures that accept an instance of `Jigsaw`. The `Jigsaw` instance contains a number of [helper methods](#helperMethods) to allow you to access information about the site and interact with files and config settings.

For example, the following listener will fetch the current weather from an external API, and add it as a variable to `config.php`, where it can be referenced in your templates:

> _bootstrap.php_

```php
$events->beforeBuild(function ($jigsaw) {
    $url = "http://api.openweathermap.org/data/2.5/weather?" . http_build_query([
        'q' => $jigsaw->getConfig('city'),
        'appid' => $jigsaw->getConfig('openweathermap_api_key'),
        'units' => 'imperial',
    ]);

    $jigsaw->setConfig('current_weather', json_decode(file_get_contents($url))->main);
});
```

---

### Registering event listeners as classes

For more complex event listeners, you can specify the name of a class, or an array of class names, instead of a closure. These classes can either live directly in `bootstrap.php` or in a separate directory. Listener classes should countain a `handle()` method with accepts an instance of `Jigsaw`:

>_bootstrap.php_

```php
$events->afterBuild(GenerateSitemap::class);

$events->afterBuild([GenerateSitemap::class, SendNotification::class]);
```

> _listeners/GenerateSitemap.php_

```php
<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;
use samdark\sitemap\Sitemap;

class GenerateSitemap
{
    public function handle(Jigsaw $jigsaw)
    {
        $baseUrl = $jigsaw->getConfig('baseUrl');
        $sitemap = new Sitemap($jigsaw->getDestinationPath() . '/sitemap.xml');

        collect($jigsaw->getOutputPaths())->each(function ($path) use ($baseUrl, $sitemap) {
            if (! $this->isAsset($path)) {
                $sitemap->addItem($baseUrl . $path, time(), Sitemap::DAILY);
            }
        });

        $sitemap->write();
    }

    public function isAsset($path)
    {
        return starts_with($path, '/assets');
    }
}
```

If there are multiple listeners defined for a single event, they will be fired in the order in which they were defined.

To call a listener class that lives in a separate directory, the class namespace should be added to a `composer.json` file:

> _composer.json_

```json
{
    "autoload": {
        "psr-4": {
            "App\\Listeners\\": "listeners"
        }
    }
}
```

---

<a name="helperMethods"></a>
### Helper methods in $jigsaw

The instance of `Jigsaw` available to each event listener includes the following helper methods:

---

`getEnvironment()`

Returns the current environment, e.g. `local` or `production`

---

`getCollections()`

In `beforeBuild`, returns an array of collection names; in **afterCollections** and **afterBuild**, returns a collection of collection items, keyed by collection name.

---

`getCollection($collection)` _(**afterCollections** and **afterBuild** only)_

Returns the items in a particular collection, keyed by their `source` filenames. Each item contains the variables defined for the collection item, as well as access to all collection item methods like `getContent()`.

---

`getConfig()`

Returns the settings array from `config.php`

---

`getConfig($key)`

Returns a specific setting from `config.php`. <br>Dot notation (e.g. `getConfig('collections.posts.items')` can be used to get nested items.

---

`setConfig($key, $value)`

Adds or modifies a setting in `config.php`. <br>Dot notation can be used to set nested items.

---

`getSourcePath()`

Returns the absolute path to the `source` directory

---

`setSourcePath($path)`

Sets the path to the `source` directory

---

`getDestinationPath()`

Returns the absolute path to the `build` directory

---

`setDestinationPath($path)`

Sets the path to the `build` directory

---

`getPages()` _(**afterBuild** only)_

Returns a collection of all output files that were generated. For each item, the key contains the path of the output file relative to the `build` directory (e.g. `/posts/my-first-post`), while the value contains the contents of the `$page` variable for the source file. This exposes the [page metadata](/docs/page-metadata) functions such as `getPath()` and `getModifiedTime()` for each page, as well as any variables defined in the page's YAML header.

---

`getOutputPaths()` _(**afterBuild** only)_

Returns a collection of paths to the output files that were generated, relative to the `build` directory

---

`readSourceFile($fileName)`

Returns the contents of a file in the `source` directory

---

`writeSourceFile($fileName, $contents)`

Allows you to write a file to the `source` directory

---

`readOutputFile($fileName)`

Returns the contents of a file in the `build` directory

---

`writeOutputFile($fileName, $contents)`

Allows you to write a file to the `build` directory
