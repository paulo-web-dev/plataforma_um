<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Setores;


class SetoresController extends Controller
{
    public function formSetores($idempresa){

        return view('form-setores',[
            'id_empresa' => $idempresa,
    ]);
    }

    public function cadSetor(Request $request){

        $setor = new Setores();
        $setor->nome = $request->nome;
        $setor->descricao = $request->descricao;
        $setor->id_empresa = $request->id_empresa;
        $setor->save();
        
        return redirect()->route('infoempresa', ['id' => $setor->id_empresa]); 
    } 

    public function infoSetores($id){
        
        $setor = Setores::where('id', $id)->with('subsetores')->first();
        return view('info-setor',[
            'setor' => $setor,
        ]);

    }

    
    public function updSetor(Request $request){

        $setor =  Setores::where('id', $request->id)->first();
        $setor->nome = $request->nome;
        $setor->descricao = $request->descricao;
        $setor->save();
        
        return redirect()->route('info-setor', ['id' => $setor->id]); 
    } 
    
}
