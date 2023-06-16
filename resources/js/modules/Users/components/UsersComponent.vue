<template>
    <div class="nav-tabs-container">
        <ul class="nav nav-tabs nav-justified" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link" :class="{ active : isActive('user-list') ?? 'active' }"
                   data-toggle="tab" href="#/user/user-list" role="tab">
                    <i class="icon-home2 block"></i>User list
                </a>
            </li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane fade" :class="{'show active' : isActive('user-list') ?? 'show active' } "
                 role="tabpanel" aria-labelledby="user-tab">
               <UserList></UserList>
            </div>

        </div>
    </div>
</template>

<script>
import SalesforceListComponent from "./SalesforceListComponent";
import UserListComponent from "./UserListComponent";
export default {
    name: "UsersComponent",
    data(){
      return {
          userTabActive : true,
          salesforceTabActive : false
      }
    },
    components: {
        SalesforceList : SalesforceListComponent,
        UserList : UserListComponent,
    },
    methods :{
        isActive(target){
            return (this.$route.meta.prettyName === target);
        }
    },
    created() {
        if(this.$route.meta.prettyName === "salesforce-list"){
            this.userTabActive = false;
            this.salesforceTabActive = true;
        }
    }
}
</script>

<style scoped>

</style>
