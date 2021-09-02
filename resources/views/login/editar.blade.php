{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'editar-login-usuario')

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
            <h2>Editar cuenta de seccion</h2>
            <form method="POST" action="{{ route('login.editar.guardar', $login->ul_id) }}">
                @csrf
                @method('PUT')
                @error('correoCorporativo')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Correo corporativo:</label>
                    <input type="email" class="form-control" name="correoCorporativo" value="{{ $login->ul_acc }}" required>
                </div>
                @error('oldpassword')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Antigua contraseña:</label>
                    <input type="text" class="form-control" name="oldpassword" value="{{ $login->ul_pass }}" required>
                </div>
                @error('password')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating  mb-2">
                <label for="floatingInput">Nueva Contraseña:</label>
                <input required type="text" class="form-control" name="password"
                            value="{{ old('password') }}">
                </div>

                <button type="submit" class="btn btn-primary">Modificar Inicio de Session</button>
            </form>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'login.editarSeccion'])
@endsection
