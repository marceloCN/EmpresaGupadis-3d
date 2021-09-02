@extends('layauts.plantillaUser')

@section('title', 'Estadistica')

@section('content')
    <div class="col ">
        <div class="col-6 mt-2 mx-auto">
            <h2 class="col-6 mx-auto text-danger">Resultados</h2>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Vistas</th>
                    <th>porcentaje</th>
                </thead>
                @foreach ($vistas as $vista)
                    <tr>
                        <td>{{ $vista->pagina }}</td>
                        <td>{{ $vista->vistas }}</td>
                        <td>{{ round(($vista->vistas * 100) / $total, 2) }} % </td>
                    </tr>
                @endforeach
                <tr>
                    <td>Total de todas las vistas</td>
                    <td>{{$total}}</td>
                    <td>100 % </td>
                </tr>
            </table>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'estadistica.acceso'])
@endsection
