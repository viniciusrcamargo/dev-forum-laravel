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
    
public function index(Request $request)
{
    $query = Duvida::query();

    if ($request->filled('search')) {
        $query->where('titulo', 'like', '%' . $request->search . '%');
    }

    $duvidas = $query->orderBy('created_at', 'desc')->get();

    if ($request->ajax()) {
        return view('partials.duvidas', compact('duvidas'));
    }

    return view('home', compact('duvidas'));
}


}
