@extends('layouts.app')


@section('content')
<div class="container">
       
       <div class="card mt-4" >
           <div class="card-body">
               
               <h5 class="card-title">{{ $duvida->titulo }}</h5>
               <h6 class="card-subtitle mb-2 text-body-secondary">{{ $duvida->name }}</h6>
               <p class="card-text">{{ $duvida->descricao }}</p>
               <span class="badge {!! $duvida->status === 'aberta' ? 'text-bg-success' : 'text-bg-danger' !!}">{{ $duvida->status === 'aberta' ? 'aberta' : 'fechada' }}</span>
               @if(Auth::id() == $duvida->user_id)<!-- verificar user logado com user no banco -->
               <form action=" {{ route('duvidas.edit', $duvida->id) }} ">
               <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                   <button class="btn btn-outline-warning me-md-2" type="submit">Editar</button>
               </div>
               </form>
               @endif
           </div>
       </div>
   </div>


@endsection

