import router  from "./router";
import usersModule from './modules/Users';
import cpanelModule from './modules/Cpanel';
import importModule from './modules/Import';
import accountModule from './modules/Account';
const registerModule = (module) => {
    if (module.router) {
        router.addRoute(module.router);
    }
};
registerModule( usersModule );
registerModule( cpanelModule );
registerModule( importModule );
registerModule( accountModule );
export const registerModules = modules => {
    Object.keys(modules).forEach(moduleKey => {
        const module = modules[moduleKey];
        registerModule(moduleKey, module);
    });
};
