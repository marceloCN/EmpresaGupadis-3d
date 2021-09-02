{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'materiales')

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
            <h2>Listar materiales</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th> Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materiales as $material)
                        <tr>
                            <td>{{ $material->m_id }}</td>
                            <td>{{ $material->m_nom }}</td>
                            <td>{{ $material->m_des }}</td>
                            <td>
                                <a href="{{ route('materiales.editar', $material->m_id) }}">Editar</a>
                                <a role="button" href="#" class="btn btn-link" data-toggle="modal"
                                    data-target="#modalEliminarMaterial-{{ $material->m_id }}">
                                    Eliminar
                                </a>
                        </tr>
                        @include('material.modal_eliminar', $material)
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'material.listar'])
@endsection
