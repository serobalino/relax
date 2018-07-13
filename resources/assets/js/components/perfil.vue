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
                        <div class="alert m-alert m-alert--default" role="alert" v-html="mensaje"></div>
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
                        <TypeAhead
                                :src="rutaApi+'?q=:palabra'"
                                v-model="perfil.lugar.titulo_lu"
                                :queryParamName="':palabra'"
                                :onHit="seleccionar"
                                :limit="3"
                                :selectFirst="false"
                                :getResponse="llamar"
                                :minChars="3"
                                :delayTime="0"
                                :highlighting="listar"
                                :placeholder="'Busque su ciudad'"
                        />
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
    import TypeAhead from 'vue2-typeahead';
    export default {
        name: "perfil",
        data: () => ({
            perfil:{lugar:{},psw:'',psw2:''},
            mensaje:'Solo cambie la información nescesaria',
            rutaApi:location.origin+'/api/lugares',
        }),
        components: {
            TypeAhead
        },
        methods:{
            llamar: function (response) {
                return response.data;
            },
            listar: function (item, vue) {
                let html    =   item.name.replace(vue.query,`<b>${vue.query}</b>`);
                return (`${html} - <span class="text-muted">${item.name2}</span>`);
            },
            cargarPerfil:function(){
                axios({
                    method: 'OPTIONS',
                    url: location.origin+'/profile',
                }).then((response) => {
                    this.perfil=response.data;
                    if(!response.data.lugar)
                        this.perfil.lugar={titulo_lu:''};
                });
            },
            seleccionar: function (item, vue, index) {
                this.perfil.lugar.codigo_lu=item.id;
                this.perfil.lugar.titulo_lu=item.name;
            },
            /**
             * Actualizar la informacion de usuario
             * **/
            enviar:function(){
                axios({
                    method: 'POST',
                    url: location.origin+'/profile',
                    params:{
                        'nombre':this.perfil.name,
                        'email':this.perfil.email,
                        'contrasena':this.perfil.psw,
                        'contrasena_confirmation':this.perfil.psw2,
                        'ciudad':this.perfil.lugar.codigo_lu,
                    }
                }).then((response) => {
                    this.mensaje=response.data.mensaje;
                });
            }
        },
        created(){
            this.cargarPerfil();
        }
    }
</script>

<style scoped>

</style>