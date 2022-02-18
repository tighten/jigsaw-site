---
extends: _layouts.documentation
section: documentation_content
---

## Custom 404 Page

You can create a custom 404 error page to display when someone tries to access a page on your site that does not exist. How you do this depends on where your site is hosted.

### Using GitHub Pages or Netlify

Some hosts, like GitHub Pages and Netlify, are automatically configured to look for a file named `404.html` at the root level of your site. If your Jigsaw site is using [pretty URLs](/docs/pretty-urls), you can specify a `permalink` in the file for your custom 404 page so that the `.html` extension is preserved:

> _source/404.md_

```markdown
---
extends: _layouts.master
section: content
permalink: 404.html
---

### Sorry, that page does not exist.
```

Note that YAML front matter can also be used in Blade files, so you can accomplish the same thing using a Blade file named `404.blade.php`.

This will create a file named `404.html` in your site's `build` directory.

### Using an Nginx Server

You can create your custom 404 file as `404.md` or `404.blade.php` in your `source` directory, and if your Jigsaw site is using [pretty URLs](/docs/pretty-urls), it will be output as `/404/index.html`:

> _source/404.md_

```markdown
---
extends: _layouts.master
section: content
---

### Sorry, that page does not exist.
```

When hosting your site on an Nginx server, you will need to configure the `error_page` setting in your server's `nginx.conf` file, or in the specific configuration file that Nginx is using for your site. These configuration files are typically found in `/etc/nginx/`, though their location varies by server. If your site is managed using Laravel Forge, for example, the configuration file for your site will be located at `/etc/nginx/sites-enabled/{name-of-your-site}`; it can also be edited via Forge's "Edit Nginx Configuration" option in the "Files" menu.

Once you've located your Nginx configuration file, add the following line to the `server` block:

```nginx
error_page 404 /404;
```

In addition, if it is not already there, make sure the following line appears in the section of your configuration file that begins with `location ~ \.php$ {`:

```nginx
fastcgi_intercept_errors on;
```

After you restart your Nginx server, it will look for the error page `/404/index.html` in your `build` directory whenever someone navigates to a page that does not exist.
