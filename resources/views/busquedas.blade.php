@extends('layauts.plantillaUser')

@section('title', 'Busquedas')

@section('content')
    <div class="col ">
        <div class="col-6 mt-2 mx-auto">
            <h2 class="col-6 mx-auto text-danger">Resultado de busqueda</h2>
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </thead>
                @foreach ($result as $clave => $valor)
                    <tr>

                        @if (strpos($clave, 'create') !== false)
                            <td>{{ $clave }}</td>
                            <td><a href="{{ route($valor) }}">{{ route($valor) }}</a></td>
                        @else
                            @if (strpos($clave, 'error') !== false)
                                <td>{{ $clave }}</td>
                                <td>{{ $valor }}</td>
                            @else
                                <td>{{ $clave }}</td>

                                <td><a href="{{ url($valor) }}">{{ url($valor) }}</a></td>
                            @endif
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'busqueda'])
@endsection
