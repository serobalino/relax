<template>
    <div class="col-md-6 animated fadeInRight">
        <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Información Básica
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit m-form--label-align-right" v-on:submit.prevent="enviar">
                <div class="m-portlet__body">
                    <div class="form-group m-form__group m--margin-top-10">
                        <div class="alert m-alert m-alert--default" role="alert">
                            {{mensaje}}
                        </div>
                    </div>
                    <div class="text-center" v-if="perfil.avatar">
                        <img :src="perfil.avatar" alt="" class="img-fluid rounded-circle" style="max-height: 100px">
                    </div>
                    <div class="form-group m-form__group">
                        <label >Nombre</label>
                        <input class="form-control m-input" placeholder="Nombre" type="text" v-model="perfil.name">
                    </div>
                    <div class="form-group m-form__group">
                        <label >Correo electrónico</label>
                        <input class="form-control m-input" placeholder="Email" type="email" v-model="perfil.email">
                    </div>
                    <div class="form-group m-form__group">
                        <label >Contraseña</label>
                        <input class="form-control m-input" placeholder="Contraseña" type="password" v-model="perfil.psw">
                    </div>
                    <div class="form-group m-form__group">
                        <label >Confirmar</label>
                        <input class="form-control m-input" placeholder="Confirmar" type="password" v-model="perfil.psw2">
                    </div>
                    <div class="form-group m-form__group">
                        <label >Ciudad actual</label>
                        <input class="form-control m-input" placeholder="Ciudad" type="text" v-model="lugar">
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <button type="submit" class="btn btn-primary">
                            Actualizar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "perfil",
        data: () => ({
            perfil:[],
            mensaje:'Solo cambie la información nescesaria',
            lugar:'',
        }),
        methods:{
            cargarPerfil:function(){
                axios({
                    method: 'OPTIONS',
                    url: location.origin+'/profile',
                }).then((response) => {
                    this.perfil=response.data;
                    this.lugar=response.data.lugar.titulo_lu
                });
            },
            enviar:function(){
                console.log('enviado');
            }
        },
        created(){
            this.cargarPerfil();
        }
    }
</script>

<style scoped>

</style>