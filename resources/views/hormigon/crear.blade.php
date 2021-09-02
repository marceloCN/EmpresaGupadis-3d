{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'crear-hormigon')

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
            <form method="POST" action="{{ route('hormigon.guardar') }}">
                @csrf
                @error('nombre')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Nombre del Hormigon:</label>
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
                </div>
                @error('tipo')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Tipo de Hormigon:</label>
                    <input type="text" class="form-control" name="tipo" value="{{ old('tipo') }}" required>
                </div>
                @error('descripcion')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required>
                </div>
                @error('precio')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating">
                    <label for="floatingInputGrid">Precio:</label>
                    <input type="number" class="form-control" name="precio" value="{{ old('precio') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear Hormigon</button>
            </form>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'hormigon.crear'])
@endsection
