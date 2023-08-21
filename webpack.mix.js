const mix = require('laravel-mix');

mix.minify('resources/js/stisla.js', 'public/assets/js/stisla.min.js');
mix.minify('resources/js/scripts.js', 'public/assets/js/scripts.min.js');
mix.minify('resources/css/app.css', 'publiccss/app.min.css');
