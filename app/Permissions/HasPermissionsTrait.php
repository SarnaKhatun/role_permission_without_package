<?php


namespace App\Permissions;


use App\Models\Permission;
use App\Models\Role;

trait HasPermissionsTrait
{
    //get permissions
    public function getAllPermissions($permissions)
    {
        return Permission::whereIn('slug', $permissions)->get();
    }

    //check has permission
    public function hasPermission($permissions)
    {
        return (bool) $this->permissions->where('slug', $permissions->slug)->count();
    }

    //check has role
    public function hasRole(...$roles)
    {
        foreach ($roles as $role)
        {
            if ($this->roles->contains('slug', $role))
            {
                return true;
            }
        }
        return false;
    }
    public function hasPermissionTo($permissions)
    {
        return $this->hasPermissionThroughRole($permissions) || $this->hasPermission($permissions);
    }


    public function hasPermissionThroughRole($permissions)
    {
        // Check if $permissions is not null and has the roles property
        if ($permissions && isset($permissions->roles)) {
            foreach ($permissions->roles as $role) {
                if ($this->roles->contains($role)) {
                    return true;
                }
            }
        }
        return false;
    }


    //give permission
    public function givePermissionTo(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        if ($permissions == null)
        {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }


    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }

    public function roles ()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }
}
