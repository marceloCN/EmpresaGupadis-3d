{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'listar-login')

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
            <h2>Listar login de todos los usuarios</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre de usuario</th>
                        <th scope="col">tipo de usuario</th>
                        <th scope="col">Correo Corporativo</th>
                        <th scope="col">Contraseña</th>
                        <th> Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logins as $login)
                        <tr>
                            <td>{{ $login->ul_id }}</td>
                            
                            <td>
                                @if ($login->usuario_dato)
                                    {{ $login->usuario_dato->ud_nom }} {{ $login->usuario_dato->ud_app }}
                                @else
                                    No hay datos
                                @endif
                            </td>
                             <td>
                                @if ($login->usuario_dato->tipo_usuario)
                                    {{ $login->usuario_dato->tipo_usuario->tu_tip }}
                                @else
                                    No hay datos
                                @endif
                            </td> 
                            <td>{{ $login->ul_acc }}</td>
                            <td>{{ $login->ul_pass }}</td>
                            <td>
                                <a href="{{ route('login.editarSession', $login->ul_id) }}">Modificar login Seccion</a>
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
