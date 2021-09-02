{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'crear-sucursal')

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
            <h2>Crear sucursal</h2>
            <form method="POST" action="{{ route('sucursales.guardar') }}">
                @csrf
                @error('nombre')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
                </div>
                @error('ubicacion')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Ubicacion:</label>
                    <input type="text" class="form-control" name="ubicacion" value="{{ old('ubicacion') }}" required>
                </div>
                @error('descripcion')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear sucursal</button>
            </form>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'sucursales.crear'])
@endsection
