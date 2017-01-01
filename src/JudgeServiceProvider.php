<?php

namespace Hchs\Judge;

use Illuminate\Support\ServiceProvider;

class JudgeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //  $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->publishes([
            __DIR__.'/migrations' => base_path('database/migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../tests' => base_path('tests/judge'),
        ], 'tests');
        // $this->publishes([
        //     __DIR__.'/Permission' => base_path('app/Judge'),
        // ], 'judge');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
