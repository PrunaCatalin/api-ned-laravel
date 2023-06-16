<?php

namespace Database\Seeders;

use App\Models\ExtendedRole;
use App\Services\RoleService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Artisan::call('permissions:generate');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create the admin role
        $roleService = new RoleService();
        $admin = Role::create(['name' => 'Administrator']);
        // Get all permissions
        $permissions = Permission::all();
        // Give the admin role all permissions
        $admin->givePermissionTo($permissions);

    }
}
