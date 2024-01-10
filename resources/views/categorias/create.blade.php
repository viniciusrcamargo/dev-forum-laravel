@extends('layouts.app')

@section('content')
<div class="card-body ">
    <form method="POST" action="{{ route('categorias.store') }}" >
        @csrf
        <div class="container">
            <div class="mb-3 row">
                <div class="col-12">
                    <label for="nome" class="form-label">Nome da categoria</label>
                    <input type="text" class="form-control " id="nome" placeholder="Banco de dados..." name="nome">
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success btn-lg">Adicionar</button>
        </div>
    </form>
</div>

@endsection