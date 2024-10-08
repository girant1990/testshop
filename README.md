RUN STEPS

1 Composer install
2 Copy env.example to .env
3 php artisan key:generate
4 npm install
5 php artisan queue:table
6 php artisan migrate
7 php artisan db:seed
8 npm run watch
9 php artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="config"
10 php artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="migrations"



For local environment
1 php artisan passport:install
2 php artisan queue:work
3 php artisan schedule:work
4 php artisan websocket:serve


Also needed to remove post.install.css file if created
