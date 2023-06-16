<template>
    <ProfileComponent/>
</template>

<script>
import ProfileComponent from './Profile/ProfileComponent';
import { AccountStore } from '../store/AccountStore';
export default {
    name: "AccountComponent",
    components : {
        ProfileComponent
    },
    setup() {
        const accountStore = AccountStore();
        return { accountStore };
    },
    data() {
        return {
           Account : this.accountStore.Account
        }
    }
}
</script>

<style scoped>

</style>
