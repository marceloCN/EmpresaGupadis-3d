{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'editar-proyecto')

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
            <h2>Editar Modificacion del proyecto {{$proyecto->nom}}</h2>
            <form method="POST" action="{{ route('proyectos.editar.guardar', $proyecto->p_id) }}">
                @csrf
                @method('PUT')

                @error('name')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Nombre:</label>
                    <input type="text" class="form-control" name="name" value="{{ $proyecto->p_nom }}" required>
                </div>
                @error('descripcion')
                <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" value="{{ $proyecto->p_des }}" required>
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
                @error('fechaFin')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Modificar la Fecha de Finalizacion:</label>
                    <input type="date" class="form-control" name="fechaFin" value="{{ $proyecto->p_ffin }}" required>
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
                <button type="submit" class="btn btn-primary">Modificar del proyecto</button>
            </form>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'usuario.ModificarDatosPersonales'])
@endsection
