class UserService {
    listUsers(page = 1 , filters)
    {
        return  axios.post(
            'user/user-list',
            filters
        ).then((response) => {
            if (response.data.status) {
                return response.data.Users.data;
            }
            return {}
        });
    }
}
export default new UserService()
