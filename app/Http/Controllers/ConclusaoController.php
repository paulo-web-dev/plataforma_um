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

        $id_subsetor = $request->input('id_subsetor');
        if($request->ferramenta == 'Sue Rodgers'){
                     
        $membros = $request->input('membro', []);
        $conclusoes = $request->input('conclusao', []);
        $ferramenta = $request->input('ferramenta');
        $atributos = count($membros);

        for ($i=0; $i < $atributos ; $i++) {   
            $conclusao = new Conclusoes();
            $conclusao->id_subsetor = $id_subsetor;
            $conclusao->conclusao = $conclusoes[$i];
            $conclusao->membro = $membros[$i];
            $conclusao->ferramenta = $ferramenta;
            $conclusao->atividade = $request->atividade;
            $conclusao->save();
        }
        }else{
        $conclusao = new Conclusoes();
        $conclusao->id_subsetor = $request->id_subsetor;
        $conclusao->conclusao = $request->conclusao;
        $conclusao->membro = $request->membro;
        $conclusao->ferramenta = $request->ferramenta;
        $conclusao->atividade = $request->atividade;
        $conclusao->save();
        
    }
        return redirect()->route('info-subsetor', ['id' => $id_subsetor]); 
    } 

    public function updConclusao(Request $request){

    
        $conclusao = Conclusoes::where('id', $request->id)->first();
        $conclusao->conclusao = $request->conclusao;
        $conclusao->atividade = $request->atividade;
        $conclusao->save();
        
        
        return redirect()->route('info-subsetor', ['id' => $conclusao->id_subsetor]); 
    } 

    
    public function delete($id){
        Conclusoes::destroy($id);
        return back();
    }
}
