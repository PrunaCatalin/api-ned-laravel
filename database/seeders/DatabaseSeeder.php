<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TenantSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(WdApplicationLinksSeeder::class);
        $this->call(TenantConfigurationSeeder::class);
        $this->call(UserSeeder::class);
//        $this->call(AclOperationSeeder::class);
//        //AclModules , AclGroupPermission (inherit on observer), AclRole , AclGroupRole
//        $this->call(AclRoleSeeder::class);
//        $this->call(AclModuleSeeder::class);
//        $this->call(AclGroupRoleSeeder::class);

        //LICH
//        $this->call(MembersTableSeeder::class);
//        $this->call(MemberInfoTableSeeder::class);
//        $this->call(MemberWebsiteTableSeeder::class);
//        $this->call(MemberCompanyTableSeeder::class);
//
//        $this->call(GameTableSeeder::class);
//        $this->call(CategoryTableSeeder::class);
//        $this->call(GameCategoryTableSeeder::class);


    }
}
