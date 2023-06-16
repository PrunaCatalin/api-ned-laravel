import { defineStore } from 'pinia'
import CpanelAclRoleService from '../service/CpanelAclRoleService'
export const CpanelAclRoleStore = defineStore({
    id: 'CpanelAclRoleStore',
    state: () => ({
        Roles : { },
        Role : {},
        Filters : {
            page : 1,
            max_page : 10,
            Role : {
                name : "",
                description : "",
            },
            Permission : {}
        }
    }),
    actions: {
        getAclRoles(filters){
            return CpanelAclRoleService.getAclRoles(filters).then((response) => {
                return response;
            });
        },
        getAclPermissionRoles(filters) {
            return CpanelAclRoleService.getAclPermissionRoles(filters).then((response) => {
                return response;
            });
        },
        actionRole() {
            return CpanelAclRoleService.actionRole({ Role : this.Role } ).then((response) => {
                return response;
            });
        },
        deleteRole() {
            return CpanelAclRoleService.deleteRole({ Role : this.Role } ).then((response) => {
                return response;
            });
        },
        updateAclPermission() {
            return CpanelAclRoleService.updatePermission({ Role : this.Role } ).then((response) => {
                return response;
            });
        },
        deletePermission() {
            return CpanelAclRoleService.deletePermission({ Role : this.Role } ).then((response) => {
                return response;
            });
        }
    }
});
