<?php

use Hchs\Judge\BaseTestCase;
use Hchs\Judge\Permission\Permission;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PermissionTest extends BaseTestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * A basic functional test example.
     *
     * @group judge
     */
    public function testBasicExample()
    {
        $this->printTestStartMessage(__FUNCTION__);

        $this->assertEquals(1, 1);
    }
    /**
     * A create Permission test.
     *
     * @group judge
     */
    public function testCreatePermission()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $permission = Permission::create([
            'name' => 'editArticle',
            'display_name' => 'Edit permissions',
            'description' => 'You can edit articles'
        ]);

        $this->assertEquals($permission->name, 'editArticle');
        $this->assertEquals($permission->display_name, 'Edit permissions');
        $this->assertEquals($permission->description, 'You can edit articles');
    }
}
