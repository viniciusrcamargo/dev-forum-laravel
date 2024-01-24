<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Duvida;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $duvidas = Duvida::query()->orderBy('created_at')->get();
        //dd($request);

        //  $duvidas = DB::table('duvidas')
        //     ->join('categorias', 'duvidas.categoria_id', '=', 'categorias.id')
        //    ->join('users', 'duvidas.user_id', '=', 'users.id')
        //      ->select('duvidas.*', 'categorias.nome', 'users.name')
        //      ->where('duvidas.id', '=', '$request->search')
        //   ->get();

        //dd($duvidas);
        return view('home')->with('duvidas', $duvidas);
    }
}
