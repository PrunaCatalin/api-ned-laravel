<template>
    <WDPopupConfirmation :title="titlePopupDelete"
                         :message="messagePopupDelete"
                         :eventCBInt="eventCB"
                         :show="isDeletePopup"
                         @cb-ok="permissionDelete"
                         @cb-cancel="this.isDeletePopup = false"
    ></WDPopupConfirmation>
    <AclPermissionPopup :show="isPermissionPopup"
                        @cb-actionPermission="actionPermission"
                        @cb-hidePermission="hidePermissionPopup"
    />

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-sm">
                    <thead >
                    <tr class="center">
                        <th><input type="checkbox" @change="toggleCheckboxes"> # All </th>
                        <th>Name</th>
                        <th>Guard Name</th>
                        <th>Description</th>
                        <th class="text-right">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="permission in Permissions.data">
                        <td><input type="checkbox" v-model="permission.checked" ></td>
                        <td>{{ permission.name }}</td>
                        <td>{{ permission.guard_name }}</td>
                        <td>{{ permission.description }}</td>
                        <td class="text-right">
                            <div class="custom-btn-group">
                                <button class="btn btn-info btn-sm" @click="editPermissionRole(permission)">Edit permission</button>
                                <button class="btn btn-danger btn-sm" @click="deletePermissionRole(permission)">Delete permission</button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <Pagination :data="Permissions" @pagination-change-page="fetchPermission" />
            </div>
        </div>
    </div>
</template>

<script>
import {CpanelAclRoleStore} from "../../store/CpanelAclRoleStore";
import ConfigAclPermissionRoleStorePopup from "./Popups/ConfigAclPermissionRoleStorePopup.vue";
import ConfigRolePopup from "./Popups/ConfigAclRoleStorePopup.vue";
import LaravelVuePagination from "laravel-vue-pagination";
import WDPopupConfirmation from "../../../../plugins/WDPopupConfirmation.vue";

export default {
    name: "ConfigAclPermissionRoleComponent",
    components: {
        WDPopupConfirmation,
        ConfigRolePopup, AclPermissionPopup : ConfigAclPermissionRoleStorePopup,
        Pagination: LaravelVuePagination,
    },
    props : ['id'],
    setup() {
        const roleStore = CpanelAclRoleStore();
        return { roleStore };
    },
    data() {
       return {
           titlePopupDelete : "",
           messagePopupDelete : "",
           eventCB : 0,
           allRowsSelected: false,
           isDeletePopup : false,
           isPermissionPopup : false,
           RoleTitle : "",
           Permissions: {}
       }
    },
    methods : {
        fetchPermission(page = 1, roleId) {
            this.roleStore.Filters.Role.id = roleId;
            this.roleStore.Filters.page = page;
            this.roleStore.getAclPermissionRoles(this.roleStore.Filters).then(  response  => {
                this.Permissions = response.permissions;
                this.roleStore.Role = response.role;
            });
        },
        editPermissionRole(permission) {
            this.roleStore.Role.Permission = permission;
            this.isPermissionPopup = true;
        },
        deletePermissionRole(permission) {
            this.roleStore.Role.Permission = permission;
            this.eventCB = permission.id;
            this.messagePopupDelete =  "Are you sure delete this item : <b>" + permission.name + "</b> ?";
            this.isDeletePopup = true;
        },
        hidePermissionPopup() {
            this.isPermissionPopup = false;
        },
        permissionDelete(id) {
            this.roleStore.deletePermission().then(  response  => {
                if(response.status) {
                    this.toast.success(response.message);
                    this.isDeletePopup = false;
                    this.fetchPermission(this.roleStore.Filters.page);
                }else{
                    this.toast.error(response.message);
                }
            });
        },
        actionPermission(data) {
            this.roleStore.updateAclPermission(this.roleStore.Role).then(  response  => {
                this.isPermissionPopup = false;
                this.toast.success(response.message);
                this.fetchPermission(this.roleStore.Filters.page , this.roleStore.Filters.Role.id);
            });
        },
        toggleCheckboxes() {
            this.masterCheckbox = !this.masterCheckbox;
            this.Permissions = this.Permissions.map((permission) => {
                return { ...permission, checked: this.masterCheckbox };
            });
        },
    },
    watch: {
        $route() {
            this.fetchPermission(1, this.id);
        }
    },
    created() {
        if(this.$route.params.id !== undefined) {
            const id = this.$route.params.id;
            this.fetchPermission(1, id);
        }
    }

}
</script>

<style scoped>

</style>
