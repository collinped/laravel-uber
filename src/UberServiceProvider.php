<?php

namespace Collinped\TwilioVideo;

use Aloha\Twilio\Commands\TwilioVideoRoomCommand;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;


class UberServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        //$this->registerResources();
        $this->registerCommands();
        $this->registerPublishing();
    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();
    }

    /**
     * Setup the configuration for Cashier.
     *
     * @return void
     */
    protected function configure()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/uber.php', 'uber'
        );
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        if (Twilio::$registersRoutes) {
            Route::group([
                'prefix' => config('twilio-video.path'),
                'namespace' => 'Collinped\Uber\Http\Controllers',
                'as' => 'uber.',
            ], function () {
                $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
            });
        }
    }

    /**
     * Register the package commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        $this->app->singleton('twilio-video.room', TwilioVideoRoomCommand::class);
    }

    /**
     * Register the package migrations.
     *
     * @return void
     */
    protected function registerMigrations()
    {
        if (Twilio::$runsMigrations && $this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/uber.php' => $this->app->configPath('uber.php'),
            ], 'uber-config');
            $this->publishes([
                __DIR__.'/../database/migrations' => $this->app->databasePath('migrations'),
            ], 'uber-migrations');
        }
    }
}
