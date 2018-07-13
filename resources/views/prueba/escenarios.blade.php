@extends('template.usuario')
@section('titulo') Escenarios @endsection
@section('cuerpo')
    <div class="container">
        <div>
            <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force animated fadeIn">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">Elige el escenario que quieras visitar! - Estado <b>Muy Felíz</b></h3>
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
                                <div class="col-md-4 item" onclick="location.href ='{{route('prueba',3)}}'">
                                    <img src="https://instagram.fuio7-1.fna.fbcdn.net/vp/c21425c1429c4edfa843494bc5ceb51c/5BE1B23C/t51.2885-15/e35/36160242_1927613374196779_4998207313853546496_n.jpg" alt="" class="img-fluid rounded-circle">
                                    <div class="text-center"><b>Conducir</b><br><small>3 minutos</small>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
