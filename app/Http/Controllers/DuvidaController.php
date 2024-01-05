<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {
        return view('duvidas.index');
    }

    
    public function create()
    {
        return view('duvidas.create');
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
