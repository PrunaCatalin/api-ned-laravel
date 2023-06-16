import LoginPage from "../../pages/LoginPage";
import LayoutPage from "../../pages/LayoutPage";
import DashboardComponent from "../../components/DashboardComponent";

const CommonRoutes = [
    {
        path: '/login',
        component: LoginPage,
        meta: {
            requiresAuth: false,
            prettyName: "login"
        }
    },
    {
        path: '/reset-password/:hash',
        component: LoginPage,
        meta: {
            requiresAuth: false,
            prettyName : "reset-password"
        }
    },
    {
        path: '/forgot-password',
        component: LoginPage,
        meta: {
            requiresAuth: false,
            prettyName : "forgot-password"
        }
    },
    {
        path: '/logout',
        component: LoginPage,
        meta: {
            requiresAuth: false,
        }
    },
    {
        path: '/',
        component: LayoutPage,
        redirect : 'home',
        meta: {
            requiresAuth: true,
        },
        children : [
            {
                path : "home",
                component :  DashboardComponent,
                name : "Dashboard",
                meta : {
                    requiresAuth : true
                },
            }
        ]
    },
]
export default CommonRoutes
