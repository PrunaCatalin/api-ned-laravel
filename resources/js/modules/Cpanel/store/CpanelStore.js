import { defineStore } from 'pinia'
import CpanelService from '../service/CpanelService'
export const CpanelStore = defineStore({
    id: 'CpanelStore',
    state: () => ({
        Cpanel : { },
        Filters : {
            page : 1,
            max_page : 10
        }
    }),
    actions: {
    }
});
