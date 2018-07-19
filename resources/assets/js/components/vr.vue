<template>
    <div>
        <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force animated fadeIn" v-if="cargando===1">
            <div class="m-portlet__body">
                <div class="m-widget17">
                    <div class="m-widget17__stats">
                        <div class="text-center">
                            <br><br>
                            <h2>Cargando <i class="fa fa-circle-o-notch fa-spin fa-fw"></i></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force animated fadeIn" v-if="cargando===2">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">{{ec.title}}</h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m-widget17">
                    <div class="m-widget17__stats">
                        <a-scene class="aframebox" embedded>
                            <a-videosphere rotation="0 180 0" src="#video"
                                           play-on-window-click
                                           play-on-vrdisplayactivate-or-enter-vr>
                            </a-videosphere>
                            <a-camera user-height="0" wasd-controls-enabled="false" arrow-key-rotation>
                            </a-camera>
                            <a-assets>
                                <video id="video" style="display:none"
                                       autoplay loop crossorigin="anonymous" playsinline webkit-playsinline preload="auto">
                                    <source type="video/mp4"
                                            :src="video" />
                                </video>
                            </a-assets>
                        </a-scene>
                    </div>
                </div>
                <button type="button" class="btn m-btn--square  btn-warning m-btn--wide" v-on:click="regresar">
                    Regresar
                </button>
            </div>
        </div>
        <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force animated fadeIn" v-show="cargando===3">
            <div class="m-portlet__body">
                <div class="m-widget17">
                    <div class="m-widget17__stats">
                        <div class="text-center text-danger">
                            <br><br>
                            <h2>Ocurrio un error vuelva a intentar <i class="fa fa-frown fa-fw"></i></h2>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn m-btn--square  btn-warning m-btn--wide" v-on:click="regresar">
                    Regresar
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    Vue.config.ignoredElements = [
        'a-scene',
        'a-videosphere',
        'a-camera',
        'a-assets'
    ];
    import 'aframe';
    import {Bus} from '../app';
    export default {
        name: "vr",
        data: () => ({
            cargando:1,
            video:'https://ucarecdn.com/bcece0a8-86ce-460e-856b-40dac4875f15',

        }),
        props:['es','ec'],
        methods:{
            cargar:function(){
                axios({
                    method: 'POST',
                    url: location.origin+location.pathname,
                    params:{
                        'scene':this.ec.id,
                        'state':this.es.id
                    }
                }).then((response) => {
                    if(response.data.val){
                        this.video=response.data.url;
                        let vm = this;
                        setTimeout(function() {
                            vm.cargando=2;
                        }, 4000);
                    }else{
                        this.cargando=3;
                    }
                });
            },
            regresar:function(){
                Bus.$emit('set-escenario',null);
                Bus.$emit('set-estado',null);
            }
        },
        mounted(){
            this.cargar();
        }
    }
</script>

<style>
    .aframebox {
        height: 500px;
        width: 100%;
    }
</style>
