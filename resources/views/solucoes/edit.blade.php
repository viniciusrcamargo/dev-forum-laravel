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
            @foreach($solucao as $duv)
            <div class="card card-body mt-5">
                <form method="POST" action="{{ route('solucoes.update', '$solucao.id') }}" >
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="mb-3 row">
                            <div class="col-8">
                                <label for="tituloSolucao" class="form-label">Título da Solução</label>
                                <input type="text" class="form-control " id="tituloSolucao" placeholder="Minha dúvida" name="titulo"  
                                @isset($solucao)
                                    value="{{ $solucao->nome }}"
                                @endisset required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="areaTextoDuvida" class="form-label">Descreva sua solução</label>
                            <textarea class="form-control" id="areaTextoDuvida" rows="3" name="descricao" value="{{$solucao->descricao}}" required></textarea>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-outline-success btn-lg">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection