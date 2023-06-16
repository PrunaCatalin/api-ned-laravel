<template>
    <UserListSearch @cb-search="searchData"/>
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
                    <tr v-for="user in Users">
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td class="text-right">
                            <div class="custom-btn-group">
                                <button class="btn btn-warning btn-sm">Edit</button>
                                <button class="btn btn-info btn-sm">Clone</button>
                                <button class="btn btn-danger btn-sm" v-if="user.platform !== 'salesforce'">Delete</button>
                                <button class="btn btn-danger btn-sm" v-if="user.platform === 'salesforce'">Safe Delete</button>
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
import UserListSearchComponent from "./Search/UserListSearchComponent";
import { UserStore } from "../store/UserStore";

export default {
    name: "UserListComponent",
    components : {
        Pagination: LaravelVuePagination,
        UserListSearch : UserListSearchComponent
    },
    setup() {
        const userStore = UserStore();
        return { userStore };
    },
    data() {
        return  {
            Users : this.userStore.Users,
            Filters : this.userStore.Filters
        }
    },
    methods :{
        //Fetch Users from DB
        fetchUsers(page = 1) {
            this.userStore.Filters.page = page;
            this.userStore.listUsers(this.userStore.Filters.page , this.userStore.Filters ).then(  response  => {
                this.Users = response;
            });
        },
        searchData(newData){
            this.userStore.Filters.User = newData;
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
