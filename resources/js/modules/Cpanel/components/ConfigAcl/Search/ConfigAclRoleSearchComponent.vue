<template>
    <ConfigRolePopup :show="isRolePopup"
                     :errors="Errors"
                     @cb-actionRole="actionRole"
                     @cb-hideRole="hideRolePopup"/>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Filter</div>
            <div class="float-end">
                <div class="custom-btn-group">
                    <button class="btn btn-light" @click="newRole">New Role</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="role_name" class="col-form-label">Name</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="role_name" class="form-control" v-model="Filter.name">
                </div>
                <div class="col-auto">
                    <label for="description" class="col-form-label">Description</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="description" class="form-control" v-model="Filter.description">
                </div>
                <div class="col-auto">
                    <div class="custom-btn-group">
                        <button class="btn btn-info" @click="search">Search</button>
                        <button class="btn btn-danger" @click="resetFilter">Clear</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import ConfigAclRoleStorePopup from "../Popups/ConfigAclRoleStorePopup.vue";

export default {
    name: "ConfigAclRoleSearchComponent",
    emits :['cb-search' , 'cb-action', 'cb-change-state-popup'],
    components: {
        ConfigRolePopup: ConfigAclRoleStorePopup
    },
    props : {
        isRolePopup: {
            type : Boolean,
            default : false
        },
        role : {
            type : Object,
            default : {}
        }
    },
    data() {
        return {
            isRolePopupAdd : false,
            roleCurrentAction : "add",
            Errors : {},
            Filter : {
                name : "",
                description : "",
            }
        }
    },
    methods: {
        resetFilter() {
            this.Filter.name = "";
            this.Filter.description = "";
            this.$emit("cb-search", this.Filter);
        },
        search() {
            this.$emit("cb-search" , this.Filter);
        },
        newRole() {
            this.$emit("cb-change-state-popup", {state: true, action : "add"});
        },
        hideRolePopup() {
            this.$emit("cb-change-state-popup", {state: false, action : "hide"});
        },
        actionRole(data) {
            this.$emit("cb-action", data);
        }
    },
    created() {

    }
}
</script>

<style scoped>

</style>
