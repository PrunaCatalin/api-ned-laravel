<template>
    <multiselect v-model="value" :options="options"></multiselect>
</template>

<script>
import Multiselect from 'vue-multiselect'
export default {
    name: "NestedDND",
    components :{
        Multiselect
    },
    data (){
      return {
          listItems : [],
          keyNameString : "",
          value: null,
          options: ['list', 'of', 'options']
      }
    },
    props : {
        items : {
            type : Array,
            default : []
        },
        keyName : {
            type : String,
            default : ""
        }
    },
    created() {
        console.log("Items" , this.items);
        // this.listItems = this.items;
        // this.keyNameString = this.keyName;
    }
}
</script>

<style scoped>
</style>
