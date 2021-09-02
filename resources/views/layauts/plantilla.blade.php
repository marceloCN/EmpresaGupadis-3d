<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lux/bootstrap.min.css" title="main">

    <title>@yield('title')</title>
    {{-- favicon --}}
    {{-- estilos --}}
    @yield('estilo')
</head>

<body>
    {{-- header --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="nav-link active text-danger" aria-current="page" href="/">Constructora Gupadis-3D</a>
            @if (Request::path() == '/'){{-- compara con el nombre de la URL --}}
                <a class="nav-link active bg-info text-black" aria-current="page" href="/">Home</a>
            @else
                <a class="nav-link active" aria-current="page" href="/">Home</a>
            @endif

            @if (Request::path() == 'nosotros'){{-- compara con el nombre de la URL --}}
                <a class="nav-link active bg-info text-black" aria-current="page"
                    href="{{ route('nosotros') }}">Nosotros</a>
            @else
                <a class="nav-link active" aria-current="page" href="{{ route('nosotros') }}">Nosotros</a>
            @endif

            @if (Request::path() == 'hormigon-premesclado'){{-- compara con el nombre de la URL --}}
                <a class="nav-link active bg-info text-black" aria-current="page"
                    href="{{ route('hormigon') }}">Hormigon Premesclado</a>
            @else
                <a class="nav-link active" aria-current="page" href="{{ route('hormigon') }}">Hormigon Premesclado</a>
            @endif

            @if (Request::path() == 'principales-proyectos'){{-- compara con el nombre de la URL --}}
                <a class="nav-link active bg-info text-black" aria-current="page"
                    href="{{ route('proyectos') }}">Principales Obras</a>
            @else
                <a class="nav-link active" aria-current="page" href="{{ route('proyectos') }}">Principales Obras</a>
            @endif

            @if (Request::path() == 'contacto'){{-- compara con el nombre de la URL --}}
                <a class="nav-link active bg-info text-black" aria-current="page"
                    href="{{ route('contacto') }}">Contacto</a>
            @else
                <a class="nav-link active" aria-current="page" href="{{ route('contacto') }}">Contacto</a>
            @endif

            <a class="nav-link active" aria-current="page" href="{{ route('usuario.ingresar') }}">Ingresar</a>

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
        </div>
    </nav>
    {{-- nav --}}

    @yield('content')
    {{-- footer --}}

    {{-- scrpt --}}
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
