const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.sass('resources/assets/front/sass/main.sass', 'public/css')
    .sass('resources/assets/admin/sass/admin.sass', 'public/css')
    // .js('resources/js/main/main.js', 'public/js')
    .js('resources/js/app.js', 'public/js')
    .vue().sourceMaps();

mix.copyDirectory('resources/assets/admin/img', 'public/assets/admin/img');
mix.copyDirectory('resources/assets/front/img', 'public/assets/img');
mix.copyDirectory('resources/assets/admin/plugins/fontawesome-free/webfonts', 'public/assets/admin/webfonts');

mix.copyDirectory('node_modules/tinymce/', 'public/vendor/tinymce/');



mix.browserSync('ash-starter.test');
