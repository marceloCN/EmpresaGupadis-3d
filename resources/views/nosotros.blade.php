@extends('layauts.plantilla')

@section('title','Nosotros')

@section('estilo')
<style>
    body{
        background: cornsilk;
    }
</style>

@endsection

@section('content')
<div class="row mt-3">
    <div class="col-6">
        <div class="col-9 mx-auto">
            <img src="logo.jpeg" class="img-rounded" alt="imagen del logo" width="500" height="236">
        </div>
        <h1 class="text-center fw-bolder text-danger" >Nosotros</h1>
        <div class="col-10 mx-auto">
                <h5 class="text-sm-start fst-italic">
                    <p class="text-justify">Gupadis-3D es la empresa líder de construcción en Bolivia especializada en estructuras y obras civiles, 
                        fundaciones High Tech, estudios geotécnicos, controles de calidad, diseños y proyectos, y soluciones de última generación.
                    </p>
                    
                </h5>
        </div>
    </div>

    <!-- col trabaja con lo que sobro -->
    <div class="col">
        <div class="col-12 mx-auto">
            <h1 class="text-center fw-bolder text-danger" >Mision</h1>
            <div class="col-11 mx-auto">
                <h5 class="text-sm-start fst-italic text-justify">
                    Somos una empresa dedicado a la ejecución de proyectos de obras 
                    civiles y la producción de Hormigón Premezclado puesto en Obra, orientado
                     a generar bienestar, seguridad y confianza en nuestros clientes con productos 
                     de calidad acordes con sus necesidades y expectativas, Nuestra política de la 
                     Empresa es la actualización permanente, investigación, apropiada de tecnologías, 
                     que promuevan la producción.
                </h5>
            </div>

            <h1 class="text-center fw-bolder text-danger" >Vision</h1>
            <div class="col-11 mx-auto">
                <h5 class="text-sm-start fst-italic text-justify">
                    Somos una empresa dedicado a la ejecución de proyectos de obras civiles y la 
                    producción de Hormigón Premezclado puesto en Obra, orientado a generar bienestar, 
                    seguridad y confianza en nuestros clientes con productos de calidad acordes con sus 
                    necesidades y expectativas, Nuestra política de la Empresa es la actualización permanente, 
                    investigación, apropiada de tecnologías, que promuevan la producción.
                </h5>
            </div>

        </div>
    </div>
</div>
    @include('layauts.vistas',['pagina'=>'nosotros'])
@endsection
