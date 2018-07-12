@extends('template.usuario')
@section('titulo') Perfil @endsection
@section('cuerpo')
    <div class="container">
        <div class="row">
            <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force animated fadeIn">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">¿Cómo te sientes hoy?</h3>
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
                            <a type="button" class="btn m-btn--square  btn-primary btn-lg m-btn m-btn--custom btn-block">Muy Feliz</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
