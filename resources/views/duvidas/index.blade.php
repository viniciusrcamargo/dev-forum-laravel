<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])
    <title>Fórum de dúvidas sobre Desenvolvimento de Sistemas</title>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/login') }}">
                <img src="{{ asset('/build/assets/img/logo.png') }}" alt="Logo" width="35" height="35">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Fórum de dúvidas sobre Desenvolvimento de Sistemas</a>
                    </li>
                   
                </ul>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="darkModeSwitch">
                <img src="{{ asset('/build/assets/img/modoescuro.png') }}" alt="imagem de lua" width="25" height="25">
            </div>
            <a class="btn btn-outline-primary" href="#" role="button">
            <img src="{{ asset('/build/assets/img/login.svg') }}" alt="Imagem LogIn" width="25" height="25">
            </a>
        </div>
    </nav>
    
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="input-group input-group-lg">
                <input type="text" class="form-control" id="" placeholder="Título da dúvida..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Pesquisar</button>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>