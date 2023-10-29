<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Introducao;

class IntroducaoController extends Controller
{
    public function formIntroducao($idempresa){

        return view('form-introducao',[
            'id_empresa' => $idempresa,
    ]);
    }

    public function cadIntroducao(Request $request){

        $introducao = new Introducao();
        $introducao->introducao = $request->introducao;
        $introducao->id_empresa = $request->id_empresa;
        $introducao->save();
        
        return redirect()->route('infoempresa', ['id' => $introducao->id_empresa]); 
    } 

    public function infoIntroducao($id){
        
        $introducao = Introducao::where('id', $id)->first();
        return view('info-introducao',[
            'introducao' => $introducao,
        ]);

    }

    
    public function updIntroducao(Request $request){

        $introducao =  Introducao::where('id', $request->id)->first();
        $introducao->introducao = $request->introducao;
        $introducao->save();
        
        return redirect()->route('infoempresa', ['id' => $introducao->id_empresa]); 
    } 

            
    public function delete($id){
        Introducao::destroy($id);
        return back();
    }
}
