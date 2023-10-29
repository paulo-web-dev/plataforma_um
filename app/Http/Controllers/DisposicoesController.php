<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Disposicoes;

class DisposicoesController extends Controller
{
    public function formDisposicao($idempresa){

        return view('form-disposicao',[
            'id_empresa' => $idempresa,
    ]);
    }

    public function cadDisposicao(Request $request){

        $disposicao = new Disposicoes();
        $disposicao->disposicao = $request->disposicao;
        $disposicao->id_empresa = $request->id_empresa;
        $disposicao->save();
        
        return redirect()->route('infoempresa', ['id' => $disposicao->id_empresa]); 
    } 

    public function infoDisposicao($id){
        
        $disposicao = Disposicoes::where('id', $id)->first();
        return view('info-disposicao',[
            'disposicao' => $disposicao,
        ]);

    }

    
    public function updDisposicao(Request $request){

        $disposicao =  Disposicoes::where('id', $request->id)->first();
        $disposicao->disposicao = $request->disposicao;
        $disposicao->save();
        
        return redirect()->route('infoempresa', ['id' => $disposicao->id_empresa]); 
    } 


    
    public function delete($id){
        Disposicoes::destroy($id);
        return back();
    }
}
 