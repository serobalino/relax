<template>
    <div class="col-md-6 animated fadeInLeft">
        <div class="m-portlet m-portlet--full-height ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Historial
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m-widget3" v-for="item in historial">
                    <div class="m-widget3__item">
                        <div class="m-widget3__header">
                            <span class="m-widget3__status m--font-info">
                                {{item.date_parse}}
                            </span>
                        </div>
                        <div class="m-widget3__body">
                            <p class="m-widget3__text">
                                Te sentias <b>{{item.state}}</b> y usaste <b>{{item.scene}}</b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "historial",
        data: () => ({
            historial:[],
        }),
        methods:{
            cargarHistorial:function(){
                axios({
                    method: 'GET',
                    url: location.origin+'/profile/record',
                }).then((response) => {
                    this.historial=response.data;
                });
            }
        },
        created(){
            this.cargarHistorial();
        }
    }
</script>

<style scoped>

</style>