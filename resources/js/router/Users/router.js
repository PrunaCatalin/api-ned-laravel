import UsersComponent from "../../modules/Users/components/UsersComponent";
import CreateUserComponent from "../../modules/Users/components/Actions/CreateUserComponent";
import LayoutPage from "../../pages/LayoutPage";


const UsersRoutes = [
    {
        path: '/user/',
        redirect : 'home',
        component: LayoutPage,
        meta: {
            requiresAuth: true,
        },
        children : [
            {
                path : "user-list",
                component :  UsersComponent,
                name : "User list",
                meta : {
                    requiresAuth: true,
                    prettyName: "user-list"

                },
            },
            {
                path : "new-user",
                component :  CreateUserComponent,
                name : "New user",
                meta : {
                    requiresAuth: true,
                    specialPermission: true,
                    prettyName: "new-user"

                },
            },
            {
                path : "salesforce-list",
                component :  UsersComponent,
                name : "Salesforce list",
                meta : {
                    requiresAuth: true,
                    prettyName: "salesforce-list"
                }
            }
        ]
    },
];

export default UsersRoutes
