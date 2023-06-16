import { useToast } from 'vue-toastification';
const toast = useToast({position: "top-right"});
class AuthService {
    login(user)
    {
        return axios.post(
            'auth/login',
            user
        ).then((response) => {
            if (response.data.user) {
                localStorage.removeItem('user');
                localStorage.setItem('user', JSON.stringify(response.data.user));
                localStorage.setItem('SalesforceUser', JSON.stringify(response.data.SalesforceUser));
                localStorage.setItem('token', response.data.token.plainTextToken);
                localStorage.setItem('sidebar', JSON.stringify(response.data.sideBar));
                window.axios.defaults.headers.common['Authorization'] = "Bearer " + response.data.token.plainTextToken ?? "";
            }
            return response.data;
        });
    }
    resetPassword(data)
    {
        return axios.patch(
            'auth/reset-password',
            data
        ).then((response) => {
            return response.data;
        });
    }
    forgotPassword(data)
    {
        return axios.post(
            'auth/forgot-password',
            data
        ).then((response) => {
            return response.data;
        });
    }
    logout(router)
    {
        localStorage.removeItem('user');
        router.go("/login");
        return true;
    }
    logoutSalesforce()
    {
        localStorage.removeItem('SalesforceUser');
    }
    checkPermission(route)
    {
        return axios.post(
            'check_permission_route',
            { route : route }
        ).then((response) => {
            if (route !== "/login" || route !== "/logout") {
                return (response.data) ? response.data.havePermission : false;
            } else {
                return true;
            }
        });
    }
}
export default new AuthService()
