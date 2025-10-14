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
        // Configure Guzzle HTTP client with CA bundle for SSL certificate verification
        // This fixes "SSL certificate problem: unable to get local issuer certificate" errors
        $this->app->bind(\GuzzleHttp\Client::class, function () {
            return new \GuzzleHttp\Client([
                'verify' => 'C:\php\cacert.pem',
            ]);
        });
    }
}
