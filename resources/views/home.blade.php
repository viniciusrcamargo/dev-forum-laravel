@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="input-group input-group-lg">
                <input type="text" class="form-control" id="" placeholder="Título da dúvida..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Pesquisar</button>
                </div>
            </div>
        </div>

    @isset($duvidas)
    @foreach ($duvidas as $duvida)
        <a class="link-offset-2 link-underline link-underline-opacity-0" href="{{ route('duvida.index', $duvida->id) }}"">                              
            <div class="card mt-4" >
                <div class="card-body">
                    <h5 class="card-title">{{$duvida->titulo}}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $duvida->name }}</h6>
                    <p class="card-text">{{$duvida->descricao}}</p>
                    <span class="badge {!! $duvida->status === 'aberta' ? 'text-bg-success' : 'text-bg-danger' !!}">{{ $duvida->status === 'aberta' ? 'aberta' : 'fechada' }}</span>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-outline-info btn-sm me-md-2" type="submit">Conferir dúvida!</button>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
    @endisset
    </div>
@endsection

