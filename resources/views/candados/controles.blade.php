@extends('adminlte::page')

@section('title', 'SISCORP')

@section('content_header')
    <h1 class="text-bold" style="font-size: 30px">ELIGE EL TIPO DE CONTROL</h1>
@stop
@section('content')

    <div class="row">
        @foreach($datos_controles as $i => $v)
{{--        {{strtolower($datos_controles[$i]['control'])=='gris'?'candados.particular.index':'candados.'.strtolower($datos_controles[$i]['control']).'.index'}}--}}
            <div class="col-lg-3 col-md-3 col-xs-6" data-toggle="modal" data-target="#modal{{$datos_controles[$i]['control']}}">
                <a href="{{route(strtolower($datos_controles[$i]['control'])=='gris'?'candados.particular.index':'candados.'.strtolower($datos_controles[$i]['control']).'.index')}}">
                <div class="small-box {{$datos_controles[$i]['background']}}">
                        <div class="inner">
                            <h3 style="color: white">{{$datos_controles[$i]['control']}}</h3>
                            <br>
                            <br>
                        </div>
                        <div class="icon">
                            <i class="{{$datos_controles[$i]['iconos']}} icono"></i>
                        </div>
                </div>
                </a>
            </div>

        @endforeach

    </div>
@stop
@section('footer')
    <div class="row">
        <div class="col" style="font-weight: bold;">Secretaría de Movilidad de la Ciudad de México </div>
        <div class="col">Dirección de Sistemas de Información .2020 &copy;</div>
    </div>
@stop
