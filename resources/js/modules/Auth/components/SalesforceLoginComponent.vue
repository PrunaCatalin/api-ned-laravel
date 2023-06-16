<template>
    <div class="modal-mask" v-if="show">
        <div class="modal-wrapper">
            <div class="modal-container">
                <div class="modal-header">
                    <h5 class="modal-title">Salesforce Login</h5>
                    <button type="button" class="btn-close" @click="hide"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="btn-danger" v-if="ErrorMessage">{{ ErrorMessage }}</div>
                        <div class="mb-3">
                            <label for="username" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" id="username" v-model="Salesforce.username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="password" v-model="Salesforce.password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  @click="hide">Cancel</button>
                    <button type="button" class="btn btn-success"  @click="login">Login</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import SalesforceService from "../../Users/service/SalesforceService";

export default {
    name: "SalesforceLoginComponent",
    emits :['cb-loginSalesforce' , 'cb-hideSalesforceLogin'],
    props  :{
        show : {
            type: Boolean,
            default : false,
        }
    },
    data(){
      return {
          ErrorMessage : null,
          Salesforce : {
              username : "",
              password : ""
          }
      }
    },
    methods: {
        hide() {
            this.$emit('cb-hideSalesforceLogin');
        },
        login(){
            if(this.Salesforce.username !== "" && this.Salesforce.password !== ""){
                SalesforceService.login(this.Salesforce).then((response) => {
                    if(response.success){
                        localStorage.setItem("SalesforceUser", "login");
                        this.$emit('cb-loginSalesforce');
                    }else{
                        this.ErrorMessage = response.message;
                    }
                });
            }else{
                this.ErrorMessage = "Username and password is mandatory";
            }

        }
    },
    created() {
    }
}
</script>

<style scoped>

</style>
