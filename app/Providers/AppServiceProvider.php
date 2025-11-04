<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Register console commands when running in the console
        if ($this->app->runningInConsole()) {
            $this->commands([
                \App\Console\Commands\AssignProjectUsers::class,
            ]);
        }
    }
}
