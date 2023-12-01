<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Introducao;
use App\Models\Equipe;
use App\Models\Objetivos;
use App\Models\Disposicoes;
use App\Models\Metodologia;
use App\Models\Setores;
use App\Models\Textos;
use App\Models\Mapeamento;
use App\Models\PlanoDeAcao;
use App\Models\Demanda;
use Auth;
use Illuminate\Support\Facades\Validator;
class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){

        $empresas = Empresas::where('id_user', Auth::user()->id_instituicao)->get();
        
        return view('show-empresas',
        [
            'empresas' => $empresas
        ]); 
    }
 
    public function formempresa(){

        return view('form-empresa'); 
    }

    public function cadempresa(Request $request){
    $textos = Textos::where('id_instituicao', Auth::user()->id_instituicao)->first();

   
    //insere emrpresa
    $validator = Validator::make($request->all(), [

        'responsavel' => 'required',
        'nome' => 'required',
        'cnpj' => 'required',
        'telefone' => 'required',
        'num_funcionarios' => 'required',
        'setor' => 'required',
        'rua' => 'required',
        'cidade' => 'required',
        'uf' => 'required',
        'num' => 'required',
        'cep' => 'required',


    ],[
        'required' => 'O campo :attribute é obrigatório',
    ]);

    if ($validator->fails()) {

        return redirect()->route('formempresa')->withErrors($validator);

    }

        $empresa = new Empresas(); 
        $empresa->nome = $request->nome;
        $empresa->id_user = Auth::user()->id_instituicao;
        $empresa->titulo = $request->titulo;
        $empresa->periodo_inspecao = $request->periodo_inspecao;
        $empresa->cnpj = $request->cnpj;
        $empresa->telefone = $request->telefone;
        $empresa->responsavel =	$request->responsavel;
        $empresa->num_funcionarios = $request->num_funcionarios;
        $empresa->inscricao_estadual = $request->inscricao_estadual;
        $empresa->setor	= $request->setor;
        $empresa->rua = $request->rua;
        $empresa->cidade = $request->cidade;
        $empresa->numero = $request->num;
        $empresa->estado = $request->uf;
        $empresa->bairro = $request->bairro;
        $empresa->cep = $request->cep;
        $empresa->grau_de_risco = $request->grau_de_risco;
        if(isset($request->file)){
         $photoname = $request->file->getClientOriginalName();
         $empresa->photo = $photoname;
         $image = $request->file('file');
         $destinationPath = public_path('fotos-empresas/');
         $image->move($destinationPath, $photoname);
        }
        $empresa->save(); 
    //insere Textos Fixos 
        $introducao = new Introducao();
        $equipe = new Equipe();
        $disposicao = new Disposicoes();
        $metodologia = new Metodologia();

        //Insere ID Empresa
        $introducao->id_empresa = $empresa->id;
        $equipe->id_empresa = $empresa->id;
        $disposicao->id_empresa = $empresa->id;
        $metodologia->id_empresa = $empresa->id;
         //Insere Textos
         if(isset($textos)){
        
            $introducao->introducao = $textos->introducao;
            $equipe->equipe = $textos->equipe;
            $disposicao->disposicao = $textos->disposicao;
            $metodologia->metodologia = $textos->metodologia;
        }else{
            $introducao->introducao = '<p>Segundo a Associação Brasileira de Ergonomia, a ergonomia é definida como o estudo da adaptação do trabalho às características fisiológicas e psicológicas do ser humano, tendo como principal função estabelecer normas e desenvolver leis para melhor formular as regras durante o trabalho.</p><p>A Ergonomia é uma disciplina orientada para uma abordagem sistêmica de aspectos da atividade humana. Assim, para intervir nas atividades de trabalho, torna necessário ter uma abordagem do trabalhador que incorpore aspectos físicos, cognitivos, sociais, organizacionais e do ambiente de trabalho. De forma geral, pode ser entendida como uma disciplina que tem como objetivo transformar o trabalho, em suas diferentes dimensões, adaptando-o às características e aos limites do ser humano, estudando tanto as condições prévias como as consequências do trabalho, como as interações que ocorrem entre o homem, máquina e ambiente de trabalho.</p><p>A especificidade da ergonomia reside na sua tensão entre dois objetivos: um centrado na organização que pode ser apreendida sob diferentes dimensões: eficiência, eficácia, produtividade, confiabilidade, qualidade; o outro é voltado para as pessoas e preocupa-se com a segurança, saúde, conforto, facilidade de uso, satisfação. Nenhuma outra disciplina explicita tão claramente para este duplo objetivo.</p><p>A ergonomia divide- se em três vertentes:</p><p><strong>Ergonomia Física</strong></p><p>Interessa-se pelas características da anatomia humana, antropometria, fisiologia, biomecânica e sua relação com a atividade física. Nessa categoria podemos situar o estudo da postura no trabalho, manuseio de materiais, movimentos repetitivos, distúrbios musculoesqueléticos relacionados ao trabalho, projeto de posto de trabalho, segurança e saúde.</p><p><strong>Ergonomia Cognitiva</strong></p><p>Refere-se ao processo mental, tal como percepção, memória, raciocínio e resposta motora, e seus efeitos nas interações entre seres humanos e outros elementos de um sistema. Os temas mais relevantes referem-se ao estudo da carga mental de trabalho, tomada de decisão, desempenho especializado, interação homem – computador, confiabilidade humana, estresse profissional.</p><p><strong>Ergonomia Organizacional</strong></p><p>Concerne à otimização dos sistemas sociotécnicos, incluindo suas estruturas organizacionais, regras e processos. Os tópicos abordados incluem comunicações, gerenciamento de recursos dos coletivos de trabalho, projeto de trabalho, organização temporal do trabalho, trabalho em grupo, projeto participativo, novos paradigmas do trabalho, trabalho cooperativo, cultura organizacional, organizações em rede, teletrabalho e gestão da qualidade.</p>';
            $equipe->equipe = 'O trabalho de levantamento físico e a elaboração deste documento foram realizados pela equipe técnica formada pela Sr.ª. Camila Rodrigues Silva, Fisioterapeuta – CREFITO 3/131278-F';
            $disposicao->disposicao = '<p>Os postos de trabalho analisados apresentam oportunidades de melhorias conforme descrição na análise. Devido às características do posto de trabalho e das atividades, constatou-se fatores que necessitam de modificações.</p><p>As recomendações do relatório seguem o princípio da correção dos pontos críticos e devem ser analisadas quanto a sua viabilidade, e substituídos caso necessário.</p><p>Os benefícios da implementação de melhorias ergonômicas estão diretamente ligados ao bem-estar dos usuários, bem como a possíveis ganhos de produtividade e qualidade de vida para o trabalhador.</p><p>&nbsp;</p><p><strong>RESPONSABILIDADES</strong></p><p>De posse das informações a empresa '.$empresa->nome.'., sendo responsável pela implantação das melhorias, compromete-se a cumprir as ações estabelecidas de acordo com a identificação dos riscos no ambiente de trabalho.</p>';
            $metodologia->metodologia = '<p>A Análise Ergonômica do Trabalho é realizada por função e tarefa, através de técnica e metodologia específica, a partir da observação sistemática do ambiente laboral, da identificação do processo, da análise das atividades e da caracterização dos fatores biomecânicos, possibilitando &nbsp;assim, levantar os riscos existentes gerando recomendações de ações de melhorias à empresa. A metodologia de trabalho baseia-se:</p><p>&nbsp;</p><p><strong>MÉTODOS UTILIZADOS:</strong></p><p>OBSERVAÇÕES IN LOCO E FOTOS – ANÁLISE DA ATIVIDADE</p><p>A fim de se obter informações complementares e a confirmação dos dados obtidos até o momento registrados, foi realizada a observação dos trabalhadores em seus próprios postos de trabalho, de forma aleatória e durante um dia normal de trabalho. Foram observados os modos operatórios, o conteúdo das tarefas, o ritmo de trabalho, as exigências cognitivas.<br><br>MODO OPERATÓRIO – Observa neste item quais movimentos são realizados para completar o ciclo do trabalho (no início, meio e no fim da tarefa). Como na empresa existem tarefas diversificadas fizemos uma análise por setor e por atividade.<br><br><strong>CONTEÚDO DAS TAREFAS</strong> – Designa o modo como o trabalhador percebe as condições de seu trabalho: estimulante, monótono, aquém de suas capacidades, socialmente importante e outros. Na empresa alguns consideraram o trabalho monótono principalmente os que geram repetitividade, com grau leve de dificuldade e boa colaboração entre os funcionários.<br><strong>RITMO DE TRABALHO</strong> – Existe uma distinção entre ritmo e cadência. A cadência tem um aspecto quantitativo, o ritmo qualitativo. A cadência refere-se à velocidade dos movimentos quase repete em uma dada unidade de tempo, o ritmo é a maneira como as cadências são ajustadas ou arranjadas: pode ser livre (quando o indivíduo tem autonomia para determinar sua própria cadência) ou imposto (por uma máquina, pela esteira da linha de montagem e até por incentivos à Operação) - Teiger, 1985. Na empresa encontramos: o trabalho livre.<br><strong>EXIGÊNCIAS COGNITIVAS</strong> – Detectamos que quanto ao conhecimento, à percepção para a realização das atividades, a maioria dos colaboradores tinha um bom preparo para a efetivação do trabalho</p>';
        }
        
       //Salvar
        $equipe->save();
        $disposicao->save();
        $introducao->save();
        $metodologia->save();

        $demanda = new Demanda();
        $demanda->demanda = 'O departamento de recursos humanos da empresa '. $request->nome .', solicitou a análise ergonômica dos postos de trabalho, interessada em identificar as condições ergonômicas que os trabalhadores estão submetidos e as oportunidades de melhorias para a eliminação e/ou minimização dos mesmos.';
        $demanda->id_empresa =  $empresa->id;
        $demanda->save();
        
        return redirect()->route('infoempresa', ['id' => $empresa->id]);
    }


    public function infoempresa($id){
        

        function porcentagem($numero, $key){
            $porcentagem = ($numero/$key) * 100;

            return round($porcentagem);
        }
        $empresa = Empresas::where('id', $id)
        ->with('setores')
        ->with('populacao')
        ->with('introducao')
        ->with('equipe')
        ->with('objetivos')
        ->with('disposicao')
        ->with('mapeamento')
        ->with('planodeacao')
        ->with('responsaveis')
        ->with('area')
        ->first();


    
        return view('infoempresa',
        [   
            'empresa' => $empresa
        ]); 
    }

    public function updempresa(Request $request){

        $empresa = Empresas::where('id', $request->id)->first();
        $empresa->nome = $request->nome;
        $empresa->titulo = $request->titulo;
        $empresa->cnpj = $request->cnpj;
        $empresa->telefone = $request->telefone;
        $empresa->responsavel =	$request->responsavel;
        $empresa->num_funcionarios = $request->num_funcionarios;
        $empresa->setor	= $request->setor;
        $empresa->rua = $request->rua;
        $empresa->cidade = $request->cidade;
        $empresa->numero = $request->num;
        $empresa->estado = $request->uf;
        $empresa->bairro = $request->bairro;
        $empresa->cep = $request->cep;
        $empresa->inscricao_estadual = $request->inscricao_estadual;
        $empresa->periodo_inspecao = $request->periodo_inspecao;
        $empresa->grau_de_risco = $request->grau_de_risco;
        if(isset($request->file)){
            $photoname = $request->file->getClientOriginalName();
            $empresa->photo = $photoname;
            $image = $request->file('file');
            $destinationPath = public_path('fotos-empresas/');
            $image->move($destinationPath, $photoname);
        
           }
        $empresa->save(); 

        return redirect()->route('infoempresa', ['id' => $empresa->id]);
    }
    
    public function alteraordem(Request $request){

        foreach ($request->data as $key => $data) {
            $id = $data['id'];
            $ordenacao = $data['ordenacao'];
            $setor =  Setores::where('id', $id)->first();
            $setor->ordenacao = $ordenacao;
            $setor->save();
        }
        return "salvo com sucesso";
    }

    public function alteramapeamento(Request $request){

        $id = $request->id;
        $valor = $request->valor;
        $campo = $request->campo;
        $mapeamento = Mapeamento::where('id', $id)->first();
        if($campo == 'postura'){
            $mapeamento->postura = $valor;
        }elseif($campo == 'exigencia'){
            $mapeamento->exigencia = $valor;
        }elseif($campo == 'sobrecarga'){
            $mapeamento->sobrecarga = $valor;
        }
        $mapeamento->save();
        return 'ok';
    }

    public function alteraplano(Request $request){

        $id = $request->id;
        $valor = $request->valor;
        $campo = $request->campo;
        $plano = PlanoDeAcao::where('id', $id)->first();
        if($campo == 'exigencia'){
            $plano->exigencia = $valor;
        }elseif($campo == 'recomendacao'){
            $plano->recomendacao = $valor;
        }elseif($campo == 'viabilidade'){
            $plano->viabilidade = $valor;
        }elseif($campo == 'prazo'){
            $plano->prazo = $valor;
        }
        $plano->save();
        return 'ok';
    }
}
