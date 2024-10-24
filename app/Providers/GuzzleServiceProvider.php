<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GuzzleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //

        $this->app->singleton(GuzzleClient::class, function ($app) {
            return new GuzzleClient([
                'verify' => false, // Désactiver la vérification SSL
            ]);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
