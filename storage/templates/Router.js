import LayoutPage from "../../pages/LayoutPage";
const MLOWERRoutes = {
    path: '/MODULEPATH/',
    redirect : 'home',
    component: LayoutPage,
    meta: {
        requiresAuth: true,
    },
    children : [

    ]
}
export default MLOWERRoutes
