@extends('layouts.app')

@section('content')
    <div class="container">
       
        <div class="card mt-4" >
            <div class="card-body">
                
                <h5 class="card-title">{{ $duvida->titulo }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $duvida->name }}</h6>
                <p class="card-text">{{ $duvida->descricao }}</p>
                <span class="badge {!! $duvida->status === 'aberta' ? 'text-bg-success' : 'text-bg-danger' !!}">{{ $duvida->status === 'aberta' ? 'aberta' : 'fechada' }}</span>
            </div>
        </div>
    </div>
@endsection