@extends('layauts.plantillaUser')

@section('title', 'Estadistica de proyectos')

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
        <h2 class="text-center"> Proyectos finalizados</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre Proyecto</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Fin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($finalizados as $finalizado)
                    <tr>
                        <td>{{ $finalizado->p_nom }}</td>
                        <td>{{ $finalizado->p_fini }}</td>
                        <td>{{ $finalizado->p_ffin }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="text-center"> Proyectos en ejecucion</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre Proyecto</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">fecha propuesta de finalizacion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enEjecucion as $ejecucion)
                    <tr>
                        <td>{{ $ejecucion->p_nom }}</td>
                        <td>{{ $ejecucion->p_fini }}</td>
                        <td>{{ $ejecucion->p_ffin }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2> 
            En Total existen {{$total->count()}} proyectos, ya sea en ejecucion o finalizados
            que representan el 100%, de los cuales: <br> 
            > Proyectos finalizados: {{$finalizados->count()}},  que representa el {{($finalizados->count()*100)/$total->count()}} % <br>
            > Proyectos en ejecucion: {{$enEjecucion->count()}}, que representa el {{($enEjecucion->count()*100)/$total->count()}} %
        </h2>
    </div>
</div>

    @include('layauts.vistas',['pagina'=>'proyecto.estadisticas'])
@endsection