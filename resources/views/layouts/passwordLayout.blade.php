<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../images/logo-movi.png" type="image/png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cambio de Contraseña</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>
        .fondo {
            position: absolute;
            height: 25%;
            width: 80%;
            z-index: -2;
            top: 65%;
            left: 10%;
        }
        .fondo-gris {
            position: fixed;
            height: 100%;
            width: 100%;
            z-index: -1;
            background: rgba(255,255,255,.3);
        }
    </style>
</head>
<body style="background: white">
<div class="fondo-gris"></div>
<div id="app" >

    <main class="py-4">
        @yield('content')
    </main>
</div>

<footer style="background: black; z-index: 100; height: auto; width: 100%; position: fixed; bottom: 0">
    <div class="footer-content">
        <div class="container">
            <div class="d-flex flex-wrap bd-highlight justify-content-between mb-3">
                <div class="p-2 bd-highlight">
                    <a href="https://www.cdmx.gob.mx/" class="text-white" target="_blank"><span></span></a>
                    <a href="https://www.semovi.cdmx.gob.mx/" class="text-white" target="_blank"><span>SEMOVI</span> | <span>SISCORP</span></a>
                </div>
                <div class="p-2 bd-highlight text-white"><span></span></div>
                <div class="p-2 bd-highlight text-white">
                    Dirección: <br>
                    <span>Avenida Álvaro Obregón 269 Colonia Roma Norte, Alcaldía Cuauhtémoc C.P. 06700, Ciudad de México  </span>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
