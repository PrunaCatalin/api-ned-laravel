class SalesforceService{
    listUsers(page = 1 , filters)
    {
        return  axios.post(
            'salesforce/salesforce-list',
            filters
        ).then((response) => {
            return response.data;
        });
    }
    cloneUser(data)
    {
        return  axios.post(
            'salesforce/clone-user',
            data
        ).then((response) => {
            return response.data;
        });
    }
    syncWithApi()
    {
        return  axios.get(
            'salesforce/sync-from-salesforce'
        ).then((response) => {
            return response.data;
        });
    }
    login(data)
    {
        return  axios.post(
            'auth/salesforce-login',
            data
        ).then((response) => {
            if (response.data.success) {
                return  response.data ;
            }
            return { success : false }
        });
    }
}
export default new SalesforceService()
