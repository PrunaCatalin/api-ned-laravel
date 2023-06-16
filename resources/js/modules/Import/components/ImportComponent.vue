<template>
    <PlayersComponent/>
	<ConfigurationComponent/>
</template>

<script>
import PlayersComponent from './Players/PlayersComponent';
import ConfigurationComponent from './Configuration/ConfigurationComponent';
import { ImportStore } from '../store/ImportStore';
export default {
    name: "ImportComponent",
    components : {
        PlayersComponent, ConfigurationComponent
    },
    setup() {
        const importStore = ImportStore();
        return { importStore };
    },
    data() {
        return {
            Filters : this.importStore.Filters
        }
    }
}
</script>

<style scoped>

</style>
