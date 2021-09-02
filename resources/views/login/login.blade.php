<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
    <style>
      body{
        background: turquoise;
      }
    </style>
</head>
<body>
    <div class="row mt-5">
        <div class="col-6">
            <div class="col-9 mx-auto">
                <img src="logo.jpeg" class="img-rounded" alt="imagen del logo" width="500" height="236">
            </div>
            <h1 class="text-center fw-bolder text-danger" >CONSTRUCTORA GUPADIS-3D</h1>
            <h4 class="text-center">
                Nadie puede hacerlo como nosotros <br>
                Un mejor hogar, un mejor estilo de vida <br>
                Trabajamos hasta que estés satisfecho <br>
                Un trabajo nunca es grande o pequeño <br> 
                La forma correcta de construir.</h4>
                <div class="col-9 mx-auto">
                  <h3> <a class="text-center fw-bolder text-danger" href="/">Volver</a> </h3>
                </div>
        </div>
        
        <!-- col trabaja con lo que sobro -->
        <div class="col ">
            <div class="col-6 mt-5 mx-auto">
                <!-- metodo POST recibe datos de un formulario y lo almacena -->
                <form method="POST" action="{{route('usuario.ingresar')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Direccion de Correo</label>
                      <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                      <input name="password" type="password" class="form-control" id="exampleInputPassword1"/>
                      @if ($errors->any())
                        {{ $errors->first() }}
                      @endif 
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                  </form>
            </div>
        </div>
       
    </div>
    @include('layauts.vistas',['pagina'=>'login.ingresar'])
</body>
</html>