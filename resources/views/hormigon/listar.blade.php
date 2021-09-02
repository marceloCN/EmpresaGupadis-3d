{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'principales-hormigon')

@section('estilo')
    <style>
        body {
            background: darkgray;
        }

    </style>

@endsection
@section('content')

    <div class="col ">
        <div class="col-6 mt-2 mx-auto">
            <h2>Listar todos los Hormigon Premesclado</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        @if (auth()->user()->usuario_dato->id_tipo == 1 || auth()->user()->usuario_dato->id_tipo == 2)
                            <th> Opciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hormigon as $datos)
                        <tr>
                            <td>{{ $datos->h_id }}</td>
                            <td>{{ $datos->h_tip}}</td>
                            <td>{{ $datos->h_nom}}</td>
                            <td>{{ $datos->h_des }}</td>
                            <td>{{ $datos->h_pre }}</td>
                            
                            @if (auth()->user()->usuario_dato->id_tipo == 1 || auth()->user()->usuario_dato->id_tipo == 2)
                                <td>
                                    <a href="{{ route('hormigon.editar', $datos->h_id) }}">editar</a>
                                </td>
                                <td>
                                    <a role="button" href="#" class="btn btn-link" data-toggle="modal"
                                    data-target="#modalEliminarHormigon-{{ $datos->h_id }}">
                                        Eliminar
                                    </a>
                                </td>
                            @endif
                        </tr>
                        @include('hormigon.modal_eliminar', $datos)
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'hormigon.listar'])
@endsection
