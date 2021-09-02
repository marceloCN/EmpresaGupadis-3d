<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lux/bootstrap.min.css" title="main">

    <title>@yield('title')</title>

    <style>
        .estilo {
            color: red;
            font-family: 'Courier New', Courier, monospace;
        }

    </style>
</head>

<body>
    <h1 class="estilo">Bienvenido usuario: {{ $admin->ud_nom }} {{ $admin->ud_app }}</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            {{-- <a class="navbar-brand" href="{{route('usuario.login')}}">Administrador</a> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary">Usuarios</button>
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="visually-hidden"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">{{-- {{route('usuario.registrar',$admin)}} --}}
                            <li><a class="dropdown-item"
                                    href="{{ route('usuario.registrar', $admin->ud_id) }}">Registrar
                                    Nuevo Usuario</a></li>
                            <li><a class="dropdown-item" href="#">Eliminar Usuario</a></li>
                            <li><a class="dropdown-item" href="#">Listar login Usuario</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Modificar contraseña</a></li>
                            <li><a class="dropdown-item" href="#">Ver Perfil</a></li>
                            <li><a class="dropdown-item" href="#">Listar Usuarios</a></li>
                        </ul>
                    </div>

                    <li class="nav-item">
                        @if (Request::path() == 'pc_proyecto')
                            <a class="nav-link bg-secondary text-white" aria-current="page" href="#">Proyectos</a>
                        @else
                            <a class="nav-link" aria-current="page" href="#">Proyectos</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if (Request::path() == 'pc_participa')
                            <a class="nav-link bg-secondary text-white" href="#">Participantes</a>
                        @else
                            <a class="nav-link" href="#">Participantes</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if (Request::path() == 'pc_hormigon')
                            <a class="nav-link bg-secondary text-white" href="#">Hormigon</a>
                        @else
                            <a class="nav-link" href="#">Hormigon</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if (Request::path() == 'pc_sucursal')
                            <a class="nav-link bg-secondary text-white" href="#">Sucursal</a>
                        @else
                            <a class="nav-link" href="#">Sucursal</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if (Request::path() == 'pc_empresa')
                            <a class="nav-link bg-secondary text-white" href="#">Empresas</a>
                        @else
                            <a class="nav-link" href="#">Empresas</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Temas</button>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="visually-hidden"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference1">{{-- {{route('usuario.registrar',$admin)}} --}}
                                <li><a class="dropdown-item change-style-menu-item" href="#" rel="lux">Adultos</a></li>
                                <li><a class="dropdown-item change-style-menu-item" href="#" rel="simplex">Jovenes</a>
                                </li>
                                <li><a class="dropdown-item change-style-menu-item" href="#" rel="sketchy">Niño</a></li>
                        </div>
                    </li>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        function supports_html5_storage() {
            try {
                return 'localStorage' in window && window['localStorage'] !== null;
            } catch (e) {
                return false;
            }
        }

        var supports_storage = supports_html5_storage();

        function set_theme(theme) {
            $('link[title="main"]').attr('href', theme);
            if (supports_storage) {
                localStorage.theme = theme;
            }
        }
        jQuery(function($) {
            $('body').on('click', '.change-style-menu-item', function() {
                var theme_name = $(this).attr('rel');
                var theme = "//cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/" + theme_name +
                    "/bootstrap.min.css";
                set_theme(theme);
            });
        });

        if (supports_storage) {
            var theme = localStorage.theme;
            if (theme) {
                set_theme(theme);
            }
        } else {
            /* Don't annoy user with options that don't persist */
            $('#theme-dropdown').hide();
        }
    </script>
</body>

</html>
