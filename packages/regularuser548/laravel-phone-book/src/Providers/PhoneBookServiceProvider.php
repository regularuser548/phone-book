<?php

namespace Regularuser548\LaravelPhoneBook\Providers;

use Illuminate\Support\ServiceProvider;

class PhoneBookServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'laravel-phone-book');
    }
}
