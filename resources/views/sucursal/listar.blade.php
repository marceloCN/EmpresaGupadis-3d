{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'sucursales')

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
            <h2>Listar sucursales</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ubicacion</th>
                        <th scope="col">Descripcion</th>
                        <th> Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sucursales as $sucursal)
                        <tr>
                            <td>{{ $sucursal->s_id }}</td>
                            <td>{{ $sucursal->s_nom }}</td>
                            <td>{{ $sucursal->s_ubic }}</td>
                            <td>{{ $sucursal->s_des }}</td>
                            <td>
                                <a href="{{route('sucursales.editar',$sucursal->s_id)}}">Editar</a>
                                <a href="#">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'sucursal.listar'])
@endsection
