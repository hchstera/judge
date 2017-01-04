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
            __DIR__.'/../tests/RoleTest.php' => base_path('tests/judge/RoleTest.php'),
        ], 'tests');
        $this->publishes([
            __DIR__.'/../tests/PermissionTest.php' => base_path('tests/judge/PermissionTest.php'),
        ], 'tests');
        $this->publishes([
            __DIR__.'/../tests/ConfigTest.php' => base_path('tests/judge/ConfigTest.php'),
        ], 'tests');
        $this->publishes([
            __DIR__.'/../tests/FakeUserTest.php' => base_path('tests/judge/FakeUserTest.php'),
        ], 'tests');
        $this->publishes([
            __DIR__.'/../tests/2014_10_12_000000_create_fake_users_table.php'
            => base_path('database/migrations/2014_10_12_000000_create_fake_users_table.php'),
        ], 'tests');

        $this->publishes([
            __DIR__.'/config/judge.php' => config_path('judge.php'),
        ], 'config');
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
