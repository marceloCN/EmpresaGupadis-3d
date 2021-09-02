{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'cooperaciones')

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
            <h2 class="text-center">Listar de cooperaciones</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Proyecto</th>
                        <th scope="col">Material</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Fecha</th>
                        <th> Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $coopera)
                        <tr>
                            <td>{{ $coopera->id_c }}</td>
                            <td>
                                @if ($coopera->empresa)
                                    {{ $coopera->empresa->em_nom }}
                                @else
                                    Ninguna
                                @endif
                            </td>
                            <td>
                                @if ($coopera->proyecto)
                                    {{ $coopera->proyecto->p_nom }}
                                @else
                                    Ninguno
                                @endif
                            </td>
                            <td>
                                @if ($coopera->material)
                                    {{ $coopera->material->m_nom }}
                                @else
                                    Ninguno
                                @endif
                            </td>
                            <td>{{ $coopera->c_cant }}</td>
                            <td>{{ $coopera->c_pre }} Bs</td>
                            <td>{{ $coopera->c_fen }}</td>
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
    @include('layauts.vistas',['pagina'=>'coopera.listar'])
@endsection
