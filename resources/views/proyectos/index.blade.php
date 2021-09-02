{{-- es el index de hormigon --}}
@extends('layauts.plantilla')

@section('title','Hormigon Premesclado')

@section('estilo')
<style>
    body{
        background: cornsilk;
    }
</style>

@endsection

@section('content')
   

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
    </div>
    
    <div class="col ">
        <div class="col-6 mt-2 mx-auto">
            <h2 class="text-center">Principales Proyectos</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Fin</th>
                    <th scope="col">Sucursal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectos as $proyecto)
                    <tr>
                            {{-- solo se mostrara los proyectos finalizados --}}
                    @if ($proyecto->p_est)
                        <td>{{ $proyecto->p_id }}</td>
                        <td>{{ $proyecto->p_nom }}</td>
                        <td>Finalizado</td>
                        <td>{{ $proyecto->p_fini }}</td>
                        <td>{{ $proyecto->p_ffin }}</td>
                        <td>
                        @if ($proyecto->sucursal)
                            {{ $proyecto->sucursal->s_nom }}
                        @else
                            Ninguna
                        @endif
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div> 
    </div> 
    @include('layauts.vistas',['pagina'=>'proyectos.inicio'])
    
@endsection
