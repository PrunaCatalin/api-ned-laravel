<template>
    <div class="modal-mask" v-if="show">
        <div class="modal-wrapper">
            <div class="modal-container">
                <div class="modal-header">
                    <h5 class="modal-title">Salesforce Clone</h5>
                    <button type="button" class="btn-close" @click="hide"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="btn-danger" v-for="error in errors">{{ error }}</div>
                        <div class="mb-3">
                            <label for="firstName" class="col-form-label">First Name:</label>
                            <input type="text" class="form-control" v-model="Salesforce.firstName">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="col-form-label">Last Name:</label>
                            <input type="text" class="form-control" v-model="Salesforce.lastName">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" v-model="Salesforce.email">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  @click="hide">Cancel</button>
                    <button type="button" class="btn btn-success"  @click="clone">Clone</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SalesforceCloneComponent",
    emits :['cb-cloneSalesforce' , 'cb-hideSalesforceClone'],
    props  :{
        show : {
            type: Boolean,
            default : false,
        },
        errors : {
            type : Object,
            default : {}
        }
    },
    data(){
        return {
            Salesforce : {
                firstName : "",
                lastName : "",
                email : ""
            }
        }
    },
    methods: {
        hide() {
            this.$emit('cb-hideSalesforceClone');
        },
        clone(){
            if(this.Salesforce.email !== "" && this.Salesforce.firstName !== "" && this.Salesforce.lastName !== ""){
                this.$emit('cb-cloneSalesforce'  , this.Salesforce);
            }else{
                this.ErrorMessage = "All fields are mandatory";
            }

        }
    },

}
</script>

<style scoped>

</style>
