<template>
    <div class="modal-mask" v-if="show">
        <div class="modal-wrapper">
            <div class="modal-container">
                <div class="modal-header">
                    <h5 class="modal-title">Role {{
                            this.roleStore.Role.action === 'edit' ? 'Edit - ' + this.roleStore.Role.name  :
                                this.roleStore.Role.action === 'clone' ? 'Clone - ' + this.roleStore.Role.name  : 'Add'
                        }}</h5>
                    <button type="button" class="btn-close" @click="hide"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="btn-danger" v-for="error in errors">{{ error }}</div>
                        <div class="mb-3">
                            <label for="firstName" class="col-form-label">Role Name:</label>
                            <input type="text" class="form-control" v-model="FormRole.role_name">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="col-form-label">Role Description:</label>
                            <input type="text" class="form-control" v-model="FormRole.role_description">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  @click="hide">Cancel</button>
                    <button type="button" class="btn btn-success"  @click="action" v-if="this.roleStore.Role.action === 'edit'">Edit</button>
                    <button type="button" class="btn btn-success"  @click="action" v-else-if="this.roleStore.Role.action === 'clone'">Clone</button>
                    <button type="button" class="btn btn-success"  @click="action" v-else>Add</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {CpanelAclRoleStore} from "../../../store/CpanelAclRoleStore";

export default {
    name: "ConfigAclRoleStorePopup",
    emits :['cb-actionRole' , 'cb-hideRole'],
    props  :{

        show : {
            type: Boolean,
            default : false,
        },
        errors : {
            type : Object,
            default : {}
        }
    },
    setup() {
        const roleStore = CpanelAclRoleStore();
        return { roleStore };
    },
    data(){
        return {
            FormRole: {},
        }
    },
    watch : {
      show(oldValue, newValue) {
          if(oldValue !== newValue) {
              if(oldValue && this.roleStore.Role.action !== "clone") {
                  this.FormRole.role_name = this.roleStore.Role.name;
                  this.FormRole.role_description = this.roleStore.Role.description;
              }else if(this.roleStore.Role.action === "clone") {
                  this.FormRole.role_name = "";
                  this.FormRole.role_description = "";
              }
          }
      }
    },
    methods: {
        hide() {
            this.$emit('cb-hideRole');
        },
        action(){
            if(this.FormRole.role_name !== ""){
                this.roleStore.Role.name = this.FormRole.role_name;
                this.roleStore.Role.description = this.FormRole.role_description;
                this.$emit('cb-actionRole');
            }else{
                this.toast.error("Role name is mandatory");
            }

        },
    },
    created() {

    }
}
</script>

<style scoped>

</style>
