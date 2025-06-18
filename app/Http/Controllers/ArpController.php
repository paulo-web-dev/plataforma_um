<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\FuncionarioQuestionarioArp;
use App\Models\IdentificacaoArp;
use App\Models\QuestionarioRespostaArp;
use App\Models\QuestionarioPerguntaArp;
use App\Models\ResultadoRespostaArp;
use App\Models\TextosPadroesArp;

class ArpController extends Controller
{
     
    public function formArp($id){

        $empresa = Empresas::where('id', $id)->first();
        $perguntas = QuestionarioPerguntaArp::with('respostas')->get();
     
        return view('formularioarp', [
            'empresa' => $empresa, 
            'perguntas' => $perguntas,
        ]); 
    }

    public function cadForm(Request $request){
        $funcionario = new FuncionarioQuestionarioArp();
        $funcionario->nome = $request->nome;
        $funcionario->setor = $request->departamento;
        $funcionario->funcao = $request->funcao; 
        $funcionario->email = $request->email;
        $funcionario->id_empresa = $request->empresa; 
        $funcionario->save();

        foreach ($request->respostas as $key => $resposta) {
           $resultado = new ResultadoRespostaArp();
           $resultado->id_pergunta =  $key;
           $resultado->id_resposta =  $resposta;
           $resultado->id_func =  $funcionario->id;
           $resultado->id_empresa =  $request->empresa;
           $resultado->save();

        }

        return redirect()->route('form-arp-enviado');
    
    }

    public function formArpEnviado(){
        return view('formarpenviado');
    }

}
