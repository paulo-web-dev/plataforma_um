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
        $perguntas = DiscPergunta::with('alternativas')->get();
        return view('disc.form', compact('perguntas'));
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

    public function result($id)
    {
        $funcionario = FuncionarioQuestionarioArp::with('respostas.alternativa')->findOrFail($id);

        // Inicializar contadores
        $scores = ['D' => 0, 'I' => 0, 'S' => 0, 'C' => 0];
        $totalPontos = 0;

        foreach ($funcionario->respostas as $resposta) {
            $dimensao = $resposta->alternativa->dimensao; // D, I, S ou C
            $rank = $resposta->valor_escolhido; // 1, 2, 3 ou 4

            // Lógica de Peso (Inverso)
            // 1 -> 4 pts, 2 -> 3 pts, 3 -> 2 pts, 4 -> 1 pt
            $peso = 5 - $rank; 

            if (isset($scores[$dimensao])) {
                $scores[$dimensao] += $peso;
                $totalPontos += $peso;
            }
        }

        // Calcular Porcentagens
        $percentages = [];
        foreach ($scores as $key => $val) {
            $percentages[$key] = $totalPontos > 0 ? round(($val / $totalPontos) * 100, 1) : 0;
        }

        return view('disc.result', compact('funcionario', 'scores', 'percentages'));
    }
}