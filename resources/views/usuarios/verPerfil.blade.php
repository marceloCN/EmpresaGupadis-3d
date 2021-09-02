@extends('layauts.plantillaUser')

@section('title', 'Ver perfil de '. $usuario->ud_nom)

@section('content')
<div class="col ">
    <div class="col-6 mt-2 mx-auto">
        <h2 class="text-center">Ver perfil de {{$usuario->ud_nom}} {{$usuario->ud_app}}</h2>
        <h3>Es un usuario dentro de la empresa Gupadis-3d de tipo {{$usuario->tipo_usuario->tu_tip}}, con CI {{$usuario->ud_ci}} y actualmente vive en {{$usuario->ud_dir}}.
        </h3> 
        <h2 class="text-center">Referencias</h2>
        <h3>Telefono: {{$usuario->ud_telf}}</h3>
        <h3>Correo Personal: {{$usuario->ud_email}}</h3>
        <br>
        
    </div>
</div>
@include('layauts.vistas',['pagina'=>'usuario.verPerfil'])
@endsection
