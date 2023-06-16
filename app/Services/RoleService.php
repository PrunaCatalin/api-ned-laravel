<?php

/*
 * webdirect | RoleService.php
 * https://www.webdirect.ro/
 * Copyright 2023 Pruna Catalin Costin
 * Email : office@webdirect.ro
 * Type  : PHP
 * Created on : 4/10/2023 10:20 PM
*/

namespace App\Services;

use App\Models\ExtendedRole;
use App\Models\ExtendedPermission;

class RoleService
{
    public function assignRole(User $user, string $roleName, string $roleDescription = null): void
    {
        // Găsește sau creează rolul
        $role = ExtendedRole::firstOrCreate(['name' => $roleName], ['description' => $roleDescription]);
        $user->assignRole($role);
        // Asignează rolul utilizatorului
    }

    public function updateRoleDescription(string $roleName, string $newDescription): void
    {
        // Găsește rolul după nume
        $role = ExtendedRole::where('name', $roleName)->first();

        // Verifică dacă rolul există
        if (!$role) {
            // Tratează cazul în care rolul nu există, de exemplu, aruncând o excepție sau returnând un mesaj de eroare
            return;
        }

        // Actualizează descrierea rolului
        $role->description = $newDescription;
        $role->save();
    }

    public function assignPermission(User $user, string $permissionName, string $permissionDescription = null)
    {
        // Găsește sau creează permisiunea
        $permission =  ExtendedPermission::firstOrCreate(
            ['name' => $permissionName],
            ['description' => $permissionDescription]
        );
        $user->givePermissionTo($permission);
    }

    public function updatePermissionDescription(string $permissionName, string $newDescription)
    {
        // Găsește permisiunea după nume
        $permission = ExtendedPermission::where('name', $permissionName)->first();

        // Verifică dacă permisiunea există
        if (!$permission) {
            // Tratează cazul în care permisiunea nu există, de exemplu,
            // aruncând o excepție sau returnând un mesaj de eroare
            return;
        }

        // Actualizează descrierea permisiunii
        $permission->description = $newDescription;
        $permission->save();
    }
}
