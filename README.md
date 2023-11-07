# laravel_with_roles_attributesphp8
**EN** A base framework with implemented role functionality using attributes php8


First, install the package **jwt-auth**

`composer require tymon/jwt-auth`

Run the following command to publish the package config file:

`php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"`

Generate secret key

`php artisan jwt:secret`

Run migrations

`php artisan migrate`


**RU** Это стартовый проект на котором реализована авторизации api и система ролей и прав с использованием PHP Аттрибутов с 8 версии.

Установите пакет **jwt-auth**

`composer require tymon/jwt-auth`

Запустите команду для установки конфига:

`php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"`

Сгенерируйте секретный ключ

`php artisan jwt:secret`

Запустите миграции

`php artisan migrate`
