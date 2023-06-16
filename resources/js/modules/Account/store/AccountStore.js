import { defineStore } from 'pinia'
import AccountService from '../service/AccountService'
import AuthService from "../../Auth/service/AuthService";
export const AccountStore = defineStore('AccountStore', {
    state: () => ({
        Account : {
            user_details : { }
        }
    }),
    actions: {
        userDetails(account){
            return AccountService.userDetails().then((response) => {
                return response;
            } , (error) => {
                return error;
            });
        },
        saveUserDetails(){
            return AccountService.saveUserDetails().then((response) => {
                return response;
            } , (error) => {
                return error;
            });
        },
    }
});
