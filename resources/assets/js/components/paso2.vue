<template>
    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force animated fadeIn">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">Elige el escenario que quieras visitar! - Estado <b>{{es.title}}</b></h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="m-widget17">
                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                    <div class="m-widget17__chart" style="height:20px;">
                        <div style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor">
                        </div>
                    </div>
                </div>
                <div class="m-widget17__stats">
                    <div class="row">
                        <div class="col-md-4 item" v-for="item in escenarios" v-on:click="ponerEscena(item)">
                            <img :src="item.picture" alt="" class="img-fluid rounded-circle">
                            <div class="text-center"><b>{{item.title}}</b><br><small>{{item.time}} minutos</small>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn m-btn--square  btn-warning m-btn--wide" v-on:click="atras">
                Atras
            </button>
        </div>
    </div>
</template>

<script>
    import {Bus} from '../app';
    export default {
        name: "paso2",
        props:['es'],
        data: () => ({
            escenarios:[],
        }),
        methods:{
            ponerEscena:function(item){
                Bus.$emit('set-escenario',item);
            },
            atras:function(){
                Bus.$emit('set-estado',null);
            },
            cargarEscenarios:function(){
                axios({
                    method: 'GET',
                    url: location.origin+'/api/escenarios/'+this.es.id,
                }).then((response) => {
                    this.escenarios=response.data;
                });
            }
        },
        created(){
            this.cargarEscenarios();
        }
    }
</script>

<style scoped>

</style>