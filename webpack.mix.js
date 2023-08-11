const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js').minify('public/js/app.js');

mix.postCss('resources/css/app.css', 'public/css').minify('public/css/app.css');
