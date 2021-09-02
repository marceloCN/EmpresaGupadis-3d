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
            <h2>Crear empresa</h2>
            <form method="POST" action="{{ route('empresas.guardar') }}">
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
                @error('ubicacion')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating">
                    <label for="floatingSelectGrid">Ubicacion</label>
                    <input type="text" class="form-control" name="ubicacion" value="{{ old('ubicacion') }}" required>
                </div>
                @error('email')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>
                @error('encargado')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Nombre encargado:</label>
                    <input type="text" class="form-control" name="encargado" value="{{ old('encargado') }}" required>
                </div>
                @error('telefono')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Telefono encargado:</label>
                    <input type="telf" class="form-control" name="telefono" value="{{ old('telefono') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear empresa</button>
            </form>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'empresa.crear'])
@endsection
