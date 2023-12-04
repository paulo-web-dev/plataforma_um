<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Instituicao;
use Illuminate\Support\Facades\Hash;
use Auth;
class InscricaoController extends Controller
{
    public function show()
    {
        return view('form-inscricao');
    }

    public function cadInscricao(Request $request)
    {
        $hoje = date("Y-m-d");
        $semana = date("Y-m-d", strtotime($hoje . " +1 week"));
        $instituicao = new Instituicao();
        $instituicao->nome = $request->nome;
        $instituicao->num_usuarios = 1;
        $instituicao->final_assinatura = $semana;
        $instituicao->save();
        $usuario = new User();
        $usuario->password = Hash::make($request->password);
        $usuario->name = $request->nome;
        $usuario->email = $request->email;
        $usuario->id_instituicao = $instituicao->id;
        $usuario->power = 1;
        $usuario->save();
       
        $credentials = [
            'email' => $usuario->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            
            return redirect('/home'); 
        }else{
            return redirect('/login'); 
        }
        
    }
}
