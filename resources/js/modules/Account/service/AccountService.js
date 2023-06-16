import { AccountStore } from '../store/AccountStore';
class AccountService {
    userDetails()  {
        return axios.get('account/userDetails').then((response) => {
            return response;
        } ,
        (error) => {
           return error;
        });

    }
    saveUserDetails (){
        const accountStore = AccountStore();
        return axios.patch('account/saveUserDetails' , accountStore.Account).then((response) => {
                return response;
        } ,
        (error) => {
            return error;
        });
    }
}
export default new AccountService()
