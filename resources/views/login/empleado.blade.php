@extends('layauts.plantillaUser')

@section('title', 'empleado: ' . auth()->user()->usuario_dato->ud_nom) 


@section('content')

    <h1>Bienvenido usuario empleado {{ $empleado->ud_nom }} {{ $empleado->ud_app }}</h1>
    <div class="col ">
        <div class="col-6 mt-2 mx-auto">
            <h1 class="text-center fw-bold">Principales Obras</h1>
        </div>
    </div>

    <div align="center">
        <table>
            <tr>
                <th class="text-center"><p><b> Construccion de Colegios </b></p></th>
                <th class="text-center"><p><b> Construccion de Coliseos </b></p></th>
                <th class="text-center"><p><b> Construccion de Hospital </b></p></th>
            </tr>

            <tr>
                
                <td><div align='center'>  <img src="obra1.jpg" class="img-responsive" alt="imagen" width="350"> </div></td>
                <td><div align='center'>  <img src="obra2.jpg" class="img-responsive" alt="imagen" width="350"> </iframe></div></td>
                <td><div align='center'>  <img src="obra4.jpg" class="img-responsive" alt="imagen" height="260"> </iframe></div></td> 
            </tr>
        </table>
        <div class="dropdown-divider"></div>
    </div>

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
    <div class="dropdown-divider"></div>

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

    @include('layauts.vistas',['pagina'=>'inicio.empleado'])
@endsection


