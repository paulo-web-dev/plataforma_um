<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FuncionarioQuestionarioArp;
use App\Models\DiscPergunta;
use App\Models\DiscRespostas;
use App\Models\DiscAlternativas;

class DiscController extends Controller
{
    public function index()
    {
        $perguntas = DiscPergunta::with('alternativas')
        ->get()
        ->map(function ($pergunta) {
            $pergunta->alternativas = $pergunta->alternativas->shuffle();
            return $pergunta;
        });
        
        return view('disc.form', compact('perguntas'));
    }

    public function index2()
    {
        $perguntas = DiscPergunta::with('alternativas')
        ->get()
        ->map(function ($pergunta) {
            $pergunta->alternativas = $pergunta->alternativas->shuffle();
            return $pergunta;
        });
        
        return view('disc.form2', compact('perguntas'));
    }

    public function store(Request $request)
    {
        // 1. Salvar Funcionário
        $funcionario = FuncionarioQuestionarioArp::create($request->only(['nome','email']));

        // 2. Processar Respostas
        // O form enviará array: respostas[pergunta_id][alternativa_id] = valor (1 a 4)
        $rawRespostas = $request->input('respostas');

        foreach ($rawRespostas as $perguntaId => $alternativas) {
            foreach ($alternativas as $alternativaId => $valorRank) {
            
                DiscRespostas::create([
                    'funcionario_id' => $funcionario->id,
                    'alternativa_id' => $alternativaId,
                    'valor_escolhido' => $valorRank
                ]);

            }
        }

        return redirect()->route('disc.result', ['id' => $funcionario->id]);
    }

    public function store2(Request $request)
    {
        // 1. Salvar Funcionário
        $funcionario = FuncionarioQuestionarioArp::create($request->only(['nome','email']));

        // 2. Processar Respostas
        // O form enviará array: respostas[pergunta_id][alternativa_id] = valor (1 a 4)
        $rawRespostas = $request->input('respostas');

        foreach ($rawRespostas as $perguntaId => $alternativas) {
            foreach ($alternativas as $alternativaId => $valorRank) {
            
                DiscRespostas::create([
                    'funcionario_id' => $funcionario->id,
                    'alternativa_id' => $alternativaId,
                    'valor_escolhido' => $valorRank
                ]);

            }
        }

        return redirect()->route('disc.result2', ['id' => $funcionario->id]);
    }

    public function result($id)
    {
        $funcionario = FuncionarioQuestionarioArp::with('respostas.alternativa')->findOrFail($id);
    
        // Inicializar
        $scores = ['D' => 0, 'I' => 0, 'S' => 0, 'C' => 0];
        $counts = ['D' => 0, 'I' => 0, 'S' => 0, 'C' => 0];
    
        foreach ($funcionario->respostas as $resposta) {
            $dimensao = $resposta->alternativa->dimensao; // D, I, S, C
            $rank = $resposta->valor_escolhido; // 1 a 4
    
            // Peso inverso
            $peso = 5 - $rank; // 1->4 | 2->3 | 3->2 | 4->1
    
            if (isset($scores[$dimensao])) {
                $scores[$dimensao] += $peso;
                $counts[$dimensao]++; // conta quantas perguntas aquela letra teve
            }
        }
       
        // Calcular percentuais por dimensão (independentes)
        $percentages = [];
        foreach ($scores as $key => $val) {

            $maxPontos = $counts[$key] * 4; // máximo possível para aquela dimensão
        
            $percentages[$key] = $maxPontos > 0
                ? round(($val / $maxPontos) * 100)
                : 0;   
        }
 
        // NOVO: Descobrir o perfil dominante (a letra com a maior porcentagem/pontuação)
        $perfilDominante = array_keys($percentages, max($percentages))[0];
    
        // NOVO: Adicionado $perfilDominante ao compact()
        return view('disc.result', compact('funcionario', 'scores', 'percentages', 'counts', 'perfilDominante', 'id'));
    }

