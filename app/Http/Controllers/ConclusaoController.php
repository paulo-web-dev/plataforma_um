<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conclusoes;
use App\Models\Mapeamento;
use App\Models\Empresas;
use App\Models\Setores;
use App\Models\SubSetores;  
class ConclusaoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $subsetor = SubSetores::where('id', $conclusao->id_subsetor)->with('setor')->with('funcao')->first();
        $mapeamento = new Mapeamento();
        $mapeamento->id_empresa = $subsetor->setor->empresa->id;
        $mapeamento->area = $subsetor->setor->area->nome;
        $mapeamento->setor = $subsetor->setor->nome;
        $mapeamento->posto_trabalho = $subsetor->nome;
        if(isset($subsetor->funcao->funcao)){
        $mapeamento->funcao = $subsetor->funcao->funcao;
      }else{
          $mapeamento->funcao = '';
      }
        $mapeamento->atividade = $request->atividade;
        $mapeamento->postura = '';
        $mapeamento->exigencia = '';
        $mapeamento->sobrecarga = '';
        $mapeamento->classificacao =  $conclusoes[$i - 1];
        $mapeamento->save();
        }else{
        $conclusao = new Conclusoes();
        $conclusao->id_subsetor = $request->id_subsetor;
        $conclusao->conclusao = $request->conclusao;
        $conclusao->membro = $request->membro;
        $conclusao->ferramenta = $request->ferramenta;
        $conclusao->atividade = $request->atividade;
        $conclusao->save();

        $subsetor = SubSetores::where('id', $conclusao->id_subsetor)->with('setor')->with('funcao')->first();
        $mapeamento = new Mapeamento();
        $mapeamento->id_empresa = $subsetor->setor->empresa->id;
        $mapeamento->area = $subsetor->setor->area->nome;
        $mapeamento->setor = $subsetor->setor->nome;
        $mapeamento->posto_trabalho = $subsetor->nome;
        if(isset($subsetor->funcao->funcao)){
        $mapeamento->funcao = $subsetor->funcao->funcao;
      }else{
          $mapeamento->funcao = '';
      }
        $mapeamento->atividade = $request->atividade;
        $mapeamento->postura = '';
        $mapeamento->exigencia = '';
        $mapeamento->sobrecarga = '';
        $mapeamento->classificacao = $request->conclusao;
        $mapeamento->save();
        
    }
    

    
        return redirect()->route('info-subsetor', ['id' => $id_subsetor])->with('secao', 'moore'); 
    } 

    public function updConclusao(Request $request){

    
        $conclusao = Conclusoes::where('id', $request->id)->first();
        $conclusao->conclusao = $request->conclusao;
        $conclusao->atividade = $request->atividade;
        $conclusao->save();
        
        
        return redirect()->route('info-subsetor', ['id' => $conclusao->id_subsetor])->with('secao', 'moore'); 
    } 

    
    public function delete($id){
        Conclusoes::destroy($id);
        return back();
    }
}
