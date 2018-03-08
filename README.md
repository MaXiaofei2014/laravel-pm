# laravel-pm
project management

# Installation

You may use Composer to install laravel-git-deploy into your Laravel project:

```shell
composer require lifeibest/laravel-pm:dev-master

```

After installing `laravel-git-deploy`, publish its config using the vendor:publish Artisan command:

```shell
php artisan vendor:publish --provider="Lifeibest\LaravelPm\PmServiceProvider"
```


migrate database

```shell
php artisan migrate --path=vendor/lifeibest/laravel-pm/database/migrations
```

import menu and permission

```shell
php artisan admin:import deploy
```
