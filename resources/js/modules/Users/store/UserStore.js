import { defineStore } from 'pinia'
import UserService from '../service/UserService'
export const UserStore = defineStore('UserStore' ,{
    state: () => ({
        Users : {},
        Filters : {
            page : 1,
            max_page : 10,
            User : {
                name : "",
                email : "",
            }
        }
    }),
    actions: {
        listUsers(page = 1 , filters){
            return UserService.listUsers(page , filters).then((response) => {
                return response;
            });
        },

    }
});
