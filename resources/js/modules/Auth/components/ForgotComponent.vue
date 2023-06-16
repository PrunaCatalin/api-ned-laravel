<template>
    <div class="login-screen" v-if="is_active">
        <div class="login-box">
            <a href="#" class="login-logo">
                <img :src="'/img/logo-dark.png'" alt="WD Admin Dashboard" />
            </a>
            <h5>Welcome ,<br /> Enter your email to reset your password.</h5>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" v-model="forgot.email"/>
            </div>
            <div class="actions mb-4">
                <button type="submit" class="btn btn-primary" @click="$emit('return-login' ,  'login');">Back to login</button>
                <button type="submit" class="btn btn-primary" @click="reset">Reset</button>
            </div>
            <hr>
        </div>
    </div>
</template>

<script>
import AuthService from "../../../services/Users/AuthService";

export default {
    name: "ForgotComponent",
    props : {
        is_active : {
            type : Boolean,
            default : false
        }
    },
    data() {
        return {
            forgot : {
                email : "",
            }
        }
    },
    methods : {
        reset(){
            AuthService.forgotPassword(this.forgot).then(
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
}
</script>

<style scoped>

</style>
