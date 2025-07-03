@extends('layouts.app')

@section('content')


<div class="container">
    <form id="search-form">
        <div class="input-group input-group-lg">
            <input type="text" class="form-control" name="search" id="search-input" placeholder="Título da dúvida...">
            <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
        </div>
    </form>

    <div id="duvidas-container">
        @foreach ($duvidas as $duvida)
        <a class="link-offset-2 link-underline link-underline-opacity-0"
            href="{{ route('duvidas.show', $duvida->id) }}">
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $duvida->titulo }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $duvida->name }}</h6>
                    <p class="card-text">{{ $duvida->descricao }}</p>
                    <span
                        class="badge {{ $duvida->status === 'aberta' ? 'text-bg-success' : 'text-bg-danger' }}">{{ $duvida->status }}</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>

@endsection