<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth')->except(['index']);//restringe acesso aos users autenticados exceto a index
    }

    public function index(Request $request)
    {
        $categorias = Categoria::query()->orderBy('nome')->get();
        return view('categorias.index')->with('categorias', $categorias);
    }

    
    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $categoria = Categoria::create([
            'nome' => $request->nome
        ]);

        return redirect()->route('categorias.index');
    }

    public function edit(Categoria $categoria)
    {
        //dd($categoria);
        return view('categorias.edit')->with('categoria', $categoria);
    }

    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update([
            'nome' => $request->nome
        ]);

        return redirect()->route('categorias.index');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
