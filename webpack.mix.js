const mix = require('laravel-mix');

mix.js('resources/js/indicator.js', 'public/js') 
    .js('resources/js/pegawai.js', 'public/js') 
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
