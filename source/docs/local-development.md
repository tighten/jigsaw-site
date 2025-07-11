---
extends: _layouts.documentation
section: documentation_content
---

## Local Development

### Set Your Local URL

To preview your site locally, you'll first need to create a **`.env` file** and specify your local URL in the `APP_URL` variable:

```toml
APP_URL=http://your_url_here
```

#### Using Jigsaw

Jigsaw includes a `serve` command that makes your site available at `http://localhost:8000`. You can use this URL directly in your `.env` file:

```toml
APP_URL=http://localhost:8000
```

Once configured, start the local server by running `vendor/bin/jigsaw serve`.

#### Using Valet

Alternatively, you can use [Laravel Valet](https://laravel.com/docs/12.x/valet) to run your site locally with a `.test` domain. From your project root, execute this command:

```sh
valet link my-site
```

This will host your site at `http://my-site.test`, which you can then use in your `.env` file:

```toml
APP_URL=http://my-site.test
```

-----

### Preview Your Site

To preview your site after setting up your URL, run the **`dev` command** from your project root:

```sh
npm run dev
```

You'll see an output similar to this:

```text
  VITE v6.3.5  ready in 165 ms

  ➜  Local:    http://localhost:5173/
  ➜  Network: use --host to expose
  ➜  press h + enter to show help

  JIGSAW v1.8.1  plugin v1.0.1

  LARAVEL    plugin v1.2.0

  ➜  APP_URL: http://mysite.test

  Initial Jigsaw build completed.
```

You can then visit your local URL (e.g., `http://mysite.test`) in your browser to view your site.

Jigsaw generates your static HTML files in the `/build_local` directory and watches for changes. Any modifications to your content (whether Markdown or Blade files) will automatically trigger a full page reload in your browser.

These reloads are logged in your terminal:

```text
[vite] full reload for source/index.blade.php - build: 265 ms
```

Your JavaScript and CSS assets are handled by **Vite**, which loads them from their default locations:

  * `source/_assets/js/app.js`
  * `source/_assets/css/app.css`

Vite continuously monitors for changes to these files (or any files they import). This means any edits you make will be instantly reflected in your browser thanks to its [Hot Module Replacement](https://vite.dev/guide/features.html#hot-module-replacement) (HMR) feature.

These updates are also logged in your terminal:

```text
[vite] (client) hmr update /source/_assets/css/main.css?direct
```

> If you're **not using Vite** (for example, because you don't need to compile assets), you can simply preview your site using Jigsaw's `serve` command or Laravel Valet. Keep in mind that changes to your content won't automatically trigger a page reload in this scenario. You'll need to manually run `vendor/bin/jigsaw build local` to regenerate your site after making edits.
