<template>
    <div class="login-screen" v-if="is_active">
        <div class="login-box">
            <a href="#" class="login-logo">
                <img :src="'/img/logo-dark.png'" alt="WD Admin Dashboard" />
            </a>
            <h5>Welcome back,<br />Please Login to your Account. A</h5>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" v-model="loginForm.email" required/>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" v-model="loginForm.password"/>
            </div>
            <div class="actions mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" v-model="loginForm.rememberMe">
                    <label class="custom-control-label" for="remember_pwd">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary" @click="loginUser">Login</button>
            </div>
            <div class="forgot-pwd">
                <a class="link" @click="$emit('return-login' ,  'forgot');">Forgot password?</a>
            </div>
            <hr>
        </div>
    </div>
</template>

<script>
import  { AuthStore }  from '../store/AuthStore';
export default {
    name: "LoginComponent",
    setup(){
        const authStore = AuthStore();
        return { authStore  }
    },
    props : {
        is_active : {
            type : Boolean,
            default : false
        }
    },
    data() {
       return {
           loginForm : {
               email: '',
               password: '',
               rememberMe: false,
           }
       }
    },
    methods : {
        loginUser: function () {
            this.authStore.login(this.loginForm).then(
                (response) => {
                    if(response.user){
                        this.toast.success(response.message);
                        setTimeout(() =>  this.$router.push("/"), 500);
                    }else {
                        this.toast.error(response.message);
                    }
                },
                (error) => {
                    this.toast.error(error);
                }
            );
        },
    }
}
</script>

<style scoped>

</style>
