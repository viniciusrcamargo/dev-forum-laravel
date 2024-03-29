@extends('layouts.app')

@section('content')
<div class="card-body ">
    <form method="POST" action="{{ route('duvidas.store') }}" >
        @csrf
        <div class="container">
            <div class="mb-3 row">
                <div class="col-8">
                    <label for="tituloDuvida" class="form-label">Título da dúvida</label>
                    <input type="text" class="form-control " id="tituloDuvida" placeholder="Minha dúvida" name="titulo">
                </div>

                
                <div class="col-4">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select class="form-select" aria-label="Large select example" name="categoria_id">
                        <option selected disabled>Selecione a categoria</option>
                        @if (isset($categorias))
                        @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}" id="categoria_id">{{$categoria->nome}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="areaTextoDuvida" class="form-label">Descreva sua dúvida</label>
                <textarea class="form-control" id="areaTextoDuvida" rows="3" name="descricao"></textarea>
            </div>
            <!-- <input type="hidden" class="form-control " id="categoria_id" name="categoria_id" value="{{ $categoria->id }}"> -->
            <input type="hidden" class="form-control " id="idUsuario" placeholder="Minha dúvida" name="user_id" value="{{ Auth::user()->id }}">
            
            <button type="submit" class="btn btn-outline-success btn-lg">Adicionar</button>
        </div>
    </form>
</div>

@endsection