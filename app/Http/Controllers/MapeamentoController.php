<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas; 
use App\Models\Mapeamento;
use App\Models\Area;

class MapeamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function formMapeamento($empresa){

        
        return view('form-mapeamento',[
            'empresa' => $empresa,
        ]);
    }

    public function formMapeamentocampos($empresa){

         
        return view('info-mapeamento-campos',[
            'empresa' => $empresa,
        ]);
    }


    public function infoMapeamento($id){

        $mapeamento = Mapeamento::where('id', $id)->first();

        return view('info-mapeamento',[
            'mapeamento' => $mapeamento,
        ]);
    }

    
    public function gerarMapeamento($empresa){
        $empresas = Mapeamento::where('id_empresa', $empresa)->get();
        foreach ($empresas as $key => $populacao) {
            
            Mapeamento::destroy($populacao->id);
        }
        $areas = Area::where('id_empresa', $empresa)->with('setores')->get();

      
        foreach ($areas as $key => $area) {
            foreach ($area->setores as $key => $setor) {
                foreach ($setor->subsetores as $key => $subsetor) {

                    //Conclusões Checklist
                    if(isset($subsetor->ChecklistCadeira)) {
                    
                        if(isset($subsetor->funcao->funcao)){
                            $mapeamento = new Mapeamento();
                            $mapeamento->id_empresa = $empresa;
                            $mapeamento->area = $area->nome;
                            $mapeamento->setor = $setor->nome;
                            $mapeamento->posto_trabalho = $subsetor->nome;
                            $mapeamento->funcao = $subsetor->funcao->funcao;
                            $mapeamento->atividade = $subsetor->ChecklistCadeira->atividade;
                            $mapeamento->postura = '';
                            $mapeamento->exigencia = '';
                            $mapeamento->sobrecarga = '';
                            $mapeamento->classificacao = $subsetor->ChecklistCadeira->resultado;
                            $mapeamento->save();
                           
                        }else{
                            $mapeamento = new Mapeamento();
                            $mapeamento->id_empresa = $empresa;
                            $mapeamento->area = $area->nome;
                            $mapeamento->setor = $setor->nome;
                            $mapeamento->posto_trabalho = $subsetor->nome;
                            $mapeamento->funcao ='';
                            $mapeamento->atividade = $subsetor->ChecklistCadeira->atividade;
                            $mapeamento->postura = '';
                            $mapeamento->exigencia = '';
                            $mapeamento->sobrecarga = '';
                            $mapeamento->classificacao = $subsetor->ChecklistCadeira->resultado;
                           $mapeamento->save();
                           
                        }
                    }
                    //Conclusões Moore e Garg
                    foreach ($subsetor->moore as $key => $moore) {
                        $fit = $moore->fit;
                        $fde = $moore->fde;
                        $ffe = $moore->ffe;
                        $fpmp = $moore->fpmp;
                        $fri = $moore->fri;
                        $fdt = $moore->fdt;
                        $index = $moore->id;
                        $conclusao = mooregarg($fit, $fde, $ffe, $fpmp, $fri, $fdt);
                        if(isset($subsetor->funcao->funcao)){
                            $mapeamento = new Mapeamento();
                            $mapeamento->id_empresa = $empresa;
                            $mapeamento->area = $area->nome;
                            $mapeamento->setor = $setor->nome;
                            $mapeamento->posto_trabalho = $subsetor->nome;
                            $mapeamento->funcao = $subsetor->funcao->funcao;
                            $mapeamento->atividade = $moore->atividade;
                            $mapeamento->postura = '';
                            $mapeamento->exigencia = '';
                            $mapeamento->sobrecarga = '';
                            $mapeamento->classificacao = $conclusao;
                           $mapeamento->save();
                           
                        }else{
                            $mapeamento = new Mapeamento();
                            $mapeamento->id_empresa = $empresa;
                            $mapeamento->area = $area->nome;
                            $mapeamento->setor = $setor->nome;
                            $mapeamento->posto_trabalho = $subsetor->nome;
                            $mapeamento->funcao ='';
                            $mapeamento->atividade = $moore->atividade;
                            $mapeamento->postura = '';
                            $mapeamento->exigencia = '';
                            $mapeamento->sobrecarga = '';
                            $mapeamento->classificacao = $conclusao;
                           $mapeamento->save();
                           
                        }
                    }

                //Conclusões Rula 
                   foreach ($subsetor->rula as $key => $rula) {
                    $braco = $rula->braco;
                    $braco_desvio = $rula->braco_desvio;
                    $antebraco = $rula->antebraco;
                    $antebraco_desvio = $rula->antebraco_desvio;
                    $punho = $rula->punho;
                    $punho_desvio = $rula->punho_desvio;
                    $pescoco = $rula->pescoco;
                    $pescoco_desvio = $rula->pescoco_desvio;
                    $tronco = $rula->tronco;
                    $tronco_desvio = $rula->tronco_desvio;
                    $perna = $rula->perna;
                    
                    $conclusao =  rula($braco, $braco_desvio, $antebraco, $antebraco_desvio, $punho, $punho_desvio, $pescoco, $pescoco_desvio, $tronco, $tronco_desvio, $perna);
                    if(isset($subsetor->funcao->funcao)){
                        $mapeamento = new Mapeamento();
                        $mapeamento->id_empresa = $empresa;
                        $mapeamento->area = $area->nome;
                        $mapeamento->setor = $setor->nome;
                        $mapeamento->posto_trabalho = $subsetor->nome;
                        $mapeamento->funcao = $subsetor->funcao->funcao;
                        $mapeamento->atividade = $rula->atividade;
                        $mapeamento->postura = '';
                        $mapeamento->exigencia = '';
                        $mapeamento->sobrecarga = '';
                        $mapeamento->classificacao = $conclusao;
                       $mapeamento->save();
                    }else{
                        $mapeamento = new Mapeamento();
                        $mapeamento->id_empresa = $empresa;
                        $mapeamento->area = $area->nome;
                        $mapeamento->setor = $setor->nome;
                        $mapeamento->posto_trabalho = $subsetor->nome;
                        $mapeamento->funcao ='';
                        $mapeamento->atividade = $rula->atividade;
                        $mapeamento->postura = '';
                        $mapeamento->exigencia = '';
                        $mapeamento->sobrecarga = '';
                        $mapeamento->classificacao = $conclusao;
                       $mapeamento->save();
                    }
                }
                //Conclusões OWAS 

                foreach ($subsetor->owas as $key => $owas) {
                    $dorso = $owas->dorso;
                    $braco = $owas->braco;
                    $pernas = $owas->pernas;
                    $carga = $owas->carga;
                    
                   $conclusao =  owas($dorso, $braco, $pernas, $carga);
                    
                    if(isset($subsetor->funcao->funcao)){
                        $mapeamento = new Mapeamento();
                        $mapeamento->id_empresa = $empresa;
                        $mapeamento->area = $area->nome;
                        $mapeamento->setor = $setor->nome;
                        $mapeamento->posto_trabalho = $subsetor->nome;
                        $mapeamento->funcao = $subsetor->funcao->funcao;
                        $mapeamento->atividade = $owas->atividade;
                        $mapeamento->postura = '';
                        $mapeamento->exigencia = '';
                        $mapeamento->sobrecarga = '';
                        $mapeamento->classificacao = $conclusao;
                       $mapeamento->save();
                    }else{
                        $mapeamento = new Mapeamento();
                        $mapeamento->id_empresa = $empresa;
                        $mapeamento->area = $area->nome;
                        $mapeamento->setor = $setor->nome;
                        $mapeamento->posto_trabalho = $subsetor->nome;
                        $mapeamento->funcao =  '';
                        $mapeamento->atividade = $owas->atividade;
                        $mapeamento->postura = '';
                        $mapeamento->exigencia = '';
                        $mapeamento->sobrecarga = '';
                        $mapeamento->classificacao = $conclusao;
                       $mapeamento->save();
                    }
                }

                //Conclusão Niosh
                foreach ($subsetor->niosh as $key => $niosh) {
                    $fdh = $niosh->fdh;
                    $fav = $niosh->fav;
                    $fdc = $niosh->fdc;
                    $frlt = $niosh->frlt;
                    $ffl = $niosh->ffl;
                    $fqpc = $niosh->fqpc;
                    $peso = $niosh->peso;
                    
                   $conclusao =  niosh($fdh, $fav, $fdc, $frlt, $ffl, $fqpc, $peso);
                    
                    if(isset($subsetor->funcao->funcao)){
                        $mapeamento = new Mapeamento();
                        $mapeamento->id_empresa = $empresa;
                        $mapeamento->area = $area->nome;
                        $mapeamento->setor = $setor->nome;
                        $mapeamento->posto_trabalho = $subsetor->nome;
                        $mapeamento->funcao = $subsetor->funcao->funcao;
                        $mapeamento->atividade = $niosh->atividade;
                        $mapeamento->postura = '';
                        $mapeamento->exigencia = '';
                        $mapeamento->sobrecarga = '';
                        $mapeamento->classificacao = $conclusao;
                       $mapeamento->save();
                    }else{
                        $mapeamento = new Mapeamento();
                        $mapeamento->id_empresa = $empresa;
                        $mapeamento->area = $area->nome;
                        $mapeamento->setor = $setor->nome;
                        $mapeamento->posto_trabalho = $subsetor->nome;
                        $mapeamento->funcao = '';
                        $mapeamento->atividade = $niosh->atividade;
                        $mapeamento->postura = '';
                        $mapeamento->exigencia = '';
                        $mapeamento->sobrecarga = '';
                        $mapeamento->classificacao = $conclusao;
                       $mapeamento->save();
                    }
                } 
                //Conclusões Gerais
                    foreach ($subsetor->conclusoes as $key => $conclusao) {
                        if(isset($subsetor->funcao->funcao)){
                            $mapeamento = new Mapeamento();
                            $mapeamento->id_empresa = $empresa;
                            $mapeamento->area = $area->nome;
                            $mapeamento->setor = $setor->nome;
                            $mapeamento->posto_trabalho = $subsetor->nome;
                            $mapeamento->funcao = $subsetor->funcao->funcao;
                            $mapeamento->atividade = $conclusao->atividade;
                            $mapeamento->postura = '';
                            $mapeamento->exigencia = '';
                            $mapeamento->sobrecarga = '';
                            $mapeamento->classificacao = $conclusao->conclusao;
                           $mapeamento->save();
                        }else{
                            $mapeamento = new Mapeamento();
                            $mapeamento->id_empresa = $empresa;
                            $mapeamento->area = $area->nome;
                            $mapeamento->setor = $setor->nome;
                            $mapeamento->posto_trabalho = $subsetor->nome;
                            $mapeamento->funcao = '';
                            $mapeamento->atividade = $conclusao->atividade;
                            $mapeamento->postura = '';
                            $mapeamento->exigencia = '';
                            $mapeamento->sobrecarga = '';
                            $mapeamento->classificacao = $conclusao->conclusao;
                           $mapeamento->save();
                        }
                    }
                }
            }

           
        }

        return redirect()->route('infoempresa', ['id' => $empresa]);

    }

    public function uploadMapeamento(Request $request){
        try {
        $arquivo = $request->file;
        $empresa = Mapeamento::where('id_empresa', $request->id_empresa)->get();
        foreach ($empresa as $key => $populacao) {
            
            Mapeamento::destroy($populacao->id);
        }
        $i = 0;
        $path = $request->file('file')->store('diretorio'); 
        $tempFilePath = storage_path('app/'.$path);
        $dados_planilha = fopen($tempFilePath, "r");
        while($linha = fgetcsv($dados_planilha, 1000, ",")){
            if($i > 2){
             $mapeamento = new Mapeamento();
             $mapeamento->id_empresa = $request->id_empresa;
             $mapeamento->area = $linha[1];
             $mapeamento->setor = $linha[2];
             $mapeamento->posto_trabalho = $linha[3];
             $mapeamento->funcao = $linha[4];
             $mapeamento->atividade = $linha[5];
             $mapeamento->postura = $linha[6];
             $mapeamento->exigencia = $linha[7];
             $mapeamento->sobrecarga = $linha[8];
             $mapeamento->classificacao = $linha[9];
            $mapeamento->save();
            }
        $i++;
        
       
        }
        return redirect()->route('infoempresa', ['id' => $request->id_empresa]);

    } catch (\Exception $e) {
          
        return redirect()->route('infoempresa', ['id' => $request->id_empresa])->with('message', 'erro_planilha_mapeamento');
    }
    }

    public function updMapeamento(Request $request){


             $mapeamento = Mapeamento::where('id', $request->id)->first();
             $mapeamento->area = $request->area;
             $mapeamento->setor = $request->setor;
             $mapeamento->posto_trabalho = $request->posto_trabalho;
             $mapeamento->funcao = $request->funcao;
             $mapeamento->atividade = $request->atividade;
             $mapeamento->postura =$request->postura;
             $mapeamento->exigencia =$request->exigencia;
             $mapeamento->sobrecarga =$request->sobrecarga;
             $mapeamento->classificacao = $request->classificacao;
            $mapeamento->save();

        return redirect()->route('infoempresa', ['id' => $mapeamento->id_empresa])->with('secao', 'mapeamento');
    }

    public function cadMapeamento(Request $request){


        $mapeamento = new Mapeamento();
        $mapeamento->id_empresa = $request->empresa;
        $mapeamento->area = $request->area;
        $mapeamento->setor = $request->setor;
        $mapeamento->posto_trabalho = $request->posto_trabalho;
        $mapeamento->funcao = $request->funcao;
        $mapeamento->atividade = $request->atividade;
        $mapeamento->postura =$request->postura;
        $mapeamento->exigencia =$request->exigencia;
        $mapeamento->sobrecarga =$request->sobrecarga;
        $mapeamento->classificacao = $request->classificacao;
       $mapeamento->save();

   return redirect()->route('infoempresa', ['id' => $mapeamento->id_empresa]);
}

    
    public function delete($id){
        Mapeamento::destroy($id);
        return back()->with('secao', 'mapeamento');;
    }
}
