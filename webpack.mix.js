const mix = require('laravel-mix');
mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/utils.js', 'public/js')
    .js('resources/js/items/items.js', 'public/js/items')
    .css('resources/css/app.css', 'public/css')
    .css('resources/css/global.css', 'public/css')
    .version(); // Optional: for cache busting
