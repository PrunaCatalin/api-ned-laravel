import { createRouter, createWebHashHistory } from 'vue-router';
import CommonRoutes from "./Common/router";
import AuthService from "../services/Users/AuthService";
import NProgress from "vue-nprogress/src";
import 'nprogress/nprogress.css'
const options = {
    latencyThreshold: 200, // Number of ms before progressbar starts showing, default: 100,
    router: true, // Show progressbar when navigating routes, default: true
    http: false // Show progressbar when doing Vue.http, default: true
};
const ngprocess = new NProgress(options);

const router = createRouter({
    history: createWebHashHistory(),
    routes: CommonRoutes, // short for routes: routes
    linkActiveClass: 'active',
    scrollBehavior: (to, from ,savedPosition) => {
        if (savedPosition) {
            return savedPosition;
        }
        if (to.hash) {
            return { selector: to.hash };
        }
        return { x: 0, y: 0 };
    }
});
router.afterEach(transition => {
    ngprocess.done();
});
router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('user');
    localStorage.setItem("CurrentPrettyName",to.meta.prettyName);
    localStorage.setItem("CurrentPath",to.path);
    // trying to access a restricted page + not logged in
    // redirect to login page
    ngprocess.start();
    if (to.meta.requiresAuth && !loggedIn) {
        next('/login');
    } else {
        next();
    }
});
export default router;
