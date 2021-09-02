{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'listar-proyectos')

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
            <h2>Listar proyectos</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha Inicio</th>
                        <th scope="col">Fecha Fin</th>
                        <th scope="col">Sucursal</th>
                        @if (auth()->user()->usuario_dato->id_tipo == 1)
                        <th> Opciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyectos as $proyecto)
                        <tr>
                            {{-- el usuario administrador podra ver los proyectos en ejecucion y finalizados --}}
                            @if (auth()->user()->usuario_dato->id_tipo == 1)
                                <td>{{ $proyecto->p_id }}</td>
                                <td>{{ $proyecto->p_nom }}</td>
                                <td>
                                    @if ($proyecto->p_est)
                                        Finalizado
                                    @else
                                        En ejecucion
                                    @endif
                                </td>
                                <td>{{ $proyecto->p_fini }}</td>
                                <td>{{ $proyecto->p_ffin }}</td>
                                <td>
                                    @if ($proyecto->sucursal)
                                        {{ $proyecto->sucursal->s_nom }}
                                    @else
                                        Ninguna
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('proyectos.editar',$proyecto->p_id) }}">Editar</a>
                                    <a href="#">Eliminar</a>
                                </td>
                            @endif
                            @if (auth()->user()->usuario_dato->id_tipo == 2 || auth()->user()->usuario_dato->id_tipo == 3)
                                {{-- solo se mostrara los proyectos finalizados --}}
                                @if ($proyecto->p_est)
                                    <td>{{ $proyecto->p_id }}</td>
                                    <td>{{ $proyecto->p_nom }}</td>
                                    <td>Finalizado</td>
                                    <td>{{ $proyecto->p_fini }}</td>
                                    <td>{{ $proyecto->p_ffin }}</td>
                                    <td>
                                        @if ($proyecto->sucursal)
                                            {{ $proyecto->sucursal->s_nom }}
                                        @else
                                            Ninguna
                                        @endif
                                    </td>
                                @endif
                            @endif
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'proyecto.listar'])
@endsection
