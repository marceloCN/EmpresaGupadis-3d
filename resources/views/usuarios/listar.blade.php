{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'usuarios-listar')

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
            <h2 class="text-center">Listar todos los usuarios</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">tipo de usuario</th>
                        <th scope="col">CI </th>
                        <th scope="col">correo personal</th>
                        <th> Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->ud_id }}</td>
                            <td>{{ $usuario->ud_nom }} {{ $usuario->ud_app }}</td>
                            <td>{{ $usuario->tipo_usuario->tu_tip }}</td>
                            <td>{{ $usuario->ud_ci }}</td>
                            <td>{{ $usuario->ud_email }}</td>
                            <td>
                                <a href="{{ route('usuario.editar', $usuario->ud_id) }}">Editar</a>
                                {{-- <a href="{{ route('login.editarSession', $login->ul_id) }}">Modificar login Seccion</a> --}}
                                <a href="#">Eliminar</a>
                            </td>
                        </tr>
                        {{-- @include('material.modal_eliminar', $material) --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'login.listarUsuariosSession'])
@endsection
