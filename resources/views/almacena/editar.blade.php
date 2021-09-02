{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'editar-almacena')

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
            <form method="POST" action="{{ route('almacena.editar.guardar', $almacena->id_a) }}">
                @csrf
                @method('PUT')

                @error('descripcion')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Descripcion:</label>
                    <input type="text" class="form-control" name="descripcion" value="{{ $almacena->a_des }}" required>
                </div>
                @error('cantidad')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating">
                    <label for="floatingInputGrid">Cantidad:</label>
                    <input type="number" class="form-control" name="cantidad" value="{{ $almacena->a_cant }}" required>
                </div>
                @error('sucursal')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Sucursal:</label>
                    <select class="custom-select" name="sucursal">
                        @foreach ($sucursales as $sucursal)
                            <option value="{{ $sucursal->s_id }}">{{ $sucursal->s_nom }}</option>
                        @endforeach
                    </select>
                </div>
                @error('equipo')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Equipo:</label>
                    <select class="custom-select" name="equipo">
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->e_id }}">{{ $equipo->e_nom }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar la Modificacion</button>
            </form>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'almacena.editar'])
@endsection
