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

        $recomendacao = new Recomendacao();
        $recomendacao->recomendacao = $request->recomendacao;
        $recomendacao->id_subsetor = $request->id_subsetor;
        $recomendacao->save();
        
        return redirect()->route('info-subsetor', ['id' => $recomendacao->id_subsetor]); 
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
        
        return redirect()->route('info-subsetor', ['id' => $recomendacao->id_subsetor]); 
    } 
}
