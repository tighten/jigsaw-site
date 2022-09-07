---
extends: _layouts.documentation
section: documentation_content
---

## Building & Previewing

When you'd like to generate your site, run the `build` command from within your project root:

```bash
vendor/bin/jigsaw build
```

Jigsaw will generate your static HTML and place it in the `/build_local` directory by default.

Using the default site structure, `/build_local` will look like this:

<div class="files">
    <div class="folder folder--open focus">build_local
        <div class="folder folder--open">assets
            <div class="folder folder--open">build
                <div class="folder folder--open">css
                    <div class="file">main.css</div>
                </div>
                <div class="folder folder--open">js
                    <div class="file">main.js</div>
                </div>
                <div class="file">mix-manifest.json</div>
            </div>
            <div class="folder folder--open">images
                <div class="file">jigsaw.png</div>
            </div>
        </div>
        <div class="file">index.html</div>
    </div>
    <div class="folder">source</div>
    <div class="folder">tasks</div>
    <div class="folder">vendor</div>
    <div class="ellipsis">...</div>
</div>

### Watching files for changes

To compile the assets and keep watching your project for changes you can run the following command:

```bash
npm run watch
```

Your project will open at a localhost URL and any time any file changes in your project, Webpack will recompile your assets, and Jigsaw will regenerate your static HTML pages to `/build_local`.

You can also watch a specific environment by running `npm run local`, `npm run staging`, or `npm run prod`.

### Previewing with PHP

To quickly preview your site, use the `serve` command:

```bash
vendor/bin/jigsaw serve
```

You can now view your site at `http://localhost:8000` in your browser.

You can also optionally specify the environment and port to serve like so:

```bash
vendor/bin/jigsaw serve production --port=8080
```

This will serve your `/build_production` directory at `http://localhost:8080`.
