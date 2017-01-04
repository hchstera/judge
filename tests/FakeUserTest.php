<?php

use Hchs\Judge\BaseTestCase;
use Hchs\Judge\Permission\FakeUser as User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FakeUserTest extends BaseTestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * A new User test.
     *
     * @group judge
     */
    public function testNewUser()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $user = new User();

        $this->assertNotNull($user);
    }
}
