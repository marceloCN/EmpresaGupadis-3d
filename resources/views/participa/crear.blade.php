{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'crear-participacion')

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
            <h2 class="text-center">Crear Participacion</h2>
            <form method="POST" action="{{ route('participa.guardar') }}">
                @csrf
                @error('proyecto')
                <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Añadir a un proyecto:</label>
                    <select class="custom-select" name="proyecto">
                    @foreach ($proyectos as $proyecto)
                        <option select value="{{ $proyecto->p_id }}">{{ $proyecto->p_nom }}</option>
                    @endforeach
                    </select>
                </div>

                @error('usuario')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Nombre de usuario a añadir en la participacion:</label>
                    <select class="custom-select" name="usuario">
                    @foreach ($usuarios as $usuario)
                        <option select value="{{ $usuario->ud_id }}">{{ $usuario->ud_nom }} {{ $usuario->ud_app }}</option>
                    @endforeach
                    </select>
                    
                </div>
                <button type="submit" class="btn btn-primary">Crear participacion</button>
            </form>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'participa.crear'])
@endsection
