<?php

namespace App\Observers;

use App\Models\Acl\AclGroupPermission;
use App\Models\Acl\AclModules;

class AclModuleObserver
{
    /**
     * Handle the AclModules "created" event.
     *
     * @param  \App\Models\Acl\AclModules  $aclModules
     * @return void
     */
    public function created(AclModules $aclModules)
    {
        //Add child on ACL Group Permission
        AclGroupPermission::create([
            'operation_id' => 1,
            'permission_module_id' => $aclModules->id
        ]);
    }
}
