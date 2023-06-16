<template>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Filter</div>
            <div class="float-end">
                <div class="custom-btn-group">
                    <button class="btn btn-light" @click="syncFromSalesforce">Sync from Salesforce</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <loading v-model:active="isLoading" :can-cancel="false" :is-full-page="fullPage"/>
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
import AuthService from "../../../../services/Users/AuthService";
import SalesforceService from "../../service/SalesforceService";
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
export default {
    name: "SalesforceListSearchComponent",
    components : {
        Loading
    },
    emits: ["cb-search"],
    props : {
        platforms: Object
    },
    data() {
        return {
            isLoading: false,
            fullPage: true,
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
        syncFromSalesforce(){
            if(AuthService.isSalesforceUser()){
                this.isLoading = true;
                SalesforceService.syncWithApi().then((response) => {
                    this.$emit("cb-search" , {});
                     this.toast.info(response.message);
                    this.isLoading = false;
                });
            }else{
                 this.toast.error("You need to login on salesforce API");
            }
        }
    },
    created() {

    }
}
</script>

<style scoped>

</style>
