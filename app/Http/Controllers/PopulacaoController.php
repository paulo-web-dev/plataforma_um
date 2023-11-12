<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas; 
use App\Models\Setores;
use App\Models\SubSetores;
use App\Models\PopulacaoEmpresa;

class PopulacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formPopulacao($empresa){

        
        return view('form-populacao',[
            'empresa' => $empresa,
        ]);
    }


    public function uploadPopulacao(Request $request){

        $arquivo = $request->file;
        $empresa = PopulacaoEmpresa::where('id_empresa', $request->id_empresa)->get();
        foreach ($empresa as $key => $populacao) {
            
            PopulacaoEmpresa::destroy($populacao->id);
        }
        $i = 0;
        $path = $request->file('file')->store('diretorio'); 
        $tempFilePath = storage_path('app/'.$path);
        $dados_planilha = fopen($tempFilePath, "r");
        while($linha = fgetcsv($dados_planilha, 1000, ",")){
            if($i > 0){
                $populacao = new PopulacaoEmpresa();
                $populacao->id_empresa = $request->id_empresa;
                $populacao->nome = $linha[0];
                $populacao->idade = $linha[1];
                $populacao->sexo = $linha[2];
                $populacao->escolaridade = $linha[3];
                $populacao->tempo_empresa = $linha[4];
                $populacao->save();
           
            }
        $i++;
       
        }
        return redirect()->route('infoempresa', ['id' => $request->id_empresa]);
    }
}
