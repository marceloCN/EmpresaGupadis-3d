{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'crear-lista-material')

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
            <h2>Crear lista de materiales</h2>
            <form method="POST" action="{{ route('coopera.guardar') }}">
                @csrf
                @error('proyecto')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Proyecto:</label>
                    <select class="custom-select" name="proyecto">
                        @foreach ($proyectos as $proyecto)
                            <option value="{{ $proyecto->p_id }}">{{ $proyecto->p_nom }}</option>
                        @endforeach
                    </select>
                </div>
                @error('empresa')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Empresa:</label>
                    <select class="custom-select" name="empresa">
                        @foreach ($empresas as $empresa)
                            <option value="{{ $empresa->em_id }}">{{ $empresa->em_nom }}</option>
                        @endforeach
                    </select>
                </div>
                @error('material')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Material:</label>
                    <select class="custom-select" name="material">
                        @foreach ($materiales as $material)
                            <option value="{{ $material->m_id }}">{{ $material->m_nom }}</option>
                        @endforeach
                    </select>
                </div>

                @error('cantidad')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Cantidad:</label>
                    <input type="number" class="form-control" name="cantidad" value="{{ old('cantidad') }}" required>
                </div>
                @error('precio')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating">
                    <label for="floatingSelectGrid">Precio</label>
                    <input type="number" class="form-control" name="precio" value="{{ old('precio') }}" required>
                </div>
                @error('fecha')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Fecha:</label>
                    <input type="date" class="form-control" name="fecha" value="{{ old('fecha') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'coopera.crear'])
@endsection
