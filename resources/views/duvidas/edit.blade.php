@extends('layouts.app')

@section('content')
<div class="card-body ">
    <form method="POST" action="{{ route('duvidas.update', $duvida->id) }}" >
        @csrf
        @method('PUT')
        <div class="container">
            <div class="mb-3 row">
                <div class="col-8">
                    <label for="tituloDuvida" class="form-label">Título da dúvida</label>
                    <input type="text" class="form-control " id="tituloDuvida" placeholder="Minha dúvida" name="titulo"
                    @isset($duvida)
                    value=" {{ $duvida->titulo }} "
                    @endisset required>
                </div>

                
                <div class="col-4">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select class="form-select" aria-label="Large select example" name="categoria_id" required>
                        <option selected disabled>{{ $duvida->nome }}</option>
                        @if (isset($categorias))
                        @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}" id="categoria_id">{{ $categoria->nome }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="areaTextoDuvida" class="form-label">Descreva sua dúvida</label>
                <textarea class="form-control" id="areaTextoDuvida" rows="3" name="descricao" required> 
                @isset($duvida)
                    {{ $duvida->descricao }}
                @endisset
                </textarea>
            </div>
            <input type="hidden" class="form-control " id="idUsuario" placeholder="Minha dúvida" name="user_id" value="{{ Auth::user()->id }}">
            
            <button type="submit" class="btn btn-outline-success btn-lg">Editar</button>
        </div>
    </form>
</div>

@endsection