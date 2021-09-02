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
            <h2 class="text-center">Lista de materiales utilizados para el proyecto {{ $proyecto->p_nom }}</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre de material</th>
                        <th scope="col">Empresa Proporciona</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Fecha de Entrega</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coopera as $cooperas)
                        <tr>
                            <td>{{ $cooperas->id_c }}</td>
                            <td>{{ $cooperas->material->m_nom }}</td>
                            <td>{{ $cooperas->empresa->em_nom }}</td>
                            <td>{{ $cooperas->c_cant }}</td>
                            <td>{{ $cooperas->c_pre }} Bs</td>
                            <td>{{ $cooperas->c_fen }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>El costo total de todos los materiales hacen un total de: {{ $total }} bs </h2>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'Detalles de Compra.listar'])
@endsection
