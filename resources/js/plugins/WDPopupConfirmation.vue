<template>
    <div class="modal-mask" v-if="show">
        <div class="modal-wrapper">
            <div class="modal-container">
                <div class="modal-header">
                    <h5 class="modal-title">{{ this.title }}</h5>
                    <button type="button" class="btn-close" @click="hide"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-12">
                        <pre v-html="this.message"></pre>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  @click="cancel">Cancel</button>
                    <button type="button" class="btn btn-success" @click="ok" >OK</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "WDPopupConfirmation",
    emits :['cb-ok' , 'cb-cancel'],
    props : {
        show : {
          type : Boolean,
          default : false
        },
        title : {
            type : String,
            default : "Confirmation box"
        },
        message : {
            type : String,
            default : ""
        },
        eventCBString : {
            type : String,
            default : ""
        },
        eventCBInt : {
            type : Number,
            default : 0
        }
    },
    methods : {
        hide() {
            this.show = false;
        },
        ok() {
            this.$emit("cb-ok" , this.eventCB);
        },
        cancel() {
            this.$emit("cb-cancel" , this.eventCB);
        }
    }
}
</script>

<style scoped>

</style>
