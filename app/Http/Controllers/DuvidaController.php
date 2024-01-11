<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Duvida;
use App\Models\Categoria;

class DuvidaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);//restringe acesso aos users autenticados exceto a index
        

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categorias = Categoria::query()->orderBy('nome')->get();
        $user = $request->user();
        dd($categorias);
        return view('duvidas.index')->with('categorias', $categorias)->with('user', $user);
    }

    
    public function create(Request $request)
    {
        $categorias = Categoria::query()->orderBy('nome')->get();
        $user = $request->user();
        return view('duvidas.create')->with('categorias', $categorias)->with('user', $user);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'duvida' => 'required|min:10'
        ]);

        return redirect('/duvidas/create')->with('status', 'Duvida enviada com sucesso!');
    }
}
