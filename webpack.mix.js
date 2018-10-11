let build = require("./tasks/build.js");
let mix = require("laravel-mix");
require("laravel-mix-tailwind");

mix.disableSuccessNotifications();
mix.setPublicPath("source/assets/build");

mix.webpackConfig({
  plugins: [
    build.jigsaw,
    build.browserSync(),
    build.watch(["source/**/*.md", "source/**/*.php", "source/**/*.less"])
  ]
});

mix.js('source/_assets/js/app.js', 'js/')
    .postCss('source/_assets/css/main.css', 'css/')
    .tailwind();

if (!mix.inProduction()) {
  mix.sourceMaps();
}
