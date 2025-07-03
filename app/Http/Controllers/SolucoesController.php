<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solucoes;
use App\Models\Duvida;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SolucoesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//restringe acesso aos users autenticados exceto a index
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
        $duvida = Duvida::query()->orderBy('id')->get();
        $user = $request->user();
       
        return view('solucoes.create')->with('duvida', $duvida)->with('user', $user);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255', // Título é obrigatório e string, máx 255 caracteres
            'descricao' => 'required|string',    // Descrição é obrigatória e string
            'duvida_id' => 'required|exists:duvidas,id', // <-- AQUI ESTÁ A VALIDAÇÃO PARA A CATEGORIA                                                     // No entanto, é mais seguro pegar o user_id do usuário autenticado (Auth::id())
        ], [
            'titulo.required' => 'O campo título é obrigatório.',
            'titulo.string' => 'O título deve ser um texto.',
            'titulo.max' => 'O título não pode ter mais de :max caracteres.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'descricao.string' => 'A descrição deve ser um texto.',
            'duvida_id.required' => 'É necessário selecionar uma dúvida.',
            'dúvida_id.exists' => 'A dúvida selecionada não é válida. Por favor, escolha uma categoria existente.',
        ]);

        
        $solucoes = Solucoes::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'duvida_id' => $request->duvida_id,
            'user_id' => $request->user_id
        ]);

        return redirect('/home');
    }

    public function update(Request $request)
    {
        //dd($request->all());
         $solucao = Solucoes::find($request->id);
        $solucao->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
        ])->where('id', $request->id);

        return redirect('/home');
    }

    public function edit(Solucoes $solucao, $id)
    {   

        $solucao = Solucoes::find($id);
        if (!$solucao) {
            return redirect()->back()->with('error', 'Solução não encontrada.');
        }
        return view('solucoes.edit')->with('solucao', $solucao);
    }

    

    public function destroy($id)
    {
        $solucao = Solucoes::find($id);
        if ($solucao) {
            $solucao->delete();
            return redirect()->back()->with('success', 'Solução deletada com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Solução não encontrada.');
        }
    }
}