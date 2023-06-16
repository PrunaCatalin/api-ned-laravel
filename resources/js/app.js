/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

import { createApp , markRaw , createSSRApp } from "vue";
import { createPinia } from 'pinia';
import router  from "./router";
import { createRouter, createWebHashHistory } from 'vue-router';
import moment from 'moment'
import { registerModules }from './register-modules';
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import App from './App.vue';
import {useToast} from "vue-toastification";
const toast = useToast({position: "top-right"});
import  axios from './hooks/axios';


const pinia = createPinia();

pinia.use(({ store }) => {
    store.$router = router
});
const app = createApp(App);
app.use(pinia);
//init modules
registerModules({});
app.config.globalProperties.toast = toast;
app.config.globalProperties.moment = moment;
app.use(router);

app.use(axios);
//onready
router.isReady().then(() => {
    app.mount('#app');
});
// streamData()

