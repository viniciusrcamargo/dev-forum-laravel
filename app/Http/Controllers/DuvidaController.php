<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Duvida;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DuvidaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);//restringe acesso aos users autenticados exceto a index


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $duvida = Duvida::where('id', $id)->first();
        // return view('duvidas.index', compact('duvida'));
    }


    public function create(Request $request)
    {
        $categorias = Categoria::query()->orderBy('nome')->get();
        $user = $request->user();
        return view('duvidas.create')->with('categorias', $categorias)->with('user', $user);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        // $user = User::find(1);
        // $categoria = Categoria::find(1);
        $duvidas = Duvida::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'categoria_id' => $request->categoria_id,
            'user_id' => $request->user_id
        ]);

        return redirect('/home');
    }

    public function edit($id)
    {
        $duvida = Duvida::where('id', $id)->first();
        $categorias = Categoria::query()->orderBy('nome')->get();
        return view('duvidas.edit')->with('duvida', $duvida)->with('categorias', $categorias);
    }

    public function show($id)
    {
        $duvida = Duvida::where('id', $id)->first();
    
        return view('duvidas.show', compact('duvida'));
    }
}
