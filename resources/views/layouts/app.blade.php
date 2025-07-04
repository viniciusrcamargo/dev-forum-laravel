<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js']) <!-- importa o bootstrap -->
</head>


<style>
    body.dark-mode {
    background-color: #121212;
    color: #ffffff;
}

body.dark-mode .card {
    background-color: #1e1e1e;
    border-color: #333;
}

body.dark-mode .card-title,
body.dark-mode .card-subtitle,
body.dark-mode .card-text {
    color: #ffffff;
}

</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('/build/assets/img/logo.png') }}" alt="Logo" width="35" height="35">
                    {{ config('app.name', 'Laravel') }}
                </a>
                @if(Auth::check())
                <div class="dropdown">
                    <!-- Botão/Link que aciona o dropdown -->
                    <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>Cadastros</span>
                        <!-- O texto do botão pode ser adicionado aqui se desejar, por exemplo: Adicionar -->
                    </button>

                    <!-- Painel do dropdown -->
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <!-- Item do menu: Adicionar Categoria -->
                        <li><a class="dropdown-item" href="{{ url('/categorias/create') }}">Adicionar Categoria</a></li>
                        <!-- Item do menu: Adicionar Dúvida -->
                        <li><a class="dropdown-item" href="{{ url('/duvidas/create') }}">Adicionar Dúvida</a></li>
                    </ul>
                </div>
                @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" id="toggle-theme">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <img src="{{ asset('/build/assets/img/login.png') }}" alt="Logo" width="35" height="35">
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li>
                            <div class="form-check form-switch ">
                                <input class="form-check-input mt-3" type="checkbox" id="darkModeSwitch">
                                <img src="{{ asset('/build/assets/img/modoescuro.png') }}" alt="imagem de lua" width="25" height="25" class="mt-2">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('toggle-theme');
        const body = document.body;

        // Verifica se o tema escuro já está salvo no localStorage
        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('dark-mode');
        }

        toggleButton.addEventListener('click', function () {
            body.classList.toggle('dark-mode');

            // Salva a preferência no localStorage
            if (body.classList.contains('dark-mode')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });
    });
</script>
</html>
