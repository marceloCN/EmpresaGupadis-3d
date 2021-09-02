{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'equipos')

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
            <h2>Listar equipos</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th> Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipos as $equipo)
                        <tr>
                            <td>{{ $equipo->e_id }}</td>
                            <td>{{ $equipo->e_nom }}</td>
                            <td>{{ $equipo->e_des }}</td>
                            <td>{{ $equipo->e_pre }} Bs</td>
                            <td>
                                <a href="#">Editar</a>
                                <a href="#">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'equipo.listar'])
@endsection
