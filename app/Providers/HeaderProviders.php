<?php

namespace App\Providers;

use App\Models\Commande;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HeaderProviders extends ServiceProvider
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
        //
        View::composer(['layouts.header', 'welcome'], function ($view) {
            $user = auth()->user();
            // dd($user);
            $userId = $user->id;

            $count_commande = Commande::where('user_id', $userId)->get()->count();

            $view->with([
                'count_commande' => $count_commande,
            ]);
        });
    }
}
