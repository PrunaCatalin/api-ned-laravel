<template>
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="img/user.png" alt="Wafi Admin">
                            </div>
                            <h5 class="user-name">{{ accountStore.Account.name }}</h5>
                            <h6 class="user-email">{{ accountStore.Account.email }}</h6>
                        </div>
                        <div class="setting-links">
                            <a>
                                <i class="icon-info"></i>
                                Creation date : {{ accountStore.Account.created_at }}
                            </a>
                            <a>
                                <i class="icon-info"></i>
                                Last update : {{ accountStore.Account.updated_at }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="card-title">Update Profile</div>
                </div>
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text"  class="form-control" id="fullName"
                                       placeholder="Full Name"  v-model="accountStore.Account.name">
                            </div>
                            <div class="form-group">
                                <label for="eMail">Email</label>
                                <input type="email" class="form-control" id="eMail"
                                       placeholder="Enter email ID" v-model="accountStore.Account.email" disabled>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" placeholder="Enter phone number"
                                       v-model="accountStore.Account.user_details.phone">
                            </div>
                            <div class="form-group">
                                <label for="old_password">Old Password</label>
                                <input type="password" class="form-control" id="old_password" autocomplete="new-password"
                                       v-model="accountStore.Account.old_password">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Enter Address"
                                       v-model="accountStore.Account.user_details.address">
                            </div>
                            <div class="form-group">
                                <label for="ciTy">Date of birth</label>
                                <input type="date" class="form-control" v-model="accountStore.Account.user_details.date_of_birth"/>
                            </div>
                            <div class="form-inline">
                                <label for="gender">Gender</label>
                                <select class="form-select form-select-sm" id="gender" v-model="accountStore.Account.user_details.gender">
                                    <option value="0"> M </option>
                                    <option value="1"> F </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" id="new_password" autocomplete="new-password"
                                       v-model="accountStore.Account.new_password">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <button type="button" class="btn btn-success" @click="saveUserDetails">Save Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { AccountStore } from '../../store/AccountStore';
import { UserStoreStorage } from '../../../Users/store/UserStoreStorage';
export default {
    name: "ProfileComponent",
    components : {
    },
    setup() {
        const accountStore = AccountStore();
        const userStoreStorage = UserStoreStorage();
        return { accountStore };
    },
    data() {
        return { }
    },
    methods :{
        userDetails: function () {
            this.accountStore.userDetails().then(
                (response) => {
                    if(response !== undefined && response.data.success){
                        response.data.details.created_at = this.moment(
                            response.data.details.created_at
                        ).format('MM/DD/YYYY hh:mm');
                        response.data.details.updated_at = this.moment(
                            response.data.details.updated_at
                        ).format('MM/DD/YYYY hh:mm');
                        response.data.details.user_details.date_of_birth = this.moment(
                            response.data.details.user_details.date_of_birth
                        ).format('YYYY-MM-DD');
                        this.accountStore.Account = response.data.details;
                    }else {
                        this.toast.warning("API - undefined");
                    }
                },
                (error) => {
                    this.toast.error(error);
                }
            );
        },
        saveUserDetails : function (){
            this.accountStore.saveUserDetails().then(
                (response) => {
                    if(response !== undefined && response.data !== undefined){
                        this.toast.success(response.data.message);
                    }else {
                        // this.toast.warning(response.data.message);
                    }
                },
                (error) => {
                    this.toast.error(error);
                }
            );
        },
    },
    created(){
        this.userDetails();
    }

}
</script>

<style scoped>

</style>
