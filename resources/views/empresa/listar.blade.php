{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'empresas')

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
            <h2>Listar empresas</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Ubicacion</th>
                        <th scope="col">Email</th>
                        <th scope="col">Encargado</th>
                        <th scope="col">Telefono</th>
                        <th> Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td>{{ $empresa->em_id }}</td>
                            <td>{{ $empresa->em_nom }}</td>
                            <td>{{ $empresa->em_des }}</td>
                            <td>{{ $empresa->em_ubic }} </td>
                            <td>{{ $empresa->em_email }} </td>
                            <td>{{ $empresa->em_enc }} </td>
                            <td>{{ $empresa->em_telef }} </td>
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
    @include('layauts.vistas',['pagina'=>'empresa.listar'])
@endsection
