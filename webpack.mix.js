const mix = require('laravel-mix');

mix.minify('resources/js/stisla.js', 'public/assets/js/stisla.min.js');
mix.minify('resources/css/style.css', 'public/assets/css/style.min.css');
