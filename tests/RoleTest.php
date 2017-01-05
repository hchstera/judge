<?php

use Hchs\Judge\BaseTestCase;
use Hchs\Judge\Permission\Role;
use Hchs\Judge\Permission\FakeUser as User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RoleTest extends BaseTestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * A create Role test.
     *
     * @group judge
     */
    public function testCreateRole()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $role = Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'You are Admin'
        ]);

        $this->assertEquals($role->name, 'admin');
        $this->assertEquals($role->display_name, 'Admin');
        $this->assertEquals($role->description, 'You are Admin');
    }

    /**
     * test Relation between User <---> Role .
     *
     * @group judge
     */
    public function testUserCanAttachRole()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $role = Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'You are Admin'
        ]);

        $user = User::create(['name' => 'judge']);

        $user->attachRole($role);
        $target = $user->roles()->first();
        $this->assertEquals($target->name, 'admin');
        $this->assertEquals($target->display_name, 'Admin');
        $this->assertEquals($target->description, 'You are Admin');
    }

    /**
     * test Relation between User <---> Role .
     *
     * @group judge
     */
    public function testRoleToUser()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $role = Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'You are Admin'
        ]);

        $user = User::create(['name' => 'judge']);

        $user->attachRole($role);
        $target = $role->fakeusers()->first();
        $this->assertEquals($target->id, 1);
        $this->assertEquals($target->name, 'judge');
    }
}
