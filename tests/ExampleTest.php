<?php

use Hchs\Judge\BaseTestCase;

class ExampleTest extends BaseTestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->printTestStartMessage(__FUNCTION__);
        
        $this->assertEquals(1, 1);
    }
}
