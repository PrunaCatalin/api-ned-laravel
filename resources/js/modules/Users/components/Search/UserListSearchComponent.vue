<template>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Filter</div>
            <div class="float-end">
                <div class="custom-btn-group">
                    <button class="btn btn-light" @click="newUser">New User</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="name" class="col-form-label">Name</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="name" class="form-control" v-model="Filter.name">
                </div>
                <div class="col-auto">
                    <label for="email" class="col-form-label">Username</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="email" class="form-control" v-model="Filter.email">
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
export default {
    name: "UserListSearchComponent",
    props : {
        platforms: Object
    },
    data() {
        return {
            Filter : {
                    name : "",
                    email : "",
                }
        }
    },
    methods: {
        resetFilter() {
            this.Filter.name = "";
            this.Filter.email = "";
            this.$emit("cb-search");
        },
        search(){
            this.$emit("cb-search" , this.Filter);
        },
        newUser(){

        }
    },
    created() {
    }
}
</script>

<style scoped>

</style>
