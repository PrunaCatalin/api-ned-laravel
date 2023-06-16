<template>
    <div class="login-screen" v-if="is_active">
        <div class="login-box">
            <a href="#" class="login-logo">
                <img :src="'/img/logo-dark.png'" alt="WD Admin Dashboard" />
            </a>
            <h5>Welcome back,<br />Reset your password.</h5>
            <div class="form-group">
                <input type="hidden" v-model="reset.hash"/>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" v-model="reset.password"/>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Retype Password" v-model="reset.password_confirmation"/>
            </div>
            <div class="actions mb-4">
                <button type="submit" class="btn btn-primary" @click="resetPassword">Reset</button>
            </div>
            <div class="forgot-pwd">
                <a class="link" @click="$emit('return-login' ,  'login');">Login</a>
            </div>
            <hr>
        </div>
    </div>
</template>

<script>
import AuthService from "../../../services/Users/AuthService";

export default {
    name: "ResetComponent",
    props : {
        is_active : {
            type : Boolean,
            default : false
        },
        hash :{
            type : String,
            default : ""
        }
    },
    data() {
        return {
            reset : {
                hash : "",
                password : "",
                password_confirmation : "",
            }
        }
    },
    methods : {
        resetPassword: function (){
            AuthService.resetPassword(this.reset).then(
                (response) => {
                    if(response.success === true){
                         this.toast.success(response.message);
                        setTimeout(() =>  this.$router.push("/login"), 500);
                    }else {
                         this.toast.error(response.message);
                    }
                },
                (error) => {
                     this.toast.error(error);
                }
            );
        }
    },
    created() {
        this.reset.hash = this.hash;
    }
}
</script>

<style scoped>

</style>
