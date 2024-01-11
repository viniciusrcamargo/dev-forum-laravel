@extends('layouts.app')

@section('content')
<div class="card-body ">
    <form method="POST" action="{{ route('duvidas.store') }}" >
        <div class="container">
            <div class="mb-3 row">
                <div class="col-8">
                    <label for="tituloDuvida" class="form-label">Título da dúvida</label>
                    <input type="email" class="form-control " id="tituloDuvida" placeholder="Minha dúvida">
                </div>
                
                <div class="col-4">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select class="form-select" aria-label="Large select example">
                    <option selected disabled>Selecione a categoria</option>
                    @if (isset($categorias))
                    @foreach ($categorias as $categoria)
                    <option value="1">{{$categoria->nome}}</option>
                    @endforeach
                    @endif
                    </select>
                </div>
            </div>
            

            <div class="mb-3">
                <label for="areaTextoDuvida" class="form-label">Descreva sua dúvida</label>
                <textarea class="form-control" id="areaTextoDuvida" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-success btn-lg">Adicionar</button>
        </div>
    </form>
</div>

@endsection