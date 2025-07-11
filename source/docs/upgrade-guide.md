---
extends: _layouts.documentation
section: documentation_content
---

## Upgrade from Version 1.7

Laravel Mix has been replaced by Vite in Jigsaw 1.8. New installations will use Vite by default when running `jigsaw init`.

To upgrade an existing site, follow these steps:

```sh
# Upgrade to Jigsaw 1.8
composer require tightenco/jigsaw:^1.8 -W

# Remove Mix and Jigsaw Mix
npm remove laravel-mix laravel-mix-jigsaw

# Install Vite and Jigsaw Vite
npm install --save-dev vite @tighten/jigsaw-vite-plugin
```

Next, delete `webpack.mix.js` and create a `vite.config.js` file with the following contents:

```js
import { defineConfig } from 'vite';
import jigsaw from '@tighten/jigsaw-vite-plugin';

export default defineConfig({
    plugins: [
        jigsaw({
            input: [
                'source/_assets/js/main.js',
                'source/_assets/css/main.css'
            ],
            refresh: true,
        }),
    ],
});
```

And update your `package.json` like this:

```diff
{
    "private": true,
+   "type": "module",
    "scripts": {
-       "dev": "mix",
-       "watch": "mix watch",
-       "staging": "NODE_ENV=staging mix",
-       "prod": "mix --production"
+       "dev": "vite",
+       "build": "vite build",
+       "prod": "vite build --mode production"
    },
```

Then update your main layout file (e.g., `main.blade.php`):

```diff
- <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
- <script defer src="{{ mix('js/main.js', 'assets/build') }}"></script>
+ @viteRefresh()
+ <link rel="stylesheet" href="{{ vite('source/_assets/css/main.css') }}">
+ <script defer type="module" src="{{ vite('source/_assets/js/main.js') }}"></script>
```

Finally, to preview your site locally, first create a `.env` file and specify your local URL in the `APP_URL` variable:

```toml
APP_URL=http://your_url_here
```

* If you use Jigsaw's serve command, it will be `http://localhost:8000`
* If you use Laravel Valet, it will have a `.test` domain, like `http://site.test`

### Tailwind

If you're using **Tailwind 3**, make sure PostCSS and Autoprefixer are installed:

```sh
npm install -D tailwindcss@3 postcss autoprefixer
```

Add this to `postcss.config.js`:

```js
export default {
  plugins: {
    "postcss-import": {},
    tailwindcss: {},
    autoprefixer: {},
  },
}
```

Also ensure your main CSS file includes:

```css
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';
```

If you're using **Tailwind 3** and want to upgrade to **Tailwind 4**, you can use their [upgrade tool](https://tailwindcss.com/docs/upgrade-guide#using-the-upgrade-tool). To upgrade manually, follow these steps:

Remove PostCSS and Autoprefixer, then install the latest Tailwind and its Vite plugin:

```sh
npm remove autoprefixer postcss postcss-import
npm install -D tailwindcss@^4 @tailwindcss/vite
```

Update your Vite config to use the Tailwind plugin:

```diff
import jigsaw from '@tighten/jigsaw-vite-plugin';
import { defineConfig } from 'vite';
+import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        jigsaw({
            input: [
                'source/_assets/js/main.js',
                'source/_assets/css/main.css'
            ],
            refresh: true,
        }),
+        tailwindcss()
    ],
});
```

Ensure your CSS file imports Tailwind and, optionally, the config file. If your config file only defined the `content` field, you can safely delete it, as Tailwind 4 detects content automatically.

```css
@import 'tailwindcss';

/* Optional: use config file */
@config '../../../tailwind.config.js';
```

Finally, delete `postcss.config.js`.

### Preview and build

To test your site locally, run:

```
npm run dev
```

To compile assets and build your site for production, run:

```
npm run build
```

If you don’t need to compile assets, you can run:

```
./vendor/bin/jigsaw build
```
