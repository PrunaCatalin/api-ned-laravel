const ImportRouter = {
    path: '/import/',
    redirect : '/',
    component: () => import('~/pages/LayoutPage'),
    meta: {
        requiresAuth: true,
    },
    children : [
        {
            path : "players",
            component :  () => import('./components/Players/PlayersComponent'),
            name : "PlayersComponent",
            meta : {
                requiresAuth: true,
                prettyName: "import-players"
            }
        },
        {
            path : "configuration",
            component :  () => import('./components/Configuration/ConfigurationComponent'),
            name : "ConfigurationComponent",
            meta : {
                requiresAuth: true,
                prettyName: "import-configuration"
            }
        }

    ]
}
export default ImportRouter
