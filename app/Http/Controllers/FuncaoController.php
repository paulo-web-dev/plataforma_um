<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Setores;
use App\Models\Funcao;

class FuncaoController extends Controller
{
    public function formFuncao($id_subsetor){

        return view('form-funcao',[
            'id_subsetor' => $id_subsetor,
    ]);
    } 

    public function cadFuncao(Request $request){

        $funcao = new Funcao();
        $funcao->funcao = $request->funcao;
        $funcao->id_subsetor = $request->id_subsetor;
        $funcao->save();
        
        return redirect()->route('info-subsetor', ['id' => $funcao->id_subsetor]); 
    } 

    public function infoFuncao($id){
        
        $funcao = Funcao::where('id', $id)->first();
        return view('info-funcao',[
            'funcao' => $funcao,
        ]);

    }

    
    public function updFuncao(Request $request){

        $funcao =  Funcao::where('id', $request->id)->first();
        $funcao->funcao = $request->funcao;
        $funcao->save();
        
        return redirect()->route('info-subsetor', ['id' => $funcao->id_subsetor]); 
    } 

    public function delete($id){
        Funcao::destroy($id);
        return back();
    }
}