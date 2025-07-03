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
            @isset($solucao)
            <div class="card card-body mt-5">
                <form method="POST" action="{{ route('solucoes.update', $solucao->id) }}" >
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="mb-3 row">
                            <div class="col-8">
                                <label for="tituloSolucao" class="form-label">Título da Solução</label>
                                <input type="text" class="form-control " id="tituloSolucao" placeholder="Minha dúvida" name="titulo"  
                                @isset($solucao)
                                    value="{{ $solucao->titulo }}"
                                @endisset required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="areaTextoDuvida" class="form-label">Descreva sua solução</label>
                            <textarea class="form-control" id="areaTextoDuvida" rows="3" name="descricao" required>{{$solucao->descricao}}</textarea>
                        </div>
                        <input type="hidden" name="id" value="{{ $solucao->id }}">
                        <button type="submit" class="btn btn-outline-warning btn-lg">Editar</button>
                        @endisset
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection