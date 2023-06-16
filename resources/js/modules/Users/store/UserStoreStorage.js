import { defineStore } from 'pinia'
export const UserStoreStorage = defineStore('UserStoreStorage' ,{
    state: () => ({
    }),
    getters: {
        User : () => JSON.parse(localStorage.getItem('user')) ,
        IsSalesforceUser: () => localStorage.getItem('SalesforceUser') === "login" ,
        Token: () =>  localStorage.getItem('token') ,
        SideBar: () => JSON.parse(localStorage.getItem('sidebar')) ,
        CurrentPrettyName: () => localStorage.getItem('CurrentPrettyName') ,
        CurrentPath: () => localStorage.getItem('CurrentPath') ,
    },
    actions: {
    }
});
