<?php

namespace App\Traits;

use App\Models\Role;

trait HasRole
{
    public function hasRole($role)
    {
        if ($this->role->id == $role) {
            return true;
        }
        return false;
    }
}
