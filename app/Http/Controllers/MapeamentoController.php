<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas; 
use App\Models\Mapeamento;


class MapeamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formMapeamento($empresa){

        
        return view('form-mapeamento',[
            'empresa' => $empresa,
        ]);
    }

    public function formMapeamentocampos($empresa){

         
        return view('info-mapeamento-campos',[
            'empresa' => $empresa,
        ]);
    }


    public function infoMapeamento($id){

        $mapeamento = Mapeamento::where('id', $id)->first();

        return view('info-mapeamento',[
            'mapeamento' => $mapeamento,
        ]);
    }

    public function uploadMapeamento(Request $request){
        try {
        $arquivo = $request->file;
        $empresa = Mapeamento::where('id_empresa', $request->id_empresa)->get();
        foreach ($empresa as $key => $populacao) {
            
            Mapeamento::destroy($populacao->id);
        }
        $i = 0;
        $path = $request->file('file')->store('diretorio'); 
        $tempFilePath = storage_path('app/'.$path);
        $dados_planilha = fopen($tempFilePath, "r");
        while($linha = fgetcsv($dados_planilha, 1000, ",")){
            if($i > 2){
             $mapeamento = new Mapeamento();
             $mapeamento->id_empresa = $request->id_empresa;
             $mapeamento->area = $linha[1];
             $mapeamento->setor = $linha[2];
             $mapeamento->posto_trabalho = $linha[3];
             $mapeamento->funcao = $linha[4];
             $mapeamento->atividade = $linha[5];
             $mapeamento->postura = $linha[6];
             $mapeamento->exigencia = $linha[7];
             $mapeamento->sobrecarga = $linha[8];
             $mapeamento->classificacao = $linha[9];
             $mapeamento->save();
            }
        $i++;
        
       
        }
        return redirect()->route('infoempresa', ['id' => $request->id_empresa]);

    } catch (\Exception $e) {
          
        return redirect()->route('infoempresa', ['id' => $request->id_empresa])->with('message', 'erro_planilha_mapeamento');
    }
    }

    public function updMapeamento(Request $request){


             $mapeamento = Mapeamento::where('id', $request->id)->first();
             $mapeamento->area = $request->area;
             $mapeamento->setor = $request->setor;
             $mapeamento->posto_trabalho = $request->posto_trabalho;
             $mapeamento->funcao = $request->funcao;
             $mapeamento->atividade = $request->atividade;
             $mapeamento->postura =$request->postura;
             $mapeamento->exigencia =$request->exigencia;
             $mapeamento->sobrecarga =$request->sobrecarga;
             $mapeamento->classificacao = $request->classificacao;
             $mapeamento->save();

        return redirect()->route('infoempresa', ['id' => $mapeamento->id_empresa]);
    }

    public function cadMapeamento(Request $request){


        $mapeamento = new Mapeamento();
        $mapeamento->id_empresa = $request->empresa;
        $mapeamento->area = $request->area;
        $mapeamento->setor = $request->setor;
        $mapeamento->posto_trabalho = $request->posto_trabalho;
        $mapeamento->funcao = $request->funcao;
        $mapeamento->atividade = $request->atividade;
        $mapeamento->postura =$request->postura;
        $mapeamento->exigencia =$request->exigencia;
        $mapeamento->sobrecarga =$request->sobrecarga;
        $mapeamento->classificacao = $request->classificacao;
        $mapeamento->save();

   return redirect()->route('infoempresa', ['id' => $mapeamento->id_empresa]);
}

    
    public function delete($id){
        Mapeamento::destroy($id);
        return back();
    }
}
