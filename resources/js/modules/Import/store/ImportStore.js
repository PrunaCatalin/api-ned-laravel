import { defineStore } from 'pinia'
import ImportService from '../service/ImportService'
export const ImportStore = defineStore('ImportStore', {
    state: () => ({
        Import : {},
        Filters : {
            page : 1,
            max_page : 10
        }
    }),
    actions: {}
});
