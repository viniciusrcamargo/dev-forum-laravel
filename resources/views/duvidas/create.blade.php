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
<div class="card-body ">
    <form method="POST" action="{{ route('duvidas.store') }}" >
        @csrf
        <div class="container">
            <div class="mb-3 row">
                <div class="col-8">
                    <label for="tituloDuvida" class="form-label">Título da dúvida</label>
                    <input type="text" class="form-control " id="tituloDuvida" placeholder="Minha dúvida" name="titulo" required>
                </div>

                
                <div class="col-4">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select class="form-select" aria-label="Large select example" name="categoria_id" required>
                        <option selected disabled>Selecione a categoria</option>
                        @if (isset($categorias))
                        @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}" id="categoria_id" required>{{$categoria->nome}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="areaTextoDuvida" class="form-label">Descreva sua dúvida</label>
                <textarea class="form-control" id="areaTextoDuvida" rows="3" name="descricao" required></textarea>
            </div>
            <input type="hidden" class="form-control " id="idUsuario" placeholder="Minha dúvida" name="user_id" value="{{ Auth::user()->id }}">
            @if($categoria->id)
            <button type="submit" class="btn btn-outline-success btn-lg">Adicionar</button>
            @endif
        </div>
    </form>
</div>

@endsection