<template>
    <div class="modal-mask" v-if="show">
        <div class="modal-wrapper">
            <div class="modal-container">
                <div class="modal-header">
                    <h5 class="modal-title">Permission Role - {{  this.roleStore.Role.Permission.name  }}</h5>
                    <button type="button" class="btn-close" @click="hide"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="lastName" class="col-form-label">Permission Description:</label>
                            <input type="text" class="form-control" v-model="FormPermission.permission_description">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  @click="hide">Cancel</button>
                    <button type="button" class="btn btn-success"  @click="action">Edit</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {CpanelAclRoleStore} from "../../../store/CpanelAclRoleStore";

export default {
    name: "ConfigAclPermissionRoleStorePopup",
    emits :['cb-actionPermission' , 'cb-hidePermission'],
    props  :{

        show : {
            type: Boolean,
            default : false,
        }
    },
    setup() {
        const roleStore = CpanelAclRoleStore();
        return { roleStore };
    },
    data(){
        return {
            FormPermission: {},
        }
    },
    watch : {
        show(oldValue, newValue) {
            if(oldValue !== newValue) {
                this.FormPermission.permission_description = this.roleStore.Role.Permission.description;
            }
        }
    },
    methods: {
        hide() {
            this.$emit('cb-hidePermission');
        },
        action(){
            this.roleStore.Role.Permission.description = this.FormPermission.permission_description;
            this.$emit('cb-actionPermission');
        },
    },
}
</script>

<style scoped>

</style>
