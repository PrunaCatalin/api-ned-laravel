class AuthService {
    login(user)
    {
        return axios.post(
            'auth/login',
            user
        ).then((response) => {
            if (response.data.user) {
                localStorage.setItem('user', JSON.stringify(response.data.user));
                localStorage.setItem('SalesforceUser', JSON.stringify(response.data.SalesforceUser));
                localStorage.setItem('token', response.data.user.token);
                localStorage.setItem('sidebar', JSON.stringify(response.data.sideBar));
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
    token()
    {
        return  localStorage.getItem('token');
    }
    checkPermission(route)
    {
        return axios.post(
            'check_permission_route',
            { route : route }
        ).then((response) => {
            if (route !== "/login" || route !== "/logout") {
                return response.data.havePermission;
            } else {
                return true;
            }
            });
    }
    user()
    {
        return  localStorage.getItem('user');
    }
    isSalesforceUser()
    {
        return localStorage.getItem('SalesforceUser') === "login";
    }
}
export default new AuthService()
