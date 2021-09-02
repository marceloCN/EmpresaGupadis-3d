{{-- es el index de hormigon --}}
@extends('layauts.plantilla')

@section('title','Hormigon Premesclado')

@section('estilo')
<style>
    body{
        background: thistle;
    }
</style>

@endsection

@section('content')
   

    <div class="col ">
        <div class="col-6 mt-2 mx-auto">
            <h1 class="text-center fw-bold">Hormigon Premesclado</h1>
            <img src="h1.jpg" class="img-responsive" alt="imagen" width="650">
            <h2 class="text-center">Hosmigon mas comunes</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hormigon as $datos)
                        <tr>
                            <td>{{ $datos->h_id }}</td>
                            <td>{{ $datos->h_tip}}</td>
                            <td>{{ $datos->h_nom}}</td>
                            <td>{{ $datos->h_des }}</td>
                            <td>{{ $datos->h_pre }} Bs</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <img src="h3.jpg" class="img-responsive" alt="imagen" width="650">
            <img src="publicidad_hormigon.jpg" class="img-responsive" alt="imagen" width="650">
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'hormigon.inicio'])
    
@endsection
