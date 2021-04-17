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

//mix.js('resources/js/app.js', 'public/js')
  //.sass('resources/sass/app.scss', 'public/css');

 ///mix.less('resources/less/backend/style.less', 'public/css/backend')

 mix.js('resources/js/backend/todo.js', 'public/js/backend')
 