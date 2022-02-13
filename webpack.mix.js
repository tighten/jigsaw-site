const mix = require('laravel-mix');
require('laravel-mix-jigsaw');

mix.disableNotifications();
mix.setPublicPath('source/assets/build');

mix.jigsaw()
    .js('source/_assets/js/app.js', 'js').vue()
    .css('source/_assets/css/app.css', 'css', [require('tailwindcss'), require('autoprefixer')])
    .browserSync({ server: 'build_local', files: ['build_local/**'] })
    .sourceMaps()
    .version();
