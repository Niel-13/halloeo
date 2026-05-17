<?php

namespace App\Providers;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
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
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        View::composer('*', function ($view) {
            $footerServices = Cache::remember('footer_services', now()->addHours(6), function () {
                return Service::query()
                    ->latest()
                    ->take(6)
                    ->get(['id', 'title', 'slug']);
            });

            $view->with('footerServices', $footerServices);
        });
    }
}
