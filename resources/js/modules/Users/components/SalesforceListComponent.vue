<template>
    <SalesforceSearch @cb-search="searchData"/>
    <SalesforceClone :show="isClonePopup"
                     :errors="Errors"
                     @cb-cloneSalesforce="cloneUser"
                     @cb-hideSalesforceClone="hideCloneUserPopup"
    />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-sm">
                    <thead >
                    <tr class="center">
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th class="text-right">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="user in Users.data">
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td class="text-right">
                            <div class="custom-btn-group" v-if="AuthService.isSalesforceUser()">
                                <button class="btn btn-warning btn-sm">Edit</button>
                                <button class="btn btn-info btn-sm" @click="cloneUserPopup(user.profile_id)">Clone</button>
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <Pagination :data="Users" @pagination-change-page="fetchUsers" />
            </div>
        </div>
    </div>
</template>

<script>
import LaravelVuePagination from 'laravel-vue-pagination';
import SalesforceService from "../service/SalesforceService";
import SalesforceListSearchComponent from "./Search/SalesforceListSearchComponent";
import SalesforceCloneComponent from "./Popups/SalesforceCloneComponent";
import AuthService from "../../../services/Users/AuthService";
export default {
    name: "SalesforceListComponent",
    data() {
        return {
            AuthService : AuthService,
            Users : {},
            CloneId : "",
            Errors : {},
            Filters : {
                page : 1,
                max_page : 10
            },
            isClonePopup : false
        }
    },
    components : {
        SalesforceSearch : SalesforceListSearchComponent,
        Pagination : LaravelVuePagination,
        SalesforceClone : SalesforceCloneComponent
    },
    methods : {
        fetchUsers(page = 1) {
            this.Filters.page = page;
            SalesforceService.listUsers(this.Filters.page , this.Filters ).then(  response  => {
                if(response.success){
                    this.Users = response.Users;
                }else{
                     this.toast.error(response.message);
                }
            });
        },
        cloneUserPopup(idUser) {
            this.CloneId = idUser;
            this.isClonePopup = true;
        },
        hideCloneUserPopup() {
            this.CloneId = "";
            this.isClonePopup = false;
        },
        cloneUser(cloneData) {
            cloneData.idUser = this.CloneId;
            SalesforceService.cloneUser(cloneData).then((response) => {
                if(response.success){
                    this.CloneId = "";
                    this.isClonePopup = false;
                }else{
                    this.Errors = Object.values(response.errors);
                }
            });
        },
        searchData(newData) {
            this.Filters.User = newData;
            this.fetchUsers();
        }
    },
    created() {
        this.fetchUsers();
    }
}
</script>

<style scoped>

</style>
