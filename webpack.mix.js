const mix = require('laravel-mix');
mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/utils.js', 'public/js')
    .js('resources/js/items/items.js', 'public/js/items')
    .js('resources/js/items/socket.js', 'public/js/items')
    .js('resources/js/items/export.js', 'public/js/items')
    .js('resources/js/js.cookie.min.js', 'public/js')
    .css('resources/css/app.css', 'public/css')
    .css('resources/css/global.css', 'public/css')
    .version(); // Optional: for cache busting
