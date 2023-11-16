<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Instituicao;
use Illuminate\Support\Facades\Hash;
use Auth;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 

    public function formUsuarios($instituicao){

         
        return view('form-usuarios',[
            'instituicao' => $instituicao,
        ]);
    }

    
    public function showUsuarios(){

        $usuarios = User::where('id_instituicao', Auth::user()->id_instituicao)->get();
        $instituicao = Instituicao::where('id', Auth::user()->id_instituicao)->first();
        $num_usuarios = count($usuarios);


        return view('show-usuarios',[
            'usuarios' => $usuarios,
            'num_usuarios' => $num_usuarios,
            'max_usuarios' => $instituicao->num_usuarios, 
        ]);
    }



    public function infoUsuarios($id){

        $usuario = User::where('id', $id)->first();

        return view('info-usuario',[
            'usuario' => $usuario,
        ]);
    }

  
    public function updUsuarios(Request $request){


             $usuario = User::where('id', $request->id)->first();
             if(isset($request->senha)){
             $usuario->password = Hash::make($request->senha);
             }
             $usuario->name = $request->nome;
             $usuario->email = $request->email;
             $usuario->power = 0;
             $usuario->save();
             return redirect()->route('show-usuario'); 

            }

    public function cadUsuarios(Request $request){


        $usuario = new User();
        $usuario->password = Hash::make($request->senha);
        $usuario->name = $request->nome;
        $usuario->email = $request->email;
        $usuario->id_instituicao = $request->instituicao;
        $usuario->power = 0;
        $usuario->save();
        return redirect()->route('show-usuario'); 

}

    
    public function delete($id){
        User::destroy($id);
        return back();
    }
}
