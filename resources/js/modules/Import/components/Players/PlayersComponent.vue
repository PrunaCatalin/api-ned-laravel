<template>
    <div>This is PlayersComponent child</div>
</template>

<script>
import { ImportStore } from '../../store/ImportStore';
export default {
    name: "PlayersComponent",
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
