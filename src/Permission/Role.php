<?php

namespace Hchs\Judge\Permission;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    /*------------------------------------------------------------------------**
    ** Entity 定義                                                            **
    **------------------------------------------------------------------------*/
    protected $table = 'roles';
    protected $fillable = [
        'name',                   // 權限角色名稱
        'display_name',           // 顯示的名稱
        'description',            // 權限敘述
    ];
    /**
     * 設定多形中介表名稱.
     */
    protected $pivot_table = 'role_endowables';

    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/
    public function __call($name, $arguments)
    {
        $judges = config('judge.models');
        if(!array_key_exists($name, $judges))
            throw new \Exception("No relation for model ".$name , 1);

        return $this->morphedByMany($judges[$name], $this->pivot_table)->withTimestamps();
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    /*------------------------------------------------------------------------**
    ** 自訂功能函數                                                            **
    **------------------------------------------------------------------------*/

    /**
     * 關聯特定的Permission
     */
    public function attachPermission($permission)
    {
        if(!$this->permissions()->find($permission->id))
            return $this->permissions()->attach($permission);
    }

    /**
     * 解除關聯特定的Permission
     */
    public function detachPermission($permission)
    {
        return $this->permissions()->detach($permission);
    }

    /**
     * sync關聯特定的permission_ids.
     *
     */
    public function syncPermissions($permission_ids)
    {
        return $this->permissions()->sync($permission_ids);
    }

    /**
     * 判斷有無特定的Permission
     */
    public function hasPermission($permission_name)
    {
        if ($this->permissions()->where('name', $permission_name)->first()) {
            return true;
        } else {
            return false;
        }
    }

}
