{{-- es el index de hormigon --}}
@extends('layauts.plantillaUser')

@section('title', 'editar-datos-usuario')

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
            <h2>Editar Modificacion de datos</h2>
            <form method="POST" action="{{ route('usuario.editar.guardar', $usuario->ud_id) }}">
                @csrf
                @method('PUT')

                @error('name')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Nombre(s):</label>
                    <input type="text" class="form-control" name="name" value="{{ $usuario->ud_nom }}" required>
                </div>
                @error('apellido')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Apellidos:</label>
                    <input type="text" class="form-control" name="apellido" value="{{ $usuario->ud_app }}" required>
                </div>
                @error('direccion')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Direccion:</label>
                    <input type="text" class="form-control" name="direccion" value="{{ $usuario->ud_dir }}" required>
                </div>
                <div class="row g-2 mb-2">
                    <div class="col-md">
                        @error('correo')
                            <small>*{{ $message }}</small>
                        @enderror
                        <div class="form-floating">
                            <label for=" floatingInputGrid">Correo Personal:</label>
                            <input type="email" class="form-control" name="correo" value="{{ $usuario->ud_email }}"" required>
                                        </div>
                                    </div>
                                    <div class=" col-md">
                            <div class="form-floating">
                                <label for="floatingSelectGrid">Sexo</label>
                                <select class="custom-select" name="sexo" aria-label="Floating label select example" required>
                                    <option value="M" selected>Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2  mb-2">
                        <div class="col-md">
                            @error('carnet')
                                <small>*{{ $message }}</small>
                            @enderror
                            <div class="form-floating">
                                <label for="floatingInputGrid">Carnet de Identidad:</label>
                                <input type="text" class="form-control" name="carnet" value="{{ $usuario->ud_ci }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md">
                            @error('celular')
                                <small>*{{ $message }}</small>
                            @enderror
                            <div class="form-floating">
                                <label for="floatingInputGrid">Celular:</label>
                                <input type="text" class="form-control" name="celular" value="{{ $usuario->ud_telf }}"
                                    required>
                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->usuario_dato->id_tipo == 1)
                        @error('tipo')
                        <small>*{{ $message }}</small>
                        @enderror
                        <div class="form-floating mb-2">
                        <label for="floatingInputGrid">Tipo usuario:</label>
                            <select class="custom-select" required name="tipo">
                                <option value="1" selected>Administrador</option>
                                <option value="2">Empleado</option>
                                <option value="3">Cliente</option>
                            </select>
                        </div>
                    @endif
                <button type="submit" class="btn btn-primary">Modificar datos personales</button>
            </form>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'usuario.ModificarDatosPersonales'])
@endsection
