<template>
    <div>
        <paso1 v-if="actual===1"></paso1>
        <paso2 v-if="actual===2" :es="e"></paso2>
        <paso3 v-if="actual===3"></paso3>
        <v-r v-if="actual===4" :es="e" :ec="s"></v-r>
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
            actual:1,
        }),
        mounted(){
            /**
             * Evento que SETEA un estado el cual funciona para setear variable actual
             * **/
            Bus.$on('set-estado',function(estado){
                this.e=estado;
                if(estado===null)
                    this.actual=1;
                else
                    this.actual=2;
            }.bind(this));
            /**
             * Event que setea un escenario
             * **/
            Bus.$on('set-escenario',function(escenario){
                this.s=escenario;
                if(escenario===null)
                    this.actual=2;
                else
                    this.actual=3;
            }.bind(this));
            /**
             * Evento que activa el componenete de A FRAME
             * **/
            Bus.$on('set-vr',function(){
                this.vr=true;
                this.actual=4;
            }.bind(this));
        }
    }
</script>

<style scoped>

</style>