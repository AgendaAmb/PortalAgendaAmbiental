<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::component('item-acordeon', \App\View\Components\ItemAcordeon::class);
        Blade::component('contenedor-botones', \App\View\Components\ContenedorBotones::class);
    }
}
