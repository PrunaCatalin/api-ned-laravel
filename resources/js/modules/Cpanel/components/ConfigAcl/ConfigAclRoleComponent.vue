<template>
    <WDPopupConfirmation :title="titlePopupDelete"
                         :message="messagePopupDelete"
                         :eventCBInt="eventCB"
                         :show="isDeletePopup"
                         @cb-ok="roleDelete"
                         @cb-cancel="this.isDeletePopup = false"
    ></WDPopupConfirmation>
    <ConfigAclRoleSearch :isRolePopup = "isRolePopup"
                         :role = "this.roleStore.Role"
                         @cb-search="searchData"
                         @cb-action="actionRole"
                         @cb-change-state-popup="changeStatePopup"
    />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-sm">
                    <thead >
                    <tr class="center">
                        <th>Name</th>
                        <th>Guard Name</th>
                        <th>Description</th>
                        <th class="text-right">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="role in Roles">
                        <td>{{ role.name }}</td>
                        <td>{{ role.guard_name }}</td>
                        <td>{{ role.description }}</td>
                        <td class="text-right">
                            <div class="custom-btn-group">
                                <button class="btn btn-warning btn-sm" @click="editRole(role)">Edit Role</button>
                                <button class="btn btn-info btn-sm" @click="editPermissionRole(role)">Edit permissions</button>
                                <button class="btn btn-info btn-sm" @click="cloneRole(role)">Clone</button>
                                <button class="btn btn-danger btn-sm" @click="deleteRole(role)">Delete</button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <Pagination :data="Roles" @pagination-change-page="fetchRoles" />
            </div>
        </div>
    </div>
</template>

<script>
import LaravelVuePagination from "laravel-vue-pagination";
import {CpanelAclRoleStore} from "../../store/CpanelAclRoleStore";
import ConfigAclRoleSearchComponent from "./Search/ConfigAclRoleSearchComponent"
import WDPopupConfirmation from "../../../../plugins/WDPopupConfirmation.vue";

export default {
    name: "CpanelAclRoleComponent",
    components : {
        WDPopupConfirmation,
        Pagination: LaravelVuePagination,
        ConfigAclRoleSearch : ConfigAclRoleSearchComponent
    },
    setup() {
        const roleStore = CpanelAclRoleStore();
        return { roleStore };
    },
    data() {
        return  {
            titlePopupDelete: "Delete confirmation",
            messagePopupDelete: "",
            eventCB : 0,
            isRolePopup : false,
            isDeletePopup : false,
            Roles : this.roleStore.Roles,
            Filters : this.roleStore.Filters
        }
    },
    methods :{
        //Fetch Users from DB
        fetchRoles(page = 1) {
            this.roleStore.Filters.page = page;
            this.roleStore.getAclRoles(this.roleStore.Filters).then(  response  => {
                this.Roles = response.roles.data;
            });
        },
        searchData(newData){
            this.roleStore.Filters.Role = newData;
            this.fetchRoles();
        },
        editRole(role) {
            this.roleStore.Role = role;
            this.roleStore.Role.action = "edit";
            this.isRolePopup = true;
        },
        cloneRole(role) {
            this.roleStore.Role = role;
            this.roleStore.Role.roleId = role.id;
            this.roleStore.Role.action = "clone";
            this.isRolePopup = true;
        },
        deleteRole(role) {
            this.roleStore.Role = role;
            this.eventCB = role.id;
            this.messagePopupDelete =  "Are you sure delete this item : <b>" + role.name + "</b> ?";
            this.isDeletePopup = true;
        },
        roleDelete(id) {
            this.roleStore.deleteRole().then(  response  => {
                if(response.status) {
                    this.toast.success(response.message);
                    this.isDeletePopup = false;
                    this.fetchRoles(this.roleStore.Filters.page);
                }else{
                    this.toast.error(response.message);
                }
            });
        },
        actionRole() {
            this.roleStore.actionRole().then(  response  => {
                if(response.status) {
                    this.toast.success(response.message);
                    this.isRolePopup = false;
                    this.fetchRoles(this.roleStore.Filters.page);
                }else{
                    this.toast.error(response.message);
                }
            });
        },
        editPermissionRole(role) {
            let parent = this.$route.matched[this.$route.matched.length - 1];
            this.roleStore.Role = role;
            this.$router.push(parent.path + "/permission-role/" + role.id);
        },
        changeStatePopup(options) {
            if(options.action === "add") {
                this.roleStore.Role = {
                    action: "add"
                };
            }
            this.isRolePopup = options.state;
        }
    },
    created() {
        this.fetchRoles();
    }
}
</script>

<style scoped>

</style>
