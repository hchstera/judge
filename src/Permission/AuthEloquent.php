<?php

namespace Hchs\Judge\Permission;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * 能夠被認證系統認證的Eloquent核心.
 */
abstract class AuthEloquent extends Authenticatable
{
    use RolePermissionTrait;
}
