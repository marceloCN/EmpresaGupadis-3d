@extends('layauts.plantillaUser')

@section('title', 'Registrar usuario')

@section('content')
    <div class="col ">
        <div class="col-6 mt-2 mx-auto">
            <h2 class="col-6 mx-auto text-danger">REGISTRAR USUARIO</h2>
            <!-- metodo POST recibe datos de un formulario y lo almacena -->
            <form method="POST" action="{{ route('usuarios.CrearReg') }}">
                @csrf
                @error('name')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInput">Nombre(s):</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                </div>
                @error('apellido')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Apellidos:</label>
                    <input type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" required>
                </div>
                @error('direccion')
                    <small>*{{ $message }}</small>
                @enderror
                <div class="form-floating mb-2">
                    <label for="floatingInputGrid">Direccion:</label>
                    <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" required>
                </div>

                <div class="row g-2 mb-2">
                    <div class="col-md">
                        @error('correo')
                            <small>*{{ $message }}</small>
                        @enderror
                        <div class="form-floating">
                            <label for=" floatingInputGrid">Correo Personal:</label>
                            <input type="email" class="form-control" name="correo" value="{{ old('correo') }}"" required>
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
                                <input type="text" class="form-control" name="carnet" value="{{ old('carnet') }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md">
                            @error('celular')
                                <small>*{{ $message }}</small>
                            @enderror
                            <div class="form-floating">
                                <label for="floatingInputGrid">Celular:</label>
                                <input type="text" class="form-control" name="celular" value="{{ old('celular') }}"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2  mb-2">
                        <div class="col-md">
                            @error('correoCorporativo')
                                <small>*{{ $message }}</small>
                            @enderror
                            <div class="form-floating">
                                <label for="floatingInputGrid">Correo corporativo:</label>
                                <input type="email" class="form-control" name="correoCorporativo" required
                                    value="{{ old('correoCorporativo') }}">
                            </div>
                        </div>

                        <div class="col-md">
                            @error('password')
                                <small>*{{ $message }}</small>
                            @enderror
                            <div class="form-floating">
                                <label for="floatingInputGrid">Contraseña:</label>
                                <input required type="text" class="form-control" name="password"
                                    value="{{ old('password') }}">
                            </div>
                        </div>
                    </div>

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
                    <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </div>
    @include('layauts.vistas',['pagina'=>'usuario.crear'])
@endsection
