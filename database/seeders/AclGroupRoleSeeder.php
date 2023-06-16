<?php

namespace Database\Seeders;

use App\Models\Acl\AclGroupPermission;
use App\Models\Acl\AclGroupRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AclGroupRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $listGroupPermission = AclGroupPermission::with(['module'])->get();
        foreach ($listGroupPermission as $groupPermission) {
            AclGroupRole::create([
                "role_id" => 1,
                "group_permission_id" => $groupPermission->id,
                "domain_id" => $groupPermission->module->domain_id,
            ]);
        }
    }
}
