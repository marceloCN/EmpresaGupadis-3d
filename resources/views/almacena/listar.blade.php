{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'equipos almacena')

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
            <h2>Listar equipos guardados</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sucursal</th>
                        <th scope="col">Equipo</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Fecha</th>
                        <th> Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $almacena)
                        <tr>
                            <td>{{ $almacena->id_a }}</td>
                            <td>
                                @if ($almacena->sucursal)
                                    {{ $almacena->sucursal->s_nom }}
                                @else
                                    Ninguna
                                @endif
                            </td>
                            <td>
                                @if ($almacena->equipo)
                                    {{ $almacena->equipo->e_nom }}
                                @else
                                    Ninguno
                                @endif
                            </td>
                            <td>{{ $almacena->a_cant }}</td>
                            <td>{{ $almacena->a_des }}</td>
                            <td>{{ $almacena->a_fecha }}</td>
                            <td>
                                <a href="{{ route('almacena.editar', $almacena->id_a) }}">Editar</a>
                                <a href="#">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'almacena.listar'])
@endsection
