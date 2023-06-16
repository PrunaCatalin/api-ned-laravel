<template>
    <div class="authentication">
        <div class="container">
            <form @submit.prevent="onSubmit">
                <div class="row justify-content-md-center">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                        <ForgotComponent :is_active="is_forgot" @return-login="onCallBackChildren"/>
                        <ResetComponent :is_active="is_reset" :hash="hash"
                                        @return-login="onCallBackChildren"/>
                        <LoginComponent :is_active="is_login" @return-login="onCallBackChildren" :notification="notification"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import LoginComponent from "../modules/Auth/components/LoginComponent";
    import ResetComponent from "../modules/Auth/components/ResetComponent";
    import ForgotComponent from "../modules/Auth/components/ForgotComponent";
    export default {
        name : 'LoginPage',
        components: { LoginComponent , ResetComponent , ForgotComponent },
        data() {
            return {
                is_login : false,
                is_reset : false,
                is_forgot : false,
                hash : "",
                notification : this.toast
            }
        },
        methods: {
            onSubmit() {
                // this will be called only after form is valid. You can do api call here to login
            },
            onCallBackChildren: function (backForm){
                if(backForm === "login"){
                    this.is_login = true;
                    this.is_reset = false;
                    this.is_forgot = false;
                    this.$router.push("/login");
                }
                if(backForm === "reset") {
                    this.is_reset = true;
                    this.is_login = false;
                    this.hash = this.$route.params.hash;
                    this.$router.push("/reset-password");
                }
                if(backForm === "forgot"){
                    this.is_forgot = true;
                    this.is_login = false;
                    this.is_reset = false;
                    this.$router.push("/forgot-password");
                }
            },
        },
        created() {
            //check if reset password
            if(this.$route.meta.prettyName === "reset-password"){
                if(this.$route.params.hash !== "undefined"){
                    this.is_reset = true;
                    this.hash = this.$route.params.hash;
                }
            }
            else if(this.$route.meta.prettyName === "forgot-password"){
                this.is_forgot = true;
                this.is_login = false;
                this.is_reset = false;
            }
            else{
                this.is_login = true;
                this.is_reset = false;
                this.is_forgot = false;
            }
        },
    }
</script>
