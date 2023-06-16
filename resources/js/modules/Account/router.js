const AccountRouter = {
    path: '/account/',
    redirect : '/',
    component: () => import('~/pages/LayoutPage'),
    meta: {
        requiresAuth: true,
    },
    children : [
        {
            path : "profile",
            component :  () => import('./components/AccountComponent'),
            name : "AccountComponent",
            meta : {
                requiresAuth: true,
                prettyName: "Account-Account"
            },
        }

    ]
}
export default AccountRouter
