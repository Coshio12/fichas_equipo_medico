<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        setlocale(LC_TIME, 'es_ES.UTF-8'); // Cambia 'es_ES.UTF-8' al idioma que desees.
        Carbon::setLocale('es'); // Configura el idioma para Carbon.
    }
}
