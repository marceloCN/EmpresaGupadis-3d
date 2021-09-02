{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'ver reportes')

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
            <h2>Ver reportes del proyecto {{ $proyecto->p_nom }}</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Usuario que reportaron</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reportes as $reporte)
                        <tr>

                            <td>{{ $reporte->r_id }}</td>
                            <td>{{ $reporte->nom }}
                                {{ $reporte->app }}
                            </td>
                            <td>{{ $reporte->r_fecha }}</td>
                            <td>{{ $reporte->r_des }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'reporte.listar.proyecto'])
@endsection
