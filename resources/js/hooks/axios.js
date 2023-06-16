// Add a response interceptor
import axios from 'axios'
import router  from "../router";
import { useToast } from 'vue-toastification';
const toast = useToast({position: "top-right"});
export default () =>  {
    const instance = axios;

    instance.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    instance.defaults.baseURL  = '/api/v1/administration/';
    instance.defaults.headers.common['WD-Guard'] = 'WD-Guard-Agent';
    instance.interceptors.request.use((config) => {
        config.headers.common['Authorization'] = "Bearer " + localStorage.getItem('token') ?? "";
        return config;
    }, error => {
        return Promise.reject(error);
    });
    instance.interceptors.response.use(function (response) {
        return response;
    }, function (error) {
        if (error.response.status === 403) {
            toast.warning(error.response.data.message);
        }
        if(error.response.status !== 401) {
            let listOfObjects = Object.keys(error.response.data.errors).map((key) => {
                return error.response.data.errors[key];
            });
            listOfObjects.forEach((value , index) => {
                toast.warning(value[index]);
            });
        }
        if (error.response.status === 401) {
            toast.error("Permission denied , you will be redirect to login");
            setTimeout(
                function () {
                    router.push({path: "/login"});
                }.bind(this),
                4000
            );
        }
        return Promise.reject(error);
    });
    return instance;
}




