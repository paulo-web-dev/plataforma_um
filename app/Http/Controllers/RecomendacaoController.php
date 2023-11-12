<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Setores;
use App\Models\Recomendacao;
class RecomendacaoController extends Controller
{
    public function formRecomendacao($id_subsetor){

        return view('form-recomendacao',[
            'id_subsetor' => $id_subsetor,
    ]);
    } 

    public function cadRecomendacao(Request $request){
       
        $recomendacoes = $request->input('recomendacao', []);
        $id_subsetor = $request->input('id_subsetor');
    
        foreach ($recomendacoes as $recomendacaoTexto) {
            $recomendacao = new Recomendacao();
            $recomendacao->recomendacao = $recomendacaoTexto;
            $recomendacao->id_subsetor = $id_subsetor;
            $recomendacao->save();
        }
    
        return redirect()->route('info-subsetor', ['id' => $id_subsetor])->with('secao', 'recomendacao'); 
    }
    

    public function infoRecomendacao($id){
        
        $recomendacao = Recomendacao::where('id', $id)->first();
        return view('info-recomendacao',[
            'recomendacao' => $recomendacao,
        ]);

    }

    
    public function updRecomendacao(Request $request){

        $recomendacao =  Recomendacao::where('id', $request->id)->first();
        $recomendacao->recomendacao = $request->recomendacao;
        $recomendacao->save();
        
        return redirect()->route('info-subsetor', ['id' => $recomendacao->id_subsetor])->with('secao', 'recomendacao'); 
    } 

    public function delete($id){
        Recomendacao::destroy($id);
        return back();
    }

    public function alteraordem(Request $request){

        foreach ($request->data as $key => $data) {
            $id = $data['id'];
            $ordenacao = $data['ordenacao'];
            $recomendacao =  Recomendacao::where('id', $id)->first();
            $recomendacao->ordenacao = $ordenacao;
            $recomendacao->save();
        }
        return "salvo com sucesso";
    }
}
