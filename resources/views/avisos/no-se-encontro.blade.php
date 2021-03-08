@extends('adminlte::page')

@section('title', 'Buscando: Empresa')

@section('content_header')
@stop

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mx-auto">

                        <!-- form card login -->
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0">Lo sentimos, tu archivo ya fue eliminado<i class="animate__animated animate__fadeInLeft animate__delay-1s  far fa-id-card"></i> </h3>
                            </div>
                            <div class="card-body">
                                <a href="{{url('/home')}}">Regresar</a>
                            </div>
                            <!--/card-block-->
                        </div>
                        <!-- /form card login -->
                    </div>
                </div>
            </div>
            @stop
            @section('footer')
                <div class="row">
                    <div class="col" style="font-weight: bold;">Secretaría de Movilidad de la Ciudad de México </div>
                    <div class="col">Dirección de Sistemas de Información .2020 &copy;</div>
                </div>

@stop
