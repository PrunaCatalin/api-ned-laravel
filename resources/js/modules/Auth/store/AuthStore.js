import { defineStore } from 'pinia'
import AuthService from '../service/AuthService'
export const AuthStore = defineStore('AuthStore' ,{
    state: () => ({
    }),
    actions: {
        login(user){
            return AuthService.login(user).then((response) => {
                return response;
            });
        }
    }
});
