<template>
    <ConfigSidebar v-if="activeSubModule === 'config-sidebar'"/>
	<ConfigAcl v-if="activeSubModule === 'config-acl'"/>
</template>

<script>
import { defineAsyncComponent } from 'vue'
import { CpanelStore } from '../store/CpanelStore';
export default {
    name: "CpanelComponent",
    components : {
        ConfigSidebar : defineAsyncComponent(() => import('./ConfigSidebar/ConfigSidebarComponent')),
        ConfigAcl : defineAsyncComponent(() => import('./ConfigAcl/ConfigAclComponent'))
    },
    setup() {
        const cpanelStore = CpanelStore();

        return {
            cpanelStore
        };
    },
    data() {
        return {
            activeSubModule: this.$route.meta.prettyName,
            Filters : this.cpanelStore.Filters,
        }
    },


}
</script>

<style scoped>

</style>
