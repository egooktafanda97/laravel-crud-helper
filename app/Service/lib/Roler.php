<?php

namespace App\Service\lib;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

trait Roler
{
    public function newRole($guard_name, $name)
    {
        $response = Role::firstOrCreate(['guard_name' => $guard_name, 'name' => $name]);
        return $response;
    }
    public function createRole($models, $role)
    {
        $models->assignRole($role);
    }
    public function users_role(object $users, array $role)
    {
        if (!$roler = $this->newRole($role[0], $role[1]))
            return ["error" => "role instansi could not be created"];
        $this->createRole($users, $roler);
    }
}
