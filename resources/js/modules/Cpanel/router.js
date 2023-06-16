const CpanelRouter = {
    path: '/cpanel/',
    component: () => import('~/pages/LayoutPage'),
    meta: {
        requiresAuth: true,
    },
    children : [
        {
            path : "config-acl",
            component :  () => import('./components/ConfigAcl/ConfigAclComponent'),
            name : "CpanelAclComponent",
            meta : {
                requiresAuth: true,
                prettyName: "config-acl-role"
            },
            children : [
                {
                    path : "role",
                    component :  () => import('./components/ConfigAcl/ConfigAclRoleComponent'),
                    name : "ConfigAclRoleComponent",
                    meta : {
                        requiresAuth: true,
                        prettyName: "config-acl-role"
                    },
                },
                {
                    path : "permission-role/:id",
                    name : "ConfigAclPermissionRoleComponent",
                    component: () => import('./components/ConfigAcl/ConfigAclPermissionRoleComponent'),
                    meta : {
                        requiresAuth: true,
                        prettyName: "config-acl-permission-role"
                    },
                    props : true
                },

            ]
        },

        {
            path : "config-sidebar",
            component :  () => import('./components/CpanelComponent'),
            name : "CpanelSideBarComponent",
            meta : {
                requiresAuth: true,
                prettyName: "config-sidebar"
            },
        }

    ]
}
export default CpanelRouter
