{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'editar-material')

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
            <h2>Editar material</h2>
            <form method="POST" action="{{ route('materiales.editar.guardar', $material->m_id) }}">
                @csrf
                @method('PUT')
                @error('nombre')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="{{ $material->m_nom }}" required>
                </div>
                @error('descripcion')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Descipcion:</label>
                    <input type="text" class="form-control" name="descripcion" value="{{ $material->m_des }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'material.editar'])
@endsection
