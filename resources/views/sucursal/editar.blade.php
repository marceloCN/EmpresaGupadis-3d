{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'editar-sucursal')

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
            <h2>Editar Sucursal</h2>
            <form method="POST" action="{{ route('sucursales.editar.guardar', $sucursal->s_id) }}">
                @csrf
                @method('PUT')
                @error('nombre')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="{{ $sucursal->s_nom }}" required>
                </div>
                @error('ubicacion')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Ubicacion:</label>
                    <input type="text" class="form-control" name="ubicacion" value="{{ $sucursal->s_ubic }}" required>
                </div>
                @error('descripcion')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" value="{{ $sucursal->s_des }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Modificar Sucursal</button>
            </form>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'sucursal.editar'])
@endsection
