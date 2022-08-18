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

mix.js('resources/js/app.js', 'public/js').sass('resources/sass/app.scss', 'public/css');

// Dashboard
mix.js('resources/js/Dashboard/dashboard.js', 'public/js').vue();
mix.js('resources/js/Dashboard/navbar.js', 'public/js').vue();

// 20 aniversario
mix.js('resources/js/20Aniversario/aniversario.js', 'public/js').vue();
mix.js('resources/js/20Aniversario/20admin.js', 'public/js').vue();

// Administración
mix.js('resources/js/Admin/admin.js', 'public/js').vue();

mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');