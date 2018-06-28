<template>
    <div>
        <paso1 v-if="!e"></paso1>
        <paso2 v-if="e && !s" :es="e"></paso2>
        <paso3 v-if="e && s && vr===false"></paso3>
        <v-r v-if="vr"></v-r>
    </div>
</template>

<script>
    import {Bus} from '../app';
    export default {
        name: "pasos",
        data: () => ({
            e:null,
            s:null,
            vr:false,
        }),
        mounted(){
            Bus.$on('set-estado',function(estado){
                this.e=estado;
            }.bind(this));
            Bus.$on('set-escenario',function(escenario){
                this.s=escenario;
            }.bind(this));
            Bus.$on('set-vr',function(){
                this.vr=true;
            }.bind(this));
        }
    }
</script>

<style scoped>

</style>