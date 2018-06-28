<template>
    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force animated fadeIn">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">Elige el escenario que quieras visitar! - {{es.estado}}</h3>
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
                            <img :src="item.img" alt="" class="img-fluid rounded-circle">
                            <div class="text-center"><b>{{item.escenario}}</b><br><small>{{item.tiempo}} minutos</small>
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
            escenarios:[
                {"id":1,"escenario":"Escenario 1","tiempo":5,"img":"https://picsum.photos/300/300?image=1"},
                {"id":2,"escenario":"Escenario 2","tiempo":5,"img":"https://picsum.photos/300/300?image=2"},
                {"id":3,"escenario":"Escenario 3","tiempo":5,"img":"https://picsum.photos/300/300?image=3"},
                {"id":4,"escenario":"Escenario 4","tiempo":5,"img":"https://picsum.photos/300/300?image=4"},
                {"id":5,"escenario":"Escenario 5","tiempo":5,"img":"https://picsum.photos/300/300?image=5"},
                {"id":6,"escenario":"Escenario 6","tiempo":5,"img":"https://picsum.photos/300/300?image=6"},
                {"id":7,"escenario":"Escenario 7","tiempo":5,"img":"https://picsum.photos/300/300?image=7"},
                {"id":8,"escenario":"Escenario 8","tiempo":5,"img":"https://picsum.photos/300/300?image=8"},
            ]
        }),
        methods:{
            ponerEscena:function(item){
                Bus.$emit('set-escenario',item);
            },
            atras:function(){
                Bus.$emit('set-estado',null);
            }
        }
    }
</script>

<style scoped>
    .item{
        cursor: pointer;
    }
    .item:hover{
        background: #6a4df6;
        color:white;
    }
</style>