@extends('template.usuario')
@section('titulo') Error @endsection
@section('cuerpo')
    <div class="container">
        <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force animated fadeIn">
            <div class="m-portlet__body">
                <div class="m-widget17">
                    <div class="m-widget17__stats">
                        <div class="text-center text-danger">
                            <br><br>
                            <h2>Solo puedes usar la version de prueba una vez <i class="fa fa-frown fa-fw"></i></h2>
                            <br><br><br>
                        </div>
                    </div>
                </div>
                <div class="form-row text-center">
                    <div class="col-12">
                        <a href="{{route('register')}}" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Registrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
