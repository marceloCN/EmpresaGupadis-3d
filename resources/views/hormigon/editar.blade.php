@extends('layauts.plantillaUser')

@section('title', 'editar-hormigon')

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
            <h2>Editar hormigon</h2>
            <form method="POST" action="{{ route('hormigon.editar.guardar', $hormigon->h_id) }}">
                @csrf
                @method('PUT')
                @error('nombre')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="{{ $hormigon->h_nom }}" required>
                </div>
                @error('tipo')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Tipo de Hormigon:</label>
                    <input type="text" class="form-control" name="tipo" value="{{ $hormigon->h_tip }}" required>
                </div>
                @error('descripcion')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" value="{{ $hormigon->h_des }}" required>
                </div>
                @error('precio')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating">
                    <label for="floatingInputGrid">Precio:</label>
                    <input type="number" class="form-control" name="precio" value="{{ $hormigon->h_pre }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Modificar Hormigon</button>
            </form>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'hormigon.editar'])
@endsection
