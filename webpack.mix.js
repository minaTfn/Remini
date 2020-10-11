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

// mix.styles([
//     'resources/plugins/select2/select2.min.css',
//     'resources/plugins/trix/trix.css',
// ], 'public/css/all.css');
//
// mix.scripts([
//     'resources/plugins/select2/select2.min.js',
//     'resources/plugins/trix/trix.js',
// ], 'public/js/all.js');

mix.js('resources/js/app.js', 'public/js');
mix.sass('resources/sass/app.scss', 'public/css');

// mix.disableNotifications();
