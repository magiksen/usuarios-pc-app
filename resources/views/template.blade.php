<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar PC Usuarios</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}
{{--    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
</head>
<body class="bg-gray-100">

    <div class="container px-4 mx-auto">
        <header class="py-5 px-4 bg-gray-200">
            <div class="flex items-center justify-between">
                <a href="#" class="flex justify-between items-center">
                    <img src="{{ asset('img/sudebip.png') }}" class="h-12">
                    Sudebip - Registro de Computadoras y Usuarios
                </a>
                <div class="flex justify-between items-center">
                    <a href="{{ route('inicio') }}" class="bg-gray-800 text-white rounded px-4 py-2 mr-2">Inicio</a>
                    <a href="{{ route('usuarios.index')}}" class="bg-gray-800 text-white rounded px-4 py-2">Registros</a>
                </div>
            </div>
        </header>
    </div>

    @yield('content')

</body>
</html>


