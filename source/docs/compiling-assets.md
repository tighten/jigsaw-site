---
extends: _layouts.documentation
section: documentation_content
---

## Compiling Assets

Jigsaw sites are configured with support for [Vite](https://vite.dev/) out of the box. If you've ever used Vite in a Laravel project, you already know how to use Vite with Jigsaw.

### Setup

To get started, first make sure you have Node.js and NPM installed. Then, pull in the dependencies needed to compile your assets:

```bash
npm install
```

For more detailed installation instructions, check out the [full Laravel Vite documentation](https://laravel.com/docs/vite).

### Vite config

On the root of your project, you'll find Vite's config file with Jigsaw's plugin configured:

- `input` sets two entry points, `main.js` for JavaScript and `main.css` for CSS.
- `refresh` indicates wether or not to listen for changes.

```js
import jigsaw from '@tighten/jigsaw-vite-plugin';
import { defineConfig } from 'vite';

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

### Referencing Assets

In your main layout file, your assets are referenced using the **`vite` method**. The **`@viteRefresh()` directive** is needed for enabling automatic page refreshes when you make changes during local development.

```blade
@viteRefresh()
<link rel="stylesheet" href="{{ vite('source/_assets/css/main.css') }}">
<script defer type="module" src="{{ vite('source/_assets/js/main.js') }}"></script>
```

### Importing Modules

From these entry points, you can easily import additional modules. Vite handles serving these modules when you preview your site with `npm run dev`, and it efficiently bundles them when you prepare for production with `npm run build`.

In JavaScript, you can import libraries and other local files:

```js
import { get } from 'lodash';
import helpers from './helpers';
```

Similarly, in CSS, you can import other style files, whether they're from packages or local to your project:

```css
@import 'prismjs/themes/prism.css';
@import './more-styles.css';
```

### Tailwind 3

To use **Tailwind CSS v3**, make sure to install it along with its necessary dependencies:

```sh
npm install -D tailwindcss@3 postcss autoprefixer
```

Next, create a file named `postcss.config.js` in your project's root directory and add these contents:

```js
export default {
  plugins: {
    "postcss-import": {},
    tailwindcss: {},
    autoprefixer: {},
  },
}
```

Finally, ensure your main CSS file includes the following `@import` rules:

```css
@import 'tailwindcss/base';
@import 'tailwindcss/components';
@import 'tailwindcss/utilities';
```

### Tailwind 4

If you're opting for **Tailwind CSS v4**, install it along with its dedicated Vite plugin:

```sh
npm install -D tailwindcss@^4 @tailwindcss/vite
```

Then, you'll need to update your Vite configuration to enable the Tailwind plugin:

```js
import jigsaw from '@tighten/jigsaw-vite-plugin';
import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        jigsaw({
            input: [
                'source/_assets/js/main.js',
                'source/_assets/css/main.css'
            ],
            refresh: true,
        }),
        tailwindcss()
    ],
});
```

And make sure your main CSS file includes this single `@import` statement:

```css
@import 'tailwindcss';
```

### Sass and Less

Vite offers built-in support for pre-processor files like `.scss`, `.sass`, `.less`, `.styl`, and `.stylus`. You don't need to install any Vite-specific plugins for them. However, you need to install the corresponding pre-processor package itself:

```sh
# For .scss and .sass files
npm add -D sass-embedded # or sass

# For .less files
npm add -D less

# For .styl and .stylus files
npm add -D stylus
```

Once installed, you can then import these types of files directly into your main CSS file (e.g., `main.css`):

```css
@import './my-styles.sass';
```

### Changing asset locations

We recommend to keep these entry points in `/source/_assets`. The default structure looks like this:

<div class="files">
    <div class="folder folder--open">source
        <div class="folder folder--open focus">_assets
            <div class="folder folder--open">js
                <div class="file">main.js</div>
            </div>
            <div class="folder folder--open">css
                <div class="file">main.css</div>
            </div>
        </div>
        <div class="folder folder--open">_layouts
            <div class="file">master.blade.php</div>
        </div>
        <div class="folder folder--open">assets
            <div class="folder folder--open">images
                <div class="file">jigsaw.png</div>
            </div>
        </div>
        <div class="file">index.blade.php</div>
    </div>
    <div class="folder">vendor</div>
    <div class="ellipsis">...</div>
</div>

However, you're free to store your assets elsewhere and update your Vite configuration and layout accordingly. For instance, if you choose to store them in a directory named `foobar` at the root of your project, you'd update your Blade layout like this:

```blade
@viteRefresh()
<link rel="stylesheet" href="{{ vite('foobar/css/main.css') }}">
<script defer type="module" src="{{ vite('foobar/js/main.js') }}"></script>
```

And your `jigsaw` configuration in `vite.config.js` would look like this:

```js
jigsaw({
    input: ['foobar/js/main.js', 'foobar/css/main.css'],
    refresh: true,
}),
```

Keep in mind that if you place this directory under `source`, its name **must** start with an underscore (e.g., `_foobar`) to prevent Jigsaw from directly copying its contents to the build output.
