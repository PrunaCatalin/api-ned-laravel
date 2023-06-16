<template>
    <div>This is ConfigSidebarComponent child</div>
</template>

<script>
import { CpanelStore } from '../../store/CpanelStore';
export default {
    name: "ConfigSidebarComponent",
    components : {
    },
    setup() {
        const cpanelStore = CpanelStore();
        return { cpanelStore };
    },
    data() {
        return {}
    },
    created(){
        this.cpanelStore.Cpanel.activeSubModule = 'config-sidebar';
        console.log("##################### Sidebar  #####################");
    },
    mounted() {
        console.log("##################### Sidebar Mounted #####################");
    }
}
</script>

<style scoped>

</style>
