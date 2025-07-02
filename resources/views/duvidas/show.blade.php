@extends('layouts.app')


@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-body">
            
            <h5 class="card-title">{{ $duvida->titulo }}</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $duvida->name }}</h6>
            <p class="card-text">{{ $duvida->descricao }}</p>
            <span
                class="badge {!! $duvida->status === 'aberta' ? 'text-bg-success' : 'text-bg-danger' !!}">{{ $duvida->status === 'aberta' ? 'aberta' : 'fechada' }}</span>
                @if(Auth::id() == $duvida->user_id)
            <!-- verificar user logado com user no banco -->
            <form action=" {{ route('duvidas.edit', $duvida->id) }} ">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end me-2 mb-2">
                    <button class="btn btn-outline-warning me-md-2" type="submit">Editar</button>
                </div>
            </form>
            @endif
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end me-2 mb-2">
            @if(Auth::id())
                <a class="btn bt-sm btn-outline-success" href="{{ route('solucoes.create', $duvida->id)}}">Solucionar</a>
            @endif
        </div>
    </div>
    @isset($solucoes)
    <h4 class="mt-4">Solução</h4>
    @foreach($solucoes as $solucao)
    <div class="card mt-4">
        <div class="card-body">
            
            <h5 class="card-title">{{ $solucao->titulo }}</h5>
            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $solucao->name }}</h6>
            <p class="card-text">{{ $solucao->descricao }}</p>
            <span
                class="badge {!! $duvida->status === 'aberta' ? 'text-bg-success' : 'text-bg-danger' !!}">{{ $duvida->status === 'aberta' ? 'aberta' : 'fechada' }}</span>
            @if(Auth::id() == $solucao->user_id)
            <!-- verificar user logado com user no banco -->
            <div class="d-grid gap-2 d-md-flex justify-content-md-end me-2 mb-2">
                <a href="{{ route('solucoes.edit', $solucao->id) }}" class="btn btn-outline-warning me-md-2 me-2 mb-2">Editar</a>
                <form action=" {{ route('solucoes.destroy', $solucao->id) }} " method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger me-md-2 me-2 mb-2" type="submit">Excluir</button>
                </form>
            </div>
            @endif
        </div>
        
    </div>
    @endforeach
    @else
    <h4 class="mt-4">Ainda não há soluções para esta dúvida.</h4>
    @endisset   
</div>


@endsection