<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas; 
use App\Models\PlanoDeAcao;

class PlanoDeAcaoController extends Controller
{
    public function formPlanoDeAcao($empresa){

        
        return view('form-plano-de-acao',[
            'empresa' => $empresa,
        ]);
    }

    public function formPlanoDeAcaoCampos($empresa){

        
        return view('form-plano-de-acao-campos',[
            'empresa' => $empresa,
        ]);
    }

    public function infoPlanoDeAcao($id){

        $plano = PlanoDeAcao::where('id', $id)->first();
        return view('info-plano-de-acao',[
            'plano' => $plano,
        ]);
    }


    public function uploadPlanoDeAcao(Request $request){

       
 

        try {
            $arquivo = $request->file;
            

            $empresa = PlanoDeAcao::where('id_empresa', $request->id_empresa)->get();
            foreach ($empresa as $key => $populacao) {
                
                PlanoDeAcao::destroy($populacao->id);
            }
            $i = 0;
            $path = $request->file('file')->store('diretorio'); 
            $tempFilePath = storage_path('app/'.$path);
            $dados_planilha = fopen($tempFilePath, "r");
            while($linha = fgetcsv($dados_planilha, 1000, ",")){
                if($i > 2){
    
                 $plano = new PlanoDeAcao();
                 $plano->id_empresa = $request->id_empresa;
                 $plano->area = $linha[1];
                 $plano->setor = $linha[2];
                 $plano->posto_trabalho = $linha[3];
                 $plano->funcao = $linha[4];
                 $plano->exigencia = $linha[5];
                 $plano->recomendacao = $linha[6];
                 $plano->viabilidade = $linha[7];
                 $plano->prazo = $linha[8];
                 $plano->save();
             
                }
            $i++;
            
           
            }
            return redirect()->route('infoempresa', ['id' => $request->id_empresa]);
        
        } catch (\Exception $e) {
          
            return redirect()->route('infoempresa', ['id' => $request->id_empresa])->with('message', 'erro_planilha_plano');
        }

       
    }


    public function updPlanoDeAcao(Request $request){

       
        $plano = PlanoDeAcao::where('id', $request->id)->first();
        $plano->area = $request->area;
        $plano->setor = $request->setor;
        $plano->posto_trabalho = $request->posto_trabalho;
        $plano->funcao = $request->funcao;
        $plano->exigencia = $request->exigencia;
        $plano->recomendacao = $request->recomendacao;
        $plano->viabilidade = $request->viabilidade;
        $plano->prazo = $request->prazo;
        $plano->save();

        return redirect()->route('infoempresa', ['id' => $plano->id_empresa ]);
    }


    
    public function cadPlanoDeAcao(Request $request){

       
        $plano = new PlanoDeAcao();
        $plano->id_empresa = $request->empresa;
        $plano->area = $request->area;
        $plano->setor = $request->setor;
        $plano->posto_trabalho = $request->posto_trabalho;
        $plano->funcao = $request->funcao;
        $plano->exigencia = $request->exigencia;
        $plano->recomendacao = $request->recomendacao;
        $plano->viabilidade = $request->viabilidade;
        $plano->prazo = $request->prazo;
        $plano->save();

        return redirect()->route('infoempresa', ['id' => $request->empresa]);
    }

    public function delete($id){
        PlanoDeAcao::destroy($id);
        return back();
    }

}
