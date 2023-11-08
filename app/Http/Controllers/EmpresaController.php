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
use Auth;
use Illuminate\Support\Facades\Validator;
class EmpresaController extends Controller
{

    public function show(){

        $empresas = Empresas::all();
        
        return view('show-empresas',
        [
            'empresas' => $empresas
        ]); 
    }
 
    public function formempresa(){

        return view('form-empresa'); 
    }

    public function cadempresa(Request $request){
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
        $empresa->id_user = Auth::user()->id;
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
    //insere Introdução
        $introducao = new Introducao();
        $introducao->id_empresa = $empresa->id;
        $introducao->introducao = '<p>Segundo a Associação Brasileira de Ergonomia, a ergonomia é definida como o estudo da adaptação do trabalho às características fisiológicas e psicológicas do ser humano, tendo como principal função estabelecer normas e desenvolver leis para melhor formular as regras durante o trabalho.</p><p>A Ergonomia é uma disciplina orientada para uma abordagem sistêmica de aspectos da atividade humana. Assim, para intervir nas atividades de trabalho, torna necessário ter uma abordagem do trabalhador que incorpore aspectos físicos, cognitivos, sociais, organizacionais e do ambiente de trabalho. De forma geral, pode ser entendida como uma disciplina que tem como objetivo transformar o trabalho, em suas diferentes dimensões, adaptando-o às características e aos limites do ser humano, estudando tanto as condições prévias como as consequências do trabalho, como as interações que ocorrem entre o homem, máquina e ambiente de trabalho.</p><p>A especificidade da ergonomia reside na sua tensão entre dois objetivos: um centrado na organização que pode ser apreendida sob diferentes dimensões: eficiência, eficácia, produtividade, confiabilidade, qualidade; o outro é voltado para as pessoas e preocupa-se com a segurança, saúde, conforto, facilidade de uso, satisfação. Nenhuma outra disciplina explicita tão claramente para este duplo objetivo.</p><p>A ergonomia divide- se em três vertentes:</p><p><strong>Ergonomia Física</strong></p><p>Interessa-se pelas características da anatomia humana, antropometria, fisiologia, biomecânica e sua relação com a atividade física. Nessa categoria podemos situar o estudo da postura no trabalho, manuseio de materiais, movimentos repetitivos, distúrbios musculoesqueléticos relacionados ao trabalho, projeto de posto de trabalho, segurança e saúde.</p><p><strong>Ergonomia Cognitiva</strong></p><p>Refere-se ao processo mental, tal como percepção, memória, raciocínio e resposta motora, e seus efeitos nas interações entre seres humanos e outros elementos de um sistema. Os temas mais relevantes referem-se ao estudo da carga mental de trabalho, tomada de decisão, desempenho especializado, interação homem – computador, confiabilidade humana, estresse profissional.</p><p><strong>Ergonomia Organizacional</strong></p><p>Concerne à otimização dos sistemas sociotécnicos, incluindo suas estruturas organizacionais, regras e processos. Os tópicos abordados incluem comunicações, gerenciamento de recursos dos coletivos de trabalho, projeto de trabalho, organização temporal do trabalho, trabalho em grupo, projeto participativo, novos paradigmas do trabalho, trabalho cooperativo, cultura organizacional, organizações em rede, teletrabalho e gestão da qualidade.</p>';
        $introducao->save();
    //Insere Equipe
        $equipe = new Equipe();
        $equipe->id_empresa = $empresa->id;
        $equipe->equipe = 'O trabalho de levantamento físico e a elaboração deste documento foram realizados pela equipe técnica formada pela Sr.ª. Camila Rodrigues Silva, Fisioterapeuta – CREFITO 3/131278-F';
        $equipe->save();
    //Insere Disposição Final

        $disposicao = new Disposicoes();
        $disposicao->id_empresa = $empresa->id;
        $disposicao->disposicao = '<p>Os postos de trabalho analisados apresentam oportunidades de melhorias conforme descrição na análise. Devido às características do posto de trabalho e das atividades, constatou-se fatores que necessitam de modificações.</p><p>As recomendações do relatório seguem o princípio da correção dos pontos críticos e devem ser analisadas quanto a sua viabilidade, e substituídos caso necessário.</p><p>Os benefícios da implementação de melhorias ergonômicas estão diretamente ligados ao bem-estar dos usuários, bem como a possíveis ganhos de produtividade e qualidade de vida para o trabalhador.</p><p>&nbsp;</p><p><strong>RESPONSABILIDADES</strong></p><p>De posse das informações a empresa '.$empresa->nome.'., sendo responsável pela implantação das melhorias, compromete-se a cumprir as ações estabelecidas de acordo com a identificação dos riscos no ambiente de trabalho.</p>';
        $disposicao->save();

    //Insere Metodologia
        
        $metodologia = new Metodologia();
        $metodologia->id_empresa = $empresa->id;
        $metodologia->metodologia = '<p>Esta Análise Ergonômica do Trabalho, tem por finalidade não só atender as exigências legais (NR 17), como também, identificar as condições de trabalho nas dependências da empresa<strong> STAR SU DO BRASIL</strong>. modo a estabelecer parâmetros que permitam a adaptação de condições de trabalho, às características psicofisiológicas dos trabalhadores, proporcionando um máximo conforto, segurança e desempenho eficiente.&nbsp;</p><p>&nbsp; &nbsp; As condições de trabalho incluem aspectos relacionados ao levantamento, transporte e descarga de materiais, aos movimentos repetitivos, ao mobiliário, aos equipamentos e às condições ambientais dos postos de trabalho e a própria organização do trabalho.</p><p><strong>Documento de Consulta</strong>: Norma Regulamentadora - 17 e anexos I e II (NR 17 Norma Brasileira de Ergonomia), do Ministério da Economia – Secretaria do Trabalho.&nbsp;</p><ul><li>Conhecimento das condições de trabalho e as características do ambiente de trabalho de acordo com os parâmetros da NR 17 da Portaria 3214/78 do Ministério da Economia – Secretaria do Trabalho</li><li>Proporcionar autodiagnóstico que norteará a implantação de medidas técnicas e/ou educacionais no que tange a ergonomia, objetivando a neutralização ou minimização de eventuais condições desconfortáveis de forma a propiciar condições de trabalho adequadas e seguras e agradáveis aos seus colaboradores, além de maior produtividade a empresa.</li><li>Adaptar o posto de trabalho, os instrumentos, máquinas e o meio ambiente às condições do funcionário e empresa. A realização de tais objetivos, ao nível industrial, propicia uma facilidade do trabalho e um rendimento do esforço humano, reduzindo afastamentos, absenteísmo, aumento da motivação dos funcionários, melhoria da qualidade do produto e da produtividade.</li><li>Realizar um estudo detalhado dos postos e atividade trabalho a fim de detectar os fatores de riscos ocupacionais capazes de fornecer subsídios para as soluções ergonômicas para a empresa, adequando-a à legislação evitando assim possíveis ações trabalhistas, documentando a empresa com ações preventivas e legalizando a empresa de acordo com a NR17</li></ul>';
        $metodologia->save();
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
        ->with('ChecklistCadeira')
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

}
