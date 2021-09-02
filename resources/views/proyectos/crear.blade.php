{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'crear-proyectos')

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
            <h2>Crear proyecto</h2>
            <form method="POST" action="{{ route('proyectos.guardar') }}">
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
                    <label for="floatingInputGrid">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required>
                </div>
                @error('estado')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating">
                    <label for="floatingSelectGrid">Estado</label>
                    <select class="custom-select" name="estado" aria-label="Floating label select example" required>
                        <option value="0" selected>En ejecucion</option>
                        <option value="1">Finalizado</option>
                    </select>
                </div>
                @error('fechaInicio')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Fecha inicio:</label>
                    <input type="date" class="form-control" name="fechaInicio" value="{{ old('fechaInicio') }}" required>
                </div>
                @error('fechaFin')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Fecha fin:</label>
                    <input type="date" class="form-control" name="fechaFin" value="{{ old('fechaFin') }}" required>
                </div>
                @error('sucursal')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Sucursal:</label>
                    <select class="custom-select" name="sucursal">
                        <option selected value="">Ninguna</option>
                        @foreach ($sucursales as $sucursal)
                            <option value="{{ $sucursal->s_id }}">{{ $sucursal->s_nom }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Crear proyecto</button>
            </form>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'proyecto.crear'])
@endsection
