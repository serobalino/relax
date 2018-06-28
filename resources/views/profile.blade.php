@extends('template.usuario')
@section('titulo') Perfil @endsection
@section('cuerpo')
    <div class="container">
        <div class="row">
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
                        <div class="m-widget3">
                            <div class="m-widget3__item">
                                <div class="m-widget3__header">
                                    <span class="m-widget3__status m--font-info">
                                        Ayer
                                    </span>
                                </div>
                                <div class="m-widget3__body">
                                    <p class="m-widget3__text">
                                        Te sentias triste y usaste el mar
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                    <form class="m-form m-form--fit m-form--label-align-right">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group m--margin-top-10">
                                <div class="alert m-alert m-alert--default" role="alert">
                                    Solo cambie la información nescesaria
                                </div>
                            </div>
                            <div class="form-group m-form__group">
                                <label >Nombre</label>
                                <input class="form-control m-input" placeholder="Nombre" type="text">
                            </div>
                            <div class="form-group m-form__group">
                                <label >Correo electrónico</label>
                                <input class="form-control m-input" placeholder="Email" type="email">
                            </div>
                            <div class="form-group m-form__group">
                                <label >Contraseña</label>
                                <input class="form-control m-input" placeholder="Contraseña" type="password">
                            </div>
                            <div class="form-group m-form__group">
                                <label >Confirmar</label>
                                <input class="form-control m-input" placeholder="Confirmar" type="password">
                            </div>
                            <div class="form-group m-form__group">
                                <label >Ciudad actual</label>
                                <input class="form-control m-input" placeholder="Ciudad" type="text">
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <button type="reset" class="btn btn-primary">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
