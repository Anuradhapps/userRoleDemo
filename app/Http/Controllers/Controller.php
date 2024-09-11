<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    public function getPermission()
    {
        $permissionedRoles = Auth::user()->role->permissionedRoles;
        $permissionNames = [];
        foreach ($permissionedRoles as $permissionedRole) {
            $permissionNames[] = $permissionedRole->permission->slug;
        }
        return $permissionNames;
    }
}
