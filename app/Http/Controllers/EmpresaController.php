<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresas;
use App\Models\Introducao;
use App\Models\Equipe;
use App\Models\Objetivos;
use App\Models\Disposicoes;
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
        $introducao->introducao = 'Podemos definir ergonomia como o estudo científico das relações entre homem e máquina, visando uma segurança e eficiência ideal no modo como um e outro interagem. Também pode ser definida como o trabalho multidisciplinar que, baseado num conjunto de ciências e tecnologias, procura o ajuste mútuo entre o ser humano em seu ambiente de trabalho de forma confortável, produtiva e segura, basicamente procurando adaptar o trabalho às pessoas (Couto, 2007). Sendo também um conjunto de estudos que visam à organização metódica do trabalho e das relações entre o homem e a máquina. Este trabalho tem o objetivo de levantar dados para análise ergonômica do trabalho nos ambientes da empresa, visando à integridade física e a saúde dos trabalhadores, analisandos agentes ergonômicos peculiares à atividade desenvolvida. A Legislação Brasileira, por meio da Secretaria de Segurança e Saúde no Trabalho, do Ministério do Trabalho, estabelece através da Portaria nº. 3.751/90 a Norma Regulamentadora número 17, parâmetros sobre Ergonomia e a obrigatoriedade da realização de uma análise ergonômica do trabalho. Segundo Ferro (2008), a análise Ergonômica do Trabalho se propõe à realização de uma análise das atividades em uma organização, tendo como pressuposto o que o trabalhador faz em todo o processo produtivo, identificando os riscos ergonômicos em que o mesmo se encontra exposto. Para sobreviver dentro de um mercado globalizado, as empresas tornam-se mais competitivas, dessa forma, a Ergonomia apresenta-se como uma estratégia para otimizar as condições de trabalho, minimizando os efeitos nocivos a saúde física e mental dos colaboradores e com isso, proporcionando maior participação dos mesmos em suas organizações. Um projeto ergonômico do posto de trabalho proporciona benefícios para a melhoria da qualidade e da competitividade das empresas, além de levar em consideração a preservação da saúde física, mental e social dos colaboradores, harmonizando a relação entre capital, trabalho e qualidade de vida. Ambientes de trabalho com projetos inadequados promovem a redução da eficiência, da Operação e da qualidade, consequentemente, oneram os custos da Operação e ainda aumentam o absenteísmo no setor. O presente trabalho foi elaborado pelo método de observação visual dos postos de trabalho, que foram posteriormente estudados e transformados em relatório, com considerações e constatações que corrigidas irão melhorar substancialmente as condições ergonômicas na realização das tarefas na empresa. Visa, portanto, à ergonomia do posto de trabalho, verificar as exigências biomecânicas posturais do trabalhador (boa postura, ferramentas e objetos ao alcance dos movimentos corporais) e o esforço físico exigido (fator mais importante, pois revela índice elevado de afastamento nas indústrias e outros setores), o tempo gasto na operação, a repetitividade dos movimentos, os acidentes na execução de tarefas, dores generalizadas para a execução das tarefas, principalmente nos músculos e tendões; as condições do ambiente de trabalho (iluminação, ruído, temperatura, etc., que possam causar sobrecarga ao trabalhador); transporte, armazenamento e levantamento de cargas, preocupando-se com a interface.';
        $introducao->save();
    //Insere Equipe
        $equipe = new Equipe();
        $equipe->id_empresa = $empresa->id;
        $equipe->equipe = 'O trabalho de levantamento físico e a elaboração deste documento foram realizados pela equipe técnica formada pela Sr.ª. Camila Rodrigues Silva, Fisioterapeuta – CREFITO 3/131278-F';
        $equipe->save();
    //Insere Disposição Final

        $disposicao = new Disposicoes();
        $disposicao->id_empresa = $empresa->id;
        $disposicao->disposicao = 'As considerações técnicas descritas nesta Análise Ergonômica do Trabalho retratam a situação do momento em que foram feitas as etapas de reconhecimento dos riscos ergonômicos. As etapas posteriores a serem realizadas devem ser juntadas a esta análise ergonômica base na forma de complementação deste trabalho. Todos os pontos levantados são frutos das observações feitas pelos profissionais durante sua visita nos postos de trabalho ou através de informações obtidas junto aos funcionários dos setores avaliados. As recomendações e sugestões, apresentadas nesta avaliação, tem por objetivo melhorar as condições de trabalho, proporcionando, qualidade de vida, segurança e prevenção de doenças ocupacionais dos funcionários da empresa. Os pontos emitidos, de modo algum, devem ser encarados como uma solução definitiva para os riscos ergonômicos existentes, pois pode haver alternativas que aplicadas simultaneamente implementarão uma melhor equação do problema.';
        $disposicao->save();

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
        ->first();
   
        if(count($empresa->populacao) > 0){
         
        $idade= 0;
        $tempoadmissão = 0;
        $sexom = 0;
        $sexof = 0;
        $escolaridadesg = 0;
        $escolaridadepg = 0;
        $escolaridadetg = 0;
        foreach ($empresa->populacao as $key => $populacao) {
                $idade +=  $populacao->idade;
                $tempoadmissão += $populacao->tempo_empresa;
                if($populacao->sexo == 'MASC.'){
                    $sexom += 1;
                }

                if($populacao->escolaridade == 'SEGUNDO GRAU (COLEGIAL) COMPLETO                  '){
                    $escolaridadesg += 1;
                }else{
                    $escolaridadepg += 1;
                }
        }
        $key += 1;
        $idademedia = round($idade/$key);
        $tempoadmissaomedio = round($tempoadmissão / $key);
        $porcentagemmasculino = porcentagem($sexom, $key);
        $porcentagemescolaridadesg = porcentagem($escolaridadesg, $key);
    }else{
        $idademedia =0;
        $tempoadmissaomedio = 0;
        $porcentagemmasculino =0;
        $porcentagemescolaridadesg = 0;
    }

    
        return view('infoempresa',
        [   
            'idademedia' => $idademedia,
            'tempoadmissaomedio' => $tempoadmissaomedio,
            'porcentagemmasculino' => $porcentagemmasculino,
            'porcentagemescolaridadesg' => $porcentagemescolaridadesg,
            'empresa' => $empresa
        ]); 
    }

    public function updempresa(Request $request){

        $empresa = Empresas::where('id', $request->id)->first();
        $empresa->nome = $request->nome;
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
