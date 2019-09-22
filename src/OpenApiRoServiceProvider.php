<?php

namespace tmdroid\OpenApiRo;

use Illuminate\Support\ServiceProvider;

class OpenApiRoServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tmdroid');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'tmdroid');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/openapiro.php', 'openapiro');

        // Register the service the package provides.
        $this->app->singleton('openapiro', function ($app) {
            return new OpenApiRo;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['openapiro'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/openapiro.php' => config_path('openapiro.php'),
        ], 'openapiro.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/tmdroid'),
        ], 'openapiro.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/tmdroid'),
        ], 'openapiro.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/tmdroid'),
        ], 'openapiro.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
