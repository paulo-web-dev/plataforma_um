<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conclusoes;

class ConclusaoController extends Controller
{

    public function formConclusao($idsubsetor, $ferramenta){
        
   
        return view('form-conclusao',[
            'id_subsetor' => $idsubsetor,
            'ferramenta' => $ferramenta,
    ]);
    }
    public function infoConclusao(Conclusoes $conclusao){
        
   
        return view('info-conclusao',[
            'conclusao' => $conclusao,
    ]);
    }
        
    public function cadConclusao(Request $request){

    
        $conclusao = new Conclusoes();
        $conclusao->id_subsetor = $request->id_subsetor;
        $conclusao->conclusao = $request->conclusao;
        $conclusao->membro = $request->membro;
        $conclusao->ferramenta = $request->ferramenta;
        $conclusao->atividade = $request->atividade;
        $conclusao->save();
        
        
        return redirect()->route('info-subsetor', ['id' => $conclusao->id_subsetor]); 
    } 

    public function updConclusao(Request $request){

    
        $conclusao = Conclusoes::where('id', $request->id)->first();
        $conclusao->conclusao = $request->conclusao;
        $conclusao->atividade = $request->atividade;
        $conclusao->save();
        
        
        return redirect()->route('info-subsetor', ['id' => $conclusao->id_subsetor]); 
    } 
}
