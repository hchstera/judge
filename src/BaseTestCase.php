<?php

namespace Hchs\Judge;

use Illuminate\Foundation\Testing\TestCase as TestCase;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Storage;
use Exception;
use Config;

abstract class BaseTestCase extends TestCase
{
    use MessagePrintable;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app_path = __DIR__.'/../../../../bootstrap/app.php';
        if (!file_exists($app_path)) {
            throw new Exception('not found the app.php in '.$app_path);
        }
        $app = require $app_path;

        $app->make(Kernel::class)->bootstrap();

        $this->setSqliteEnv();

        return $app;
    }

    /**
     * Change Database connection for test environment Dynamically.
     */
    public function setSqliteEnv()
    {
        Storage::put('judgetest_db.sqlite', '');
        Config::set('database.connections.' . 'judgetest_db', array(
            'driver' => 'sqlite',
            'database' => storage_path('app/judgetest_db.sqlite'),
            'prefix' => '',
        ));
        Config::set('database.default', 'judgetest_db');
        $this->printMessage("\r\n create judgetest_db.sqlite in [".storage_path('app/judgetest_db.sqlite')."]");
    }
}
