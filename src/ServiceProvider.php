<?php

namespace Redbastie\LaravelLivewireHelpers;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-livewire-helpers');
        $this->publishes([__DIR__ . '/../resources/views' => resource_path('views/vendor/laravel-livewire-helpers')]);
    }
}
