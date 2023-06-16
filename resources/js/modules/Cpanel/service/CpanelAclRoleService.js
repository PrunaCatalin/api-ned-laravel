class CpanelAclRoleService {
    getAclRoles(filters)
    {
        return  axios.post(
            'cpanel/acl/roles',
            filters
        ).then((response) => {
            if (response.data.status) {
                return response.data;
            }
            return {}
        });
    }
    actionRole(data)
    {
        return  axios.put(
            'cpanel/acl/action-role',
            data
        ).then((response) => {
            if (response.data.status) {
                return response.data;
            }
            return {}
        });
    }
    deleteRole(data)
    {
        return  axios.post(
            'cpanel/acl/delete-role',
            data
        ).then((response) => {
            if (response.data.status) {
                return response.data;
            }
            return {}
        });
    }
    getAclPermissionRoles(data)
    {
        return  axios.post(
            'cpanel/acl/permissions-role',
            data
        ).then((response) => {
            if (response.data.status) {
                return response.data;
            }
            return {}
        });
    }
    updatePermission(data) {
        return  axios.patch(
            'cpanel/acl/permission-update',
            data
        ).then((response) => {
            if (response.data.status) {
                return response.data;
            }
            return {}
        });
    }
    deletePermission(data) {
        return  axios.post(
            'cpanel/acl/permission-delete',
            data
        ).then((response) => {
            if (response.data.status) {
                return response.data;
            }
            return {}
        });
    }
}
export default new CpanelAclRoleService()
