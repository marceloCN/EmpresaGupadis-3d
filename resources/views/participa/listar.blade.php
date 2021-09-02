{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'principales-proyectos')

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
            <h2>Listar participacion de todos los proyectos</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Proyecto</th>
                        <th scope="col">Descripcion</th>
                        @if (auth()->user()->usuario_dato->id_tipo == 1)
                            <th> Opciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $participa)
                        <tr>
                            <td>{{ $participa->id_pa }}</td>
                            <td>
                                @if ($participa->usuario_dato)
                                    {{ $participa->usuario_dato->ud_nom }} {{ $participa->usuario_dato->ud_app }}
                                @else
                                    No hay datos
                                @endif
                            </td>
                            <td>{{ $participa->proyecto->p_nom }}</td>
                            <td>{{ $participa->pa_des }}</td>
                            @if (auth()->user()->usuario_dato->id_tipo == 1)
                                <td>
                                <a role="button" href="#" class="btn btn-link" data-toggle="modal"
                                data-target="#modalEliminarParticipa-{{ $participa->id_pa }}">
                                    Eliminar
                                </a>
                                </td>
                            @endif
                        </tr>
                        @include('participa.modal_eliminar', $participa)
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'participa.listar'])
@endsection
