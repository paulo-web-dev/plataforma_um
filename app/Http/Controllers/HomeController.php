<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Empresas;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home(){
    $user = User::where('id', Auth::user()->id)->with('instituicao')->first();
    $empresas = Empresas::where('id_user', Auth::user()->id_instituicao)
    ->with('setores')
    ->with('populacao')
    ->with('introducao')
    ->with('equipe')
    ->with('objetivos')
    ->with('disposicao')
    ->with('mapeamento')
    ->with('planodeacao')
    ->with('responsaveis')
    ->with('area')
    ->with('rodape')
    ->with('cabecalho')
    ->get();
        return view('home2',
        [   
            'user' => $user,
            'empresas' => $empresas,
        ]);
    }


    public function logout()
    { 
        
        Auth::logout() ; 
        return redirect()->route('home');              
        
    }
 
}
