@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container">
            @foreach($duvida as $duv)
            <div class="card mt-4 opacity-50">
                <div class="card-body">
                    <h5 class="card-title">{{ $duv->titulo }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $duv->name }}</h6>
                    <p class="card-text">{{ $duv->descricao }}</p>
                    <span
                        class="badge {!! $duv->status === 'aberta' ? 'text-bg-success' : 'text-bg-danger' !!}">{{ $duv->status === 'aberta' ? 'aberta' : 'fechada' }}</span>
                </div>
            </div>
            
        
            <div class="card card-body mt-5">
                <form method="POST" action="{{ route('solucoes.store') }}" >
                    @csrf
                    <div class="container">
                        <div class="mb-3 row">
                            <div class="col-8">
                                <label for="tituloSolucao" class="form-label">Título da Solução</label>
                                <input type="text" class="form-control " id="tituloSolucao" placeholder="Minha dúvida" name="titulo" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="areaTextoDuvida" class="form-label">Descreva sua dúvida</label>
                            <textarea class="form-control" id="areaTextoDuvida" rows="3" name="descricao" required></textarea>
                        </div>
                        <input type="hidden" class="form-control " id="idUsuario" placeholder="Minha dúvida" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" class="form-control " id="duvida_id" placeholder="Minha dúvida" name="duvida_id" value="{{ $duv->id }}">
                        @endforeach
                        <button type="submit" class="btn btn-outline-success btn-lg">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection