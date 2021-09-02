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
                        <th scope="col">Proyecto</th>
                        <th scope="col">Descripcion</th>
                        <th> Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $participa)
                        <tr>
                            <td>{{ $participa->id_pa }}</td>
                            <td>{{ $participa->proyecto->p_nom }}</td>
                            <td>{{ $participa->pa_des }}</td>
                            <td>
                                @if (auth()->user()->usuario_dato->id_tipo == 1 || auth()->user()->usuario_dato->id_tipo == 2)
                                    <a role="button" href="#" class="btn btn-link" data-toggle="modal"
                                        data-target="#modalReporte-{{ $participa->id_pa }}">
                                        Crear reporte
                                    </a>
                                @endif
                                <a role="button" class="btn btn-link"
                                    href="{{ route('reporte.ver', $participa->proyecto->p_id) }}">Ver reportes</a>
                                <a role="button" class="btn btn-link"
                                    href="{{ route('coopera.verMateriales', $participa->proyecto->p_id) }}">Ver Materiales Utilizados</a>
                            </td>
                        </tr>
                        @include('participa.modal_reporte',$participa)
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'reporte.listar'])
@endsection
