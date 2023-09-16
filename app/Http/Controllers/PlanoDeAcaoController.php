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

    public function uploadPlanoDeAcao(Request $request){

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
    }

}
