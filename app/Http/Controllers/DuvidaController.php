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
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255', // Título é obrigatório e string, máx 255 caracteres
            'descricao' => 'required|string',    // Descrição é obrigatória e string
            'categoria_id' => 'required|exists:categorias,id', // <-- AQUI ESTÁ A VALIDAÇÃO PARA A CATEGORIA                                                     // No entanto, é mais seguro pegar o user_id do usuário autenticado (Auth::id())
        ], [
            'titulo.required' => 'O campo título é obrigatório.',
            'titulo.string' => 'O título deve ser um texto.',
            'titulo.max' => 'O título não pode ter mais de :max caracteres.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'descricao.string' => 'A descrição deve ser um texto.',
            'categoria_id.required' => 'É necessário selecionar uma categoria.',
            'categoria_id.exists' => 'A categoria selecionada não é válida. Por favor, escolha uma categoria existente.',
        ]);

        
        $duvidas = Duvida::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'categoria_id' => $request->categoria_id,
            'user_id' => $request->user_id
        ]);

        return redirect('/home');
    }

    public function update(Request $request)
    {
        // dd($request->all());
         $duvida = Duvida::find($request->id);
        $duvida->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'categoria_id' => $request->categoria_id,
        ])->where('id', $request->id);

        return redirect('/home');
    }

    public function edit($id)
    {
        $categorias = Categoria::query()->orderBy('nome')->get();

        $duvida = DB::table('duvidas')
            ->join('users', 'duvidas.user_id', '=', 'users.id')
            ->join('categorias', 'duvidas.categoria_id', '=', 'categorias.id')
            ->select('duvidas.*', 'users.name', 'categorias.nome')
            ->where('duvidas.id', '=', $id)
            ->first();
        // dd($duvida);
        return view('duvidas.edit')->with('duvida', $duvida)->with('categorias', $categorias);
    }

    public function show($id)
    {
        $duvida = Duvida::where('id', $id)->first();
        // $categorias = Categoria::query()->orderBy('nome')->get();
        
        return view('duvidas.show', compact('duvida'));
    }
}
