<?php

use Hchs\Judge\BaseTestCase;
use Hchs\Judge\Permission\Permission;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ConfigTest extends BaseTestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * test example.
     *
     * @group judge
     */
    public function testGetConfigValue()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $config = config('judge.models');
        $this->assertNotNull($config);
    }

}
