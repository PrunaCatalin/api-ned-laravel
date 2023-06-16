<template>
    <div class="nav-tabs-container">
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#/cpanel/config-acl/role" role="tab"
                v-if="isActive('config-acl-role')">
                    <i class="icon-home2 block"></i>
                    {{ isActive('config-acl-permission-role') ? 'Edit Role Permission : ' + this.roleStore.Role.name : 'Role'}}
                </a>
                <a class="nav-link active" data-toggle="tab" href="#/cpanel/config-acl/permission-role" role="tab"
                v-if="isActive('config-acl-permission-role')">
                    <i class="icon-package block"></i>
                    {{  'Edit Role Permission : ' + this.roleStore.Role.name  }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade" :class="{'show active' : isActive('config-acl-role') ?? 'show active' } "
                 role="tabpanel" aria-labelledby="role-list-tab">
                <AclRole></AclRole>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" :class="{'show active' : isActive('config-acl-permission-role') ?? 'show active' } "
                 role="tabpanel" aria-labelledby="role-list-tab">
                <AclPermissionRole></AclPermissionRole>
            </div>
        </div>
    </div>
</template>

<script>
import { CpanelStore } from '../../store/CpanelStore';
import {defineAsyncComponent} from "vue";
import CpanelService from '../../service/CpanelService'
import {CpanelAclRoleStore} from "../../store/CpanelAclRoleStore";
export default {
    name: "ConfigAclComponent",
    components : {
        AclRole : defineAsyncComponent(() => import('./ConfigAclRoleComponent')),
        AclPermissionRole : defineAsyncComponent(() => import('./ConfigAclPermissionRoleComponent.vue')),
    },
    setup() {
        const cpanelStore = CpanelStore();
        const roleStore = CpanelAclRoleStore();
        return { cpanelStore , roleStore };
    },
    methods : {
        isActive(route){
           return CpanelService.isTabActive(route);
        }
    },
    data() {
        return { }
    },
}
</script>

<style scoped>

</style>
