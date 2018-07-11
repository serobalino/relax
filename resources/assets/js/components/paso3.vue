<template>
    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force animated fadeIn">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text text-center">Ahora inserta el celular en los <b>lentes VR.</b></h3>
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
                <div class="m-widget17__stats text-center">
                    <img :src="imagen" class="rounded">
                    <h3>Ponte comodo, relajate y disfruta de tu viaje!</h3>
                    <h4>Presiona <b>Empezar</b> cuando estes listo.</h4>
                    <button type="button" class="btn m-btn--square  btn-secondary m-btn--wide btn-block" v-on:click="siguiente">
                        Empezar
                    </button>
                </div>
                <button type="button" class="btn m-btn--square  btn-warning m-btn--wide" v-on:click="atras">
                    Atras
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import {Bus} from '../app';
    export default {
        name: "paso3",
        data: () => ({
            e:[],
            s:[],
        }),
        computed:{
            imagen:function(){
                return location.origin+'/images/vr.png'
            }
        },
        methods:{
            siguiente:function(){
                Bus.$emit('set-vr');
            },
            atras:function(){
                Bus.$emit('set-escenario',null);
            }
        }
    }
</script>

<style scoped>
    .col-centered{
        float: none;
        margin: 0 auto;
    }
</style>