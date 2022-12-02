// webpack.mix.js

const mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
   
// mix.js('resources/js/app.js', 'public/js')
//     .vue()
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);