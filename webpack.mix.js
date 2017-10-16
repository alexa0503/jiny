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
//mix.js('packages/alx/admin/src/resource/assets/js/app.js', 'public/js');
/*
mix.js('packages/alx/admin/src/resources/assets/js/app.js', 'public/js')
   .sass('packages/alx/admin/src/resources/assets/sass/app.scss', 'public/css');
mix.scripts([
   'public/js/admin.js',
   'public/js/dashboard.js'
], 'public/js/all.js');
*/
mix.browserSync('jiny.dev');
//mix.copy('bower_components/vue/dist/vue.min.js', 'public/js/vue.min.js');
//mix.copy('bower_components/axios/dist/axios.min.js', 'public/js/axios.min.js');
mix.copy('bower_components/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');
mix.copy('bower_components/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js');
//mix.js('resources/assets/js/login.js', 'public/js');
//mix.js('resources/assets/js/index.js', 'public/js')
    //.js('resource/assets/js/admin.js', 'public/js/admin')
mix.sass('resources/assets/sass/app.scss', 'public/css').version();
