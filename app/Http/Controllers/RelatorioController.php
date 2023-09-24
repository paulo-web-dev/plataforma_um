<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas; 
use App\Models\Setores;
use App\Models\SubSetores;
use App\Models\Cargos;
use App\Models\DadosOrganizacionais;
use App\Models\Caracteristicas;
use App\Models\PreDiagnostico;


class RelatorioController extends Controller
{
    public function gerarRelatorio($id){

        function porcentagem($numero, $key){
            $porcentagem = ($numero/$key) * 100;

            return round($porcentagem);
        }
        $empresa = Empresas::where('id', $id)
        ->with('setores')
        ->with('introducao')
        ->with('equipe')
        ->with('objetivos')
        ->with('disposicao')
        ->with('mapeamento')
        ->with('planodeacao')
        ->with('responsaveis')
        ->first();
     
        $faixaetaria20a29 = 0;
        $faixaetaria30a39 = 0;
        $faixaetaria40a49 = 0;
        $faixaetaria50a59 = 0;
        $tempoadmissao0a5 = 0;
        $tempoadmissao6a10 = 0;
        $tempoadmissao10a20 = 0;
        $sexom = 0;
        $sexof = 0;
        $escolaridadesg = 0;
        $escolaridadepg = 0;
        $escolaridadetg = 0;
        
        foreach ($empresa->populacao as $key => $populacao) {
            if($populacao->sexo == 'MASC.'){
                $sexom += 1;
            }else{
                $sexof += 1;
            }

            switch (true) {
                case $populacao->idade <= 29:
                    $faixaetaria20a29 += 1;
                    break;
                
                case $populacao->idade >= 30 && $populacao->idade <= 39 :
                    $faixaetaria30a39 += 1;
                    break;
            
                case $populacao->idade >= 40 && $populacao->idade <= 49 :
                    $faixaetaria40a49 += 1;
                   break;  
                   
                case $populacao->idade > 49:
                    $faixaetaria50a59 += 1;
                   break; 
            }

            switch (true) {
                case $populacao->tempo_empresa <= 5:
                    $tempoadmissao0a5 += 1;
                    break;
                
                case $populacao->tempo_empresa >= 6 && $populacao->tempo_empresa <= 10 :
                    $tempoadmissao6a10 += 1;
                    break;
            
                case $populacao->tempo_empresa > 10:
                    $tempoadmissao10a20 += 1;
                   break;  
                   
            }

            if($populacao->escolaridade == 'SEGUNDO GRAU (COLEGIAL) COMPLETO                  '){
                $escolaridadesg += 1;
            }elseif('TERCEIRO GRAU (FACULDADE) COMPLETO                  '){
                $escolaridadetg += 1;
            }else{
                $escolaridadepg += 1;
            }
        }
        
        $key += 1;
        $porcentagemmasculino = porcentagem($sexom, $key);
        $porcentagemfeminino = 100 - $porcentagemmasculino;
        $genero = [
            'labels' => ['Feminino', 'Masculino'],
            'data' => [$sexof, $sexom,],
        ];

        $faixaetaria = [
            'labels' => ['20 á 29 anos', '30 á 39 anos', '40 á 49 anos', '50 á 59 anos'],
            'data' => [$faixaetaria20a29, $faixaetaria30a39, $faixaetaria40a49, $faixaetaria50a59],
        ];

        $tempoadimissao = [
            'labels' => ['0 á 5 anos', '6 á 10 anos', '10 á 20 anos'],
            'data' => [$tempoadmissao0a5, $tempoadmissao6a10, $tempoadmissao10a20],
        ];

        $escolaridade = [
            'labels' => ['Primeiro Grau', 'Segundo Grau', 'Terceiro Grau'],
            'data' => [$escolaridadepg, $escolaridadesg, $escolaridadetg],
        ];
     
        return view('relatorio',[
            'empresa' => $empresa,
        ], compact('genero', 'faixaetaria', 'tempoadimissao', 'escolaridade'));

    }
}
