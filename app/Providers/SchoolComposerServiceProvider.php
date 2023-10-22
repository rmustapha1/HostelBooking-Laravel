<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\School;

class SchoolComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Define the view composer to make $schools available globally
        view()->composer('*', function ($view) {
            $view->with('schools', School::all());
        });
    }
}
