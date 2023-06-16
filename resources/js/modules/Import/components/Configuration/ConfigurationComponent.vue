<template>
    <div>This is ConfigurationComponent child</div>
</template>

<script>
import { ImportStore } from '../../store/ImportStore';
export default {
    name: "ConfigurationComponent",
    components : {
    },
    setup() {
        const importStore = ImportStore();
        return { importStore };
    },
    data() {
        return {
        }
    }
}
</script>

<style scoped>

</style>
