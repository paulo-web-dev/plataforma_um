<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PopulacaoSubsetor;

class PopulacaoSubSetorController extends Controller
{
    public function formPopulacao($id_subsetor){

        
        return view('form-populacao-subsetor',[
            'id_subsetor' => $id_subsetor,
        ]);
    }


    public function formPopulacaoCampos($id_subsetor){

        
        return view('form-populacao-campos',[
            'id_subsetor' => $id_subsetor,
        ]);
    }


    public function infoPopulacao($id){

        $populacao = PopulacaoSubsetor::where('id', $id)->first();

        return view('info-populacao-subsetor',[
            'populacao' => $populacao,
        ]);
    }

    public function uploadPopulacao(Request $request){

    try {
        $arquivo = $request->file;
        $subsetor = PopulacaoSubsetor::where('id_subsetor', $request->id_subsetor)->get();
        foreach ($subsetor as $key => $populacao) {
            
            PopulacaoSubsetor::destroy($populacao->id);
        }
        $i = 0;
        $path = $request->file('file')->store('diretorio'); 
        $tempFilePath = storage_path('app/'.$path);
        $dados_planilha = fopen($tempFilePath, "r");
        while($linha = fgetcsv($dados_planilha, 1000, ",")){
            if($i > 0){
                $populacao = new PopulacaoSubsetor();
                $populacao->id_subsetor = $request->id_subsetor;
                $populacao->nome = $linha[0];
                $populacao->idade = $linha[1];
                $populacao->sexo = $linha[2];
                $populacao->escolaridade = $linha[3];
                $populacao->tempo_empresa = $linha[4];
                $populacao->save();
           
            }
        $i++;
       
        }
        return redirect()->route('info-subsetor', ['id' => $request->id_subsetor])->with('secao', 'populacao'); 

    } catch(\Exception $e){
        return redirect()->route('info-subsetor', ['id' => $request->id_subsetor])->with('message', 'erro_planilha'); 
    }
    }

    public function updPopulacao(Request $request){


                $populacao = PopulacaoSubsetor::where('id', $request->id)->first();
                $populacao->nome =  $request->nome;
                $populacao->idade =  $request->idade;
                $populacao->sexo =  $request->sexo;
                $populacao->escolaridade =  $request->escolaridade;
                $populacao->tempo_empresa =  $request->tempo_empresa;
                $populacao->save();
           

        return redirect()->route('info-subsetor', ['id' => $populacao->id_subsetor])->with('secao', 'populacao'); 
    }

    
    public function cadPopulacao(Request $request){


        $populacao = new PopulacaoSubsetor();
        $populacao->id_subsetor =  $request->id_subsetor;
        $populacao->nome =  $request->nome;
        $populacao->idade =  $request->idade;
        $populacao->sexo =  $request->sexo;
        $populacao->escolaridade =  $request->escolaridade;
        $populacao->tempo_empresa =  $request->tempo_empresa;
        $populacao->save();
   

        return redirect()->route('info-subsetor', ['id' => $populacao->id_subsetor])->with('secao', 'populacao'); 
}
    
    public function delete($id){
        PopulacaoSubsetor::destroy($id);
        return back();
    }
}
