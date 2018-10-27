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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');


mix.autoload({
    jquery: ['$', 'window.jQuery', "jQuery", "window.$", "jquery", "window.jquery"]
});
// Select 2
mix.scripts([
    'resources/assets/js/plugins/select2/select2.js',
    'resources/assets/js/web/components/select2.js'
], 'public/plugins/select2.js');

// Parallax
mix.scripts([
    'resources/assets/js/plugins/parallax100/parallax100.js',
    'resources/assets/js/web/components/parallax.js'
], 'public/plugins/parallax.js');

// Plugins
mix.js([
    'resources/assets/js/web/plugins.js'
], 'public/js/plugins.js');

// Main JS
mix.scripts([
    'resources/assets/js/web/main.js'
], 'public/js/main.js');

// Admin resources
mix.js('resources/assets/js/admin.js', 'public/js')
    .sass('resources/assets/sass/admin.scss', 'public/css');

// Plugins
mix.babel([
    'resources/assets/js/admin/product-editor.js'
], 'public/js/admin/product-editor.js');

mix.babel([
    'resources/assets/js/admin/confirm-delete.js'
], 'public/js/admin/confirm-delete.js');

mix.babel([
    'resources/assets/js/admin/chartjs.js'
], 'public/js/admin/chart.js');

mix.babel([
    'resources/assets/js/admin/dashboard.js'
], 'public/js/admin/dashboard.js');
// Order
mix.babel([
    'resources/assets/js/admin/order.js'
], 'public/js/admin/order.js');

// Settings
mix.babel([
    'resources/assets/js/admin/settings.js'
], 'public/js/admin/settings.js');

// Product filter
mix.babel([
    'resources/assets/js/web/components/product-list.js'
], 'public/js/js/frontend/product-list.js');
