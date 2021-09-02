@extends('layauts.plantilla')

@section('title','Contacto')

@section('estilo')
<style>
    body{
        background: cornsilk;
    }
</style>

@endsection

@section('content')
<div class="row">
    <div class="col-sm-12 d-flex justify-content-center">
        <h1 class="text-center fw-bold">Contactos</h1>.
    </div>
</div>
<div class="col ">
    <div class="col-6 mt-2 mx-auto">
        <h3> Somos un empresa responsable con los servicios de contruccion civiles con mas de 10 años de experiencia</h3>
        <h3 class="text-center text-danger"> Encargados: </h3>
        <h3> > Ing. Rolando Gutierrez, Representante Legal</h3>
        <h3> > Lic. Erika Robles, Contabilidad</h3>
        <h3> > Ing. Ramber Zeballos, Encargado de Proyectos</h3>
        <h3> > Nestor Lopez Cespedes, Encargado del Hormigon</h3>
        <h3> > Juan Lopez Cespedes, Encargado de la Bomba Hormigera</h3>
        <h3> > Evert Romay Castro, Encargado de Camiones</h3>
        <a href="https://www.facebook.com/rolando115599/?ref=page_internal">Haga clic aki para entrar a su pagina de facebook</a>
    </div>
</div>
    @include('layauts.vistas',['pagina'=>'Contactos'])
@endsection
