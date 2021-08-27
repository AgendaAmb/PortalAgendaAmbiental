<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Observers\UserObserver;
use App\Models\Auth\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('slider', \App\View\Components\Slider::class);
        Blade::component('acordeon', \App\View\Components\Acordeon::class);
        Blade::component('botonAcordeon', \App\View\Components\BotonAcordeon::class);
        Blade::component('contenedor-botones', \App\View\Components\ContenedorBotones::class);
        Blade::component('ejeTrabajo', \App\View\Components\EjeDeTrabajo::class);
        User::observe(UserObserver::class);

        if (App::environment('production'))
            URL::forceScheme('https');
    }
}
