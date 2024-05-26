<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Setores;
use App\Models\Funcao;
use App\Models\AnaliseAtividade;
use App\Models\DadosOrganizacionais;
use App\Models\Tarefa;
use App\Models\SubSetores;
use App\Models\PopulacaoSubsetor;
use App\Models\DadosSaude;
use App\Models\SegmentoCorporal;
use App\Models\Caracteristicas;
use App\Models\PreDiagnostico;
use App\Models\Mapeamento;
use App\Models\PlanoDeAcao;
use Auth;
class SubSetoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formSubSetores($idsetor){

        return view('form-subsetores',[
            'idsetor' => $idsetor,
    ]);
    }

    public function cadSubSetor(Request $request){
        
        $subsetor = new SubSetores();
        $subsetor->nome = $request->nome;
        $subsetor->descricao = $request->descricao;
        $subsetor->id_setor = $request->id_setor;
        $subsetor->save();
        
        return redirect()->route('info-setor', ['id' => $subsetor->id_setor]); 
    } 

    public function infoSubSetores($id){

       
       
        $subsetor = SubSetores::where('id', $id)
        ->with('dadosOrganizacionais')
        ->with('cargos')
        ->with('moore')
        ->with('caracteristicas')
        ->with('preDiagnostico')
        ->with('rula')
        ->with('owas')
        ->with('suerodgers')
        ->with('niosh')
        ->with('recomendacao')
        ->with('fotosatividade')
        ->with('populacaosubsetor')
        ->with('dadossaude')
        ->with('analiseAtividade')
        ->with('tarefa')
        ->with('funcao')
        ->with('descricaoFotos')
        ->with('ChecklistCadeira')
        ->with('ChecklistApoioPes')
        ->with('ChecklistComputador')
        ->with('ChecklistDocumentos')
        ->with('ChecklistIluminacao')
        ->with('ChecklistLeiaute')
        ->with('ChecklistMesa')
        ->with('ChecklistMonitor')
        ->with('ChecklistNotebook')
        ->with('ChecklistSistema')
        ->with('ChecklistSuporteTeclado')
        ->with('ChecklistTeclado')
        ->with('conclusao')
        ->first();  
        
       
        return view('info-subsetores',[
            'subsetor' => $subsetor,
            
        ]);

    }

    public function duplicarSubSetores($id){

       
       
        $subsetor = SubSetores::where('id', $id)
        ->with('dadosOrganizacionais')
        ->with('cargos')
        ->with('moore')
        ->with('caracteristicas')
        ->with('preDiagnostico')
        ->with('rula')
        ->with('owas')
        ->with('suerodgers')
        ->with('niosh')
        ->with('recomendacao')
        ->with('fotosatividade')
        ->with('populacaosubsetor')
        ->with('dadossaude')
        ->with('analiseAtividade')
        ->with('tarefa')
        ->with('funcao')
        ->with('descricaoFotos')
        ->with('ChecklistCadeira')
        ->with('ChecklistApoioPes')
        ->with('ChecklistComputador')
        ->with('ChecklistDocumentos')
        ->with('ChecklistIluminacao')
        ->with('ChecklistLeiaute')
        ->with('ChecklistMesa')
        ->with('ChecklistMonitor')
        ->with('ChecklistNotebook')
        ->with('ChecklistSistema')
        ->with('ChecklistSuporteTeclado')
        ->with('ChecklistTeclado')
        ->first();  
   
 
        //Definir Novo Subsetor
        $subsetornovo = new SubSetores();
        $subsetornovo->id_setor = $subsetor->id_setor;
        $subsetornovo->nome = $subsetor->nome. ' Duplicação';
        $subsetornovo->descricao = $subsetor->descricao;
        $subsetornovo->save();

        $subsetornovoID = $subsetornovo->id;

        //Definir Nova Função 
        if(isset($subsetor->funcao->funcao)){

        $funcao = new Funcao();
        $funcao->funcao = $subsetor->funcao->funcao;
        $funcao->id_subsetor = $subsetornovoID;
        $funcao->save();
        }
        //Definir nova Tarefa
        if(isset($subsetor->tarefa->tarefa)){
            
        $tarefa = new Tarefa();
        $tarefa->tarefa = $subsetor->tarefa->tarefa;
        $tarefa->id_subsetor = $subsetornovoID;
        $tarefa->save();

        }

        //Definir Analise 
        if(isset($subsetor->analiseAtividade->analise)){
        $analise = new AnaliseAtividade();
        $analise->analise = $subsetor->analiseAtividade->analise;
        $analise->id_subsetor = $subsetornovoID;
        $analise->save();
    }

       //Definir novos dados organizacionais
       foreach ($subsetor->dadosOrganizacionais as $dado) {
        $dados = new DadosOrganizacionais();
        $dados->id_subsetor = $subsetornovoID;
        $dados->dado = $dado->dado;
        $dados->save();
    }
  //Definir nova população
    foreach ($subsetor->populacaosubsetor as $pop) {
       
        $populacao = new PopulacaoSubsetor();
        $populacao->id_subsetor =  $subsetornovoID;
        $populacao->nome =  $pop->nome;
        $populacao->idade =  $pop->idade;
        $populacao->sexo =  $pop->sexo;
        $populacao->escolaridade =  $pop->escolaridade;
        $populacao->tempo_empresa =  $pop->tempo_empresa;
        $populacao->save();
       }
// Definir novos dados de saúde 
       if(isset($subsetor->dadossaude)){
        $dado = new DadosSaude();
        $dado->id_subsetor = $subsetornovoID;
        $dado->titulo = $subsetor->dadossaude->titulo;
        $dado->sim = $subsetor->dadossaude->sim;
        $dado->nao = $subsetor->dadossaude->nao;
        $dado->save();
        
        $segmentoa = SegmentoCorporal::where('id_dados_saude', $subsetor->dadossaude->id)->first();
        if(isset($segmentoa)){
        $segmento = new SegmentoCorporal();
        $segmento->id_dados_saude = $dado->id;
        $segmento->coluna_cervical = $segmentoa->coluna_cervical;
        $segmento->coluna_toracica = $segmentoa->coluna_toracica;
        $segmento->coluna_lombar = $segmentoa->coluna_lombar;
        $segmento->ombro = $segmentoa->ombro;
        $segmento->cotovelo = $segmentoa->cotovelo;
        $segmento->punho_mao = $segmentoa->punho_mao;
        $segmento->quadril = $segmentoa->quadril;  
        $segmento->joelho = $segmentoa->joelho;
        $segmento->tornozelo = $segmentoa->tornozelo;
        $segmento->save();
    }
       }

       //Definir novo ambiente de trabalho 
       foreach ($subsetor->caracteristicas as $caracteristica) {
       
            $caracteristicas = new Caracteristicas();
            $caracteristicas->titulo = $caracteristica->titulo;
            $caracteristicas->descricao = $caracteristica->descricao;
            $caracteristicas->id_subsetor = $subsetornovoID;
            $caracteristicas->save();
       }

       //Definir novo Pré Diagnóstico 
       foreach ($subsetor->preDiagnostico as $pre) {
       
        $prediagnostico = new PreDiagnostico();
        $prediagnostico->titulo = $pre->titulo;
        $prediagnostico->descricao = $pre->descricao;
        $prediagnostico->id_subsetor = $subsetornovoID;
        $prediagnostico->save();
   }


        return redirect()->route('info-setor', ['id' => $subsetornovo->id_setor ]);

    }
    public function updSubSetor(Request $request){

        $subsetor =  SubSetores::where('id', $request->id)->first();
        $empresas = Empresas::where('id_user', Auth::user()->id_instituicao)->get();
        $idsEmpresas = $empresas->pluck('id');

        $mapeamentos = Mapeamento::whereIn('id_empresa', $idsEmpresas)
        ->where('posto_trabalho', $subsetor->nome)
        ->get();
        $planos = PlanoDeAcao::whereIn('id_empresa', $idsEmpresas)
        ->where('posto_trabalho', $subsetor->nome)
        ->get();
        foreach ($mapeamentos as $key => $mapeamento) {
            $mapeamento->posto_trabalho = $request->nome;
            $mapeamento->save();
        }

        foreach ($planos as $key => $plano) {
            $plano->posto_trabalho = $request->nome;
            $plano->save();
        }
        $subsetor->nome = $request->nome;
        $subsetor->descricao = $request->descricao;
        $subsetor->save();

        return redirect()->route('info-subsetor', ['id' => $subsetor->id]); 
    }

    public function delete($id){
        SubSetores::destroy($id);
        return back();
    }
}
