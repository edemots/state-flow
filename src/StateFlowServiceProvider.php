<?php

namespace Louishrg\StateFlow;

use Illuminate\Support\ServiceProvider;
use Louishrg\StateFlow\Commands\NewState;

class StateFlowServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-state-machine');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-state-machine');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('state-flow.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-state-machine'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-state-machine'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-state-machine'),
            ], 'lang');*/

            /*$this->commands([
                NewState::class,
            ]);*/
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'state-flow');

        // Register the main class to use with the facade
        $this->app->singleton('state-flow', function () {
            return new StateFlow;
        });
    }
}
