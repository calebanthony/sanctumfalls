let mix = require('laravel-mix');

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

mix.js([
        'node_modules/sweetalert/dist/sweetalert.min.js',
        'node_modules/popper.js/dist/popper.min.js',
        'resources/assets/js/app.js',
    ], 'public/js/app.js')
   .sass('resources/assets/sass/app.scss', 'public/css/app.css')

if (mix.inProduction()) {
    mix.version();
}
