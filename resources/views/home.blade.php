@extends('layauts.plantilla')

@section('title', 'Home')

@section('estilo')
    <style>
        body {
            background: powderblue;

        }

    </style>

@endsection

@section('content')
    <div class="col-8 mx-auto">
        <img src="main.jpeg" class="img-responsive" alt="imagen" width="920">
        <div class="h-30"></div>
    </div>

    @include('layauts.vistas',['pagina'=>'inicio'])
@endsection
