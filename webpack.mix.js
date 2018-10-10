let build = require("./tasks/build.js");
let mix = require("laravel-mix");
let tailwindcss = require("tailwindcss");
require("laravel-mix-purgecss");

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
    .postCss('source/_assets/css/documentation.css', 'css/')
    .postCss('source/_assets/css/main.css', 'css/')
    .options({
        processCssUrls: false,
        postCss: tailwindcss('./tailwind.js')
      })
    .version();

if (!mix.inProduction()) {
  mix.sourceMaps();
}
