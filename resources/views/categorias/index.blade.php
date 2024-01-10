@extends('layouts.app')

@section('content')
<div class="container">
<div class="card-body ">
    <ul class="list-group" >
        @foreach ($categorias as $categoria)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$categoria->nome}}

                <span class="d-flex">
                    <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-primary btn-sm">E</a>

                    <form action="{{ route('categorias.destroy', $categoria->id)}}" method="post" class="ms-2">
                    @csrf
                        @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        X
                    </button>
                </form>
                </span>

            </li>
        @endforeach
    </ul>
</div>
</div>


@endsection