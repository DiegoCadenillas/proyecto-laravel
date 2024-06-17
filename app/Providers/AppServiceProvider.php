<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Products;
use App\Models\Images;
use App\Observers\ProductsObserver;
use App\Observers\ImagesObserver;

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
        // Add Observers
        Products::observe(ProductsObserver::class);
        Images::observe(ImagesObserver::class);
    }
}
