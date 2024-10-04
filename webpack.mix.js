const mix = require('laravel-mix');
mix.js('resources/js/app.js', 'public/js')
    .css('resources/css/app.css', 'public/css')
    .css('resources/css/global.css', 'public/css')
    .version(); // Optional: for cache busting
