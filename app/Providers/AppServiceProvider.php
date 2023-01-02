<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register local dev services.
     */
    private function register_local_services() {
        $this->app->register('Barryvdh\Debugbar\ServiceProvider');
    }

    /**
     * Register production services.
     */
    private function register_prod_services() {
        $this->app['request']->server->set('HTTPS', true);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->isLocal() ?
            $this->register_local_services() :
            $this->register_prod_services();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