    public function result2($id)
    {
        $funcionario = FuncionarioQuestionarioArp::with('respostas.alternativa')->findOrFail($id);
    
        // Inicializar
        $scores = ['D' => 0, 'I' => 0, 'S' => 0, 'C' => 0];
        $counts = ['D' => 0, 'I' => 0, 'S' => 0, 'C' => 0];
    
        foreach ($funcionario->respostas as $resposta) {
            $dimensao = $resposta->alternativa->dimensao; // D, I, S, C
            $rank = $resposta->valor_escolhido; // 1 a 4
    
            // Peso inverso
            $peso = 5 - $rank; // 1->4 | 2->3 | 3->2 | 4->1
    
            if (isset($scores[$dimensao])) {
                $scores[$dimensao] += $peso;
                $counts[$dimensao]++; // conta quantas perguntas aquela letra teve
            }
        }
       
        // Calcular percentuais por dimensão (independentes)
        $percentages = [];
        foreach ($scores as $key => $val) {

            $maxPontos = $counts[$key] * 4; // máximo possível para aquela dimensão
        
            $percentages[$key] = $maxPontos > 0
                ? round(($val / $maxPontos) * 100)
                : 0;   
        }
 
        // NOVO: Descobrir o perfil dominante (a letra com a maior porcentagem/pontuação)
        $perfilDominante = array_keys($percentages, max($percentages))[0];
    
        // NOVO: Adicionado $perfilDominante ao compact()
        return view('disc.result2', compact('funcionario', 'scores', 'percentages', 'counts', 'perfilDominante', 'id'));
    }

    public function resultDocumento($id)
    {
        $funcionario = FuncionarioQuestionarioArp::with('respostas.alternativa')->findOrFail($id);
    
        // Inicializar
        $scores = ['D' => 0, 'I' => 0, 'S' => 0, 'C' => 0];
        $counts = ['D' => 0, 'I' => 0, 'S' => 0, 'C' => 0];
    
        foreach ($funcionario->respostas as $resposta) {
            $dimensao = $resposta->alternativa->dimensao; // D, I, S, C
            $rank = $resposta->valor_escolhido; // 1 a 4
    
            // Peso inverso
            $peso = 5 - $rank; // 1->4 | 2->3 | 3->2 | 4->1
    
            if (isset($scores[$dimensao])) {
                $scores[$dimensao] += $peso;
                $counts[$dimensao]++; // conta quantas perguntas aquela letra teve
            }
        }
       
        // Calcular percentuais por dimensão (independentes)
        $percentages = [];
    
        foreach ($scores as $key => $val) {

            $maxPontos = $counts[$key] * 4; // máximo possível para aquela dimensão
        
            $percentages[$key] = $maxPontos > 0
                ? round(($val / $maxPontos) * 100)
                : 0;   
        }
        $perfilDominante = array_key_first(
            collect($percentages)->sortDesc()->toArray()
        );
        
        return view('disc.resultdoc', compact('funcionario', 'scores', 'percentages', 'counts', 'perfilDominante'));
    }

    public function resultDocumentoPremium($id)
    {
        $funcionario = FuncionarioQuestionarioArp::with('respostas.alternativa')->findOrFail($id);
    
        // Inicializar
        $scores = ['D' => 0, 'I' => 0, 'S' => 0, 'C' => 0];
        $counts = ['D' => 0, 'I' => 0, 'S' => 0, 'C' => 0];
    
        foreach ($funcionario->respostas as $resposta) {
            $dimensao = $resposta->alternativa->dimensao; // D, I, S, C
            $rank = $resposta->valor_escolhido; // 1 a 4
    
            // Peso inverso
            $peso = 5 - $rank; // 1->4 | 2->3 | 3->2 | 4->1
    
            if (isset($scores[$dimensao])) {
                $scores[$dimensao] += $peso;
                $counts[$dimensao]++; // conta quantas perguntas aquela letra teve
            }
        }
       
        // Calcular percentuais por dimensão (independentes)
        $percentages = [];
    
        foreach ($scores as $key => $val) {

            $maxPontos = $counts[$key] * 4; // máximo possível para aquela dimensão
        
            $percentages[$key] = $maxPontos > 0
                ? round(($val / $maxPontos) * 100)
                : 0;   
        }
        $perfilDominante = array_key_first(
            collect($percentages)->sortDesc()->toArray()
        );
        
        return view('disc.resultdocpremium', compact('funcionario', 'scores', 'percentages', 'counts', 'perfilDominante'));
    }
       
}