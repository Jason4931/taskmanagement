<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use App\Filament\Resources\ProyekResource\Widgets\Summary;

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
        // <–– Register the Filament widget with Livewire
        Livewire::component(
            'app.filament.resources.proyek-resource.widgets.summary',
            Summary::class,
        );
    }
}
