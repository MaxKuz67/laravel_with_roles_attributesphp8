# laravel_with_roles_attributesphp8
A base framework with implemented role functionality using attributes php8


First, install the package **jwt-auth**

`composer require tymon/jwt-auth`

Run the following command to publish the package config file:

`php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"`

Generate secret key

`php artisan jwt:secret`

Run migrations

`php artisan migrate`
