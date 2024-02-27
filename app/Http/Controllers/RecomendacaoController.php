<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Recomendacao;
use App\Models\PlanoDeAcao;
use App\Models\Area;
use App\Models\Setores;
use App\Models\SubSetores; 
class RecomendacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formRecomendacao($id_subsetor){

        $recomendacoes = Recomendacao::selectRaw('TRIM(REPLACE(REPLACE(recomendacao, ".", ""), ";", "")) AS recomendacao_limpa')
        ->selectRaw('COUNT(*) AS total')
        ->groupByRaw('TRIM(REPLACE(REPLACE(recomendacao, ".", ""), ";", ""))')
        ->havingRaw('COUNT(*) > 5')
        ->orderByDesc('total')
        ->get(); 
        
        return view('form-recomendacao',[
            'id_subsetor' => $id_subsetor,
            'recomendacoes' => $recomendacoes,
    ]);
    } 

    public function cadRecomendacao(Request $request){
       
        $recomendacoes = $request->input('recomendacao', []);
        $id_subsetor = $request->input('id_subsetor');
        
        $subsetor = SubSetores::where('id', $id_subsetor)->with('setor')->with('funcao')->first();
        foreach ($recomendacoes as $recomendacaoTexto) {
            $recomendacao = new Recomendacao();
            $recomendacao->recomendacao = $recomendacaoTexto;
            $recomendacao->id_subsetor = $id_subsetor;
            $recomendacao->save();
            $plano = new PlanoDeAcao();
            $plano->id_empresa = $subsetor->setor->empresa->id;
            $plano->area = $subsetor->setor->area->nome;
            $plano->setor = $subsetor->setor->nome;
            $plano->posto_trabalho = $subsetor->nome;
            if(isset($subsetor->funcao->funcao)){
                $plano->funcao = $subsetor->funcao->funcao;
              }else{
                  $plano->funcao = '';
              }
            $plano->exigencia = '';
            $plano->recomendacao = $recomendacao->recomendacao;
            $plano->viabilidade = '';
            $plano->prazo = '';
            $plano->save();
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
        return back()->with('secao', 'recomendacao'); ;
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
