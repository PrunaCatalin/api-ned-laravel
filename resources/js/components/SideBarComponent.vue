<template>
        <!-- Navigation start -->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#WafiAdminNavbar" aria-controls="WafiAdminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
        </button>
        <div class="collapse navbar-collapse" id="WafiAdminNavbar">
            <ul class="navbar-nav">
                <li class="nav-item dropdown"  v-for="(value, name , index) in menuLinks">
                    <router-link :to="value.href !== '/' ? '#' : '/home'" class="nav-link sub-nav-link"
                                 :class="IsActive(value.href) ? 'active-page' : ''" >
                        <i class="icon-devices_other nav-icon"></i>
                        {{ value.name }}
                    </router-link>
                    <ul class="dropdown-menu">
                        <li  v-for="(child , index) in value['childs']">
                            <router-link :to="value.href + child.href" class="dropdown-item" :class="subIsActive(child.href, value.name) ? 'active-page' : ''">
                                {{ child.name }}
                            </router-link>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
import { UserStoreStorage } from '../modules/Users/store/UserStoreStorage';
export default {
    name: "SideBarComponent",
    setup(){
        const userStoreStorage = UserStoreStorage();
        return { userStoreStorage }
    },
    data() {
      return {
          activeLink : "",
          activeChild : "",
          menuLinks : this.userStoreStorage.SideBar,
          isChildActive : false,
      }
    },
    mounted() {
        this.activeLink = "/" + this.$route.path;
    },
    methods : {
        subIsActive(path , parent) {
            this.isChildActive =  (this.$route.path === path);
            return this.isChildActive;
        },
        // for main routes
        IsActive(path) {
            return this.$route.path.startsWith(path);
        },
    }
}
</script>

<style scoped>

</style>
