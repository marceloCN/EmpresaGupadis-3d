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
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cosmo/bootstrap.min.css"
        integrity="sha384-5QFXyVb+lrCzdN228VS3HmzpiE7ZVwLQtkt+0d9W43LQMzz4HBnnqvVxKg6O+04d" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cyborg/bootstrap.min.css"
        integrity="sha384-nEnU7Ae+3lD52AK+RGNzgieBWMnEfgTbRHIwEvp1XXPdqdO6uLTd/NwXbzboqjc2" crossorigin="anonymous"> --}}
    <title>@yield('title')</title>

    <style>
        .estilo {
            color: red;
            font-family: 'Courier New', Courier, monospace;
        }

    </style>
</head>

<body>
    <h1 class="estilo">Bienvenido usuario: {{ auth()->user()->usuario_dato->ud_nom }}
        {{ auth()->user()->usuario_dato->ud_app }}</h1>
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
                    <li class="nav-item">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Usuarios</button>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="visually-hidden"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">{{-- {{route('usuario.registrar',$admin)}} --}}
                                @if (auth()->user()->usuario_dato->id_tipo == 1)
                                    <li><a class="dropdown-item" href="{{ route('usuario.registrar') }}">Registrar
                                            Nuevo Usuario</a></li>
                                    <li><a class="dropdown-item" href="{{ route('login.listar') }}">Listar login de
                                            los Usuarios</a></li>
                                @endif
                                <li><a class="dropdown-item"
                                        href="{{ route('login.editarSession', auth()->user()->usuario_dato->id_login) }}">
                                        Cambiar login session</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item"
                                        href="{{ route('usuario.editar', auth()->user()->usuario_dato->ud_id) }}">
                                        Modificar datos personales</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('usuario.verPerfil', auth()->user()->usuario_dato->ud_id) }}">
                                        Ver Perfil</a></li>
                                @if (auth()->user()->usuario_dato->id_tipo == 1 || auth()->user()->usuario_dato->id_tipo == 2)
                                    <li><a class="dropdown-item" href="{{ route('usuario.listar') }}">Listar todos los
                                            usuarios</a></li>
                                @endif
                                <div class="dropdown-divider"></div>
                                <li>
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Proyectos Participacion</button>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="visually-hidden"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                <a class="dropdown-item" href="{{ route('proyectos.listar') }}">Listar todos
                                    Proyectos</a>
                                @if (auth()->user()->usuario_dato->id_tipo == 1)
                                    <a class="dropdown-item" href="{{ route('proyectos.crear') }}">Crear proyecto</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                @if (auth()->user()->usuario_dato->id_tipo == 1 || auth()->user()->usuario_dato->id_tipo == 2)
                                    <a class="dropdown-item" href="{{ route('participa.crear') }}">Registrar
                                        participacion</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('participa.listar') }}">Listar
                                    Participantes</a>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Reportes Estadisticas Hormigon</button>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="visually-hidden"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                <a class="dropdown-item" href="{{ route('reporte.listar') }}">Listar Proyectos
                                    involucrados</a>
                                <a class="dropdown-item" href="{{ route('proyectos.estadistica') }}">generar
                                    estadistica</a>
                                <div class="dropdown-divider"></div>
                                @if (auth()->user()->usuario_dato->id_tipo == 1 || auth()->user()->usuario_dato->id_tipo == 2)
                                    <a class="dropdown-item" href="{{ route('hormigon.crear') }}">Registrar Nuevo
                                        Hormigon</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('hormigon.listar') }}">Listar Hormigon</a>
                                <a class="dropdown-item" href="{{ route('reporte.acceso') }}">Estadistica por pagina</a>
                            </ul>
                        </div>
                    </li>

                    @if (auth()->user()->usuario_dato->id_tipo == 1 || auth()->user()->usuario_dato->id_tipo == 2)
                        <li class="nav-item">
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary">Sucursal equipo almacenar</button>
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="visually-hidden"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference3">{{-- {{route('usuario.registrar',$admin)}} --}}
                                    <a class="dropdown-item" href="{{ route('sucursales.crear') }}">Crear
                                        sucursal</a>
                                    <a class="dropdown-item" href="{{ route('sucursales.listar') }}">Listar
                                        sucursales</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('equipos.crear') }}">Crear
                                        equipos</a>
                                    <a class="dropdown-item" href="{{ route('equipos.listar') }}">Listar
                                        equipos </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('almacena.crear') }}">Almacenar equipo en
                                        Sucursal</a>
                                    <a class="dropdown-item" href="{{ route('almacena.listar') }}">Ver equipo almacen
                                    </a>
                                </ul>
                            </div>
                        </li>
                    @endif
                    {{-- aki falta modificar un poco --}}
                    <li class="nav-item">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Empresa material costos</button>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="visually-hidden"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference3">
                                @if (auth()->user()->usuario_dato->id_tipo == 1 || auth()->user()->usuario_dato->id_tipo == 2)
                                    <a class="dropdown-item" href="{{ route('empresas.crear') }}">Crear
                                        empresa</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('empresas.listar') }}">Listar
                                    empresa afiliadas</a>
                                <div class="dropdown-divider"></div>
                                @if (auth()->user()->usuario_dato->id_tipo == 1 || auth()->user()->usuario_dato->id_tipo == 2)
                                    <a class="dropdown-item" href="{{ route('materiales.crear') }}">Crear
                                        material</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('materiales.listar') }}">Listar
                                    material guardado</a>
                                <div class="dropdown-divider"></div>
                                @if (auth()->user()->usuario_dato->id_tipo == 1 || auth()->user()->usuario_dato->id_tipo == 2)
                                    <a class="dropdown-item" href="{{ route('coopera.crear') }}">Crear material -
                                        empresa</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('coopera.listar') }}">Listar material -
                                    empresa</a>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Temas</button>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="visually-hidden"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference1">{{-- {{route('usuario.registrar',$admin)}} --}}
                                <li><a class="dropdown-item change-style-menu-item" href="#" rel="cosmo">Modo dia</a>
                                </li>
                                <li><a class="dropdown-item change-style-menu-item" href="#" rel="cyborg">Modo noche</a>
                                </li>
                                <li><a class="dropdown-item change-style-menu-item" href="#" rel="sketchy">Niño</a></li>
                                <li><a class="dropdown-item change-style-menu-item" href="#" rel="lux">Adultos</a></li>
                                <li><a class="dropdown-item change-style-menu-item" href="#" rel="simplex">Jovenes</a>
                                </li>
                                <li><a class="dropdown-item change-style-menu-item" href="#" rel="sketchy">Niño</a></li>
                        </div>
                    </li>
                </ul>
                <form class="d-flex" action="{{ route('buscar') }}" method='GET'>
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="busqueda">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    @if (session('mensaje'))
        <div class="card">
            <div class="card-body">
                {{ session('mensaje') }}
            </div>
        </div>
    @endif

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>

    <script>
        // const hour = moment().hour();
        // if (hour >= 6) && (hour <= 18) {
        //     set_theme('cosmo');
        // } else {
        //     set_theme('cyborg');
        // }

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
