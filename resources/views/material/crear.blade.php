{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'crear-material')

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
            <h2>Crear material</h2>
            <form method="POST" action="{{ route('materiales.guardar') }}">
                @csrf
                @error('nombre')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
                </div>
                @error('descripcion')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Descipcion:</label>
                    <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear material</button>
            </form>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'material.crear'])
@endsection
