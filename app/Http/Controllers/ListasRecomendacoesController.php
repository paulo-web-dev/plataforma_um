<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListaRecomendacoes;
use Auth;
class ListasRecomendacoesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
        $recomendacoes = ListaRecomendacoes::all();
        return view('show-lista-recomendacoes', [
            'recomendacoes' => $recomendacoes,
        ]);
    } 

    public function formListaRecomendacoes(){
       

        return view('form-lista-recomendacoes');
    } 


    public function cadListaRecomendacoes(Request $request){

        $recomendacoes = $request->input('recomendacao', []);
        $id_instituicao = Auth::user()->id_instituicao;

        foreach ($recomendacoes as $recomendacaao) {
            $recomendacao = new ListaRecomendacoes();
            $recomendacao->instituicao = $id_instituicao;
            $recomendacao->recomendacao = $recomendacaao;
            $recomendacao->save();
        }        
        return redirect()->route('show-lista-recomendacoes'); 
    } 

    public function infoListaRecomendacoes($id){
        
        $recomendacao = ListaRecomendacoes::where('id', $id)->first();
        return view('info-lista-recomendacao',[
            'recomendacao' => $recomendacao,
        ]);

    }

    
    public function updListaRecomendacoes(Request $request){

        $recomendacao =  ListaRecomendacoes::where('id', $request->id)->first();
        $recomendacao->recomendacao = $request->recomendacao;
        $recomendacao->save();
        
        return redirect()->route('show-lista-recomendacoes'); 
    } 

            
    public function delete($id){
        ListaRecomendacoes::destroy($id);
        return back();
    }
}
