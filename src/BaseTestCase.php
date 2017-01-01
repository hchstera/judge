<?php

namespace Hchs\Judge;

use Illuminate\Foundation\Testing\TestCase as TestCase;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Storage;
use Exception;

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
        Storage::put('judgetest_db.sqlite', '');
        $this->printMessage('create judgetest_db.sqlite in ['.storage_path('app/judgetest_db.sqlite').']');
        return $app;
    }
}
