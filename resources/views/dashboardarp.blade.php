@extends('layouts.header')

{{-- Bloco de processamento de dados PHP --}}
@php
    // Importar o Str para garantir que o slug seja gerado de forma confiável
    use Illuminate\Support\Str; 

    // Função para replicar a lógica de classificação (com verificação de existência)
    if (!function_exists('getRiskLevel')) {
        function getRiskLevel($classificacao) {
            
            // Listas de termos exatos do seu JS
            $low_risk_terms = [
                'RISCO LEVE', 'boa condição ergonômica', ' Baixo Risco', 'aceitável se não é mantida ou repetida por longos períodos', 
                'condição ergonômica em geral excelente', 'Faixa Segura', 'Risco inexistente', 'Risco Baixo', 
                'Condição Ergonômica Execelente', 'Boa Condição Ergonômica', 'RISCO BAIXO', 'Sem ações corretivas, postura adequada', 
                'Ausente ou Aceitável', 'Improvável', 'Risco Leve'
            ];
            
            $moderate_risk_terms = [
                'RISCO MODERADO', 'condição ergonômica razoável', 'Risco Médio', 'A Faixa é considerada de risco moderado', 
                'Risco Moderado', 'Ações corretivas são requeridas em um futuro próximo', 'Ações corretivas são necessárias a curto prazo', 
                'São necessários mais estudos e que serão necessárias mudanças', 'são necessários mais estudos e que serão necessárias mudanças', 
                'São necessárias pesquisas e mudanças em um futuro próximo', 'são necessárias pesquisas e mudanças em um futuro próximo', 
                'Duvidoso', 'Condição Ergonômica Razoável', 'Faixa é considerada de risco moderado'
            ];
            
            // Coloquei 'condição ergonômica ruim' aqui, pois parece ser a intenção (Risco Alto)
            $high_risk_terms = [
                'RISCO ALTO', 'condição ergonômica ruim', ' Alto Risco', 'Risco Alto', 'Muito Alto', 'Risco', 
                'São necessárias pesquisas e mudanças imediatamente', 'são necessárias pesquisas e mudanças imediatamente', 
                'Ações corretivas imediatas', 'Faixa é considerada de alto risco', 'Condição Ergonômica Pessima', 
                'Condição Ergonômica Ruim', 'Ações corretivas são necessária a curto prazo', 'Risco Alto'
            ];

            if (in_array($classificacao, $low_risk_terms)) {
                return 'low';
            } elseif (in_array($classificacao, $moderate_risk_terms)) {
                return 'moderate';
            } elseif (in_array($classificacao, $high_risk_terms)) {
                return 'high';
            }

            return 'unknown'; // Caso não se encaixe em nenhum
        }
    }

    // 1. Inicializar arrays
    $data_by_area = [];     // Estrutura principal para análise por área
    $risks_high = [];       // Para a tabela geral no final
    $risks_moderate = [];   // Para a tabela geral no final
    $risks_low = [];        // Para a tabela geral no final
    $js_chart_data = [];    // Dados para os gráficos individuais (com slug correto)
    
    // NOVO: Estrutura para o Gráfico Geral
    $js_general_chart_data = [
        'labels' => [], // Nomes das Áreas
        'high' => [],
        'moderate' => [],
        'low' => []
    ];


    // 2. Processar todos os mapeamentos
    foreach ($empresa->mapeamento as $map) {
        $riskLevel = getRiskLevel($map->classificacao);
        $area_name = $map->area ?? 'Sem Área Definida'; // Trata áreas nulas/vazias

        // A. Popular as listas gerais (para o final da página)
        if ($riskLevel == 'high') $risks_high[] = $map;
        elseif ($riskLevel == 'moderate') $risks_moderate[] = $map;
        elseif ($riskLevel == 'low') $risks_low[] = $map;

        // B. Popular a estrutura de dados por área
        // Inicializa a sub-array da área se for a primeira vez
        if (!isset($data_by_area[$area_name])) {
            $data_by_area[$area_name] = [
                'counts' => ['high' => 0, 'moderate' => 0, 'low' => 0, 'unknown' => 0],
                'maps_high' => [],
                'maps_moderate' => [],
                'maps_low' => []
            ];
        }

        // Incrementa a contagem de risco para cada grupo
        $data_by_area[$area_name]['counts'][$riskLevel]++;

        // Adiciona o mapeamento à lista correta daquela área
        if ($riskLevel == 'high') {
            $data_by_area[$area_name]['maps_high'][] = $map;
        } elseif ($riskLevel == 'moderate') {
            $data_by_area[$area_name]['maps_moderate'][] = $map;
        } elseif ($riskLevel == 'low') {
            $data_by_area[$area_name]['maps_low'][] = $map;
        }
    }
    
    // 3. Criar a estrutura final para o JavaScript (GARANTIA DE SLUG CORRETO)
    foreach ($data_by_area as $area_name => $data) {
        $slug = Str::slug($area_name); 
        
        // Dados para os gráficos individuais
        $js_chart_data[$slug] = [ 
            'name' => $area_name,
            'counts' => $data['counts']
        ];

        // Dados para o gráfico geral
        $js_general_chart_data['labels'][] = $area_name;
        $js_general_chart_data['high'][] = $data['counts']['high'];
        $js_general_chart_data['moderate'][] = $data['counts']['moderate'];
        $js_general_chart_data['low'][] = $data['counts']['low'];
    }
    
    // Opcional: Ordenar as áreas por nome
    ksort($data_by_area);

@endphp
{{-- Fim do bloco de processamento PHP --}}


@section('content')
   
 <div class="intro-y flex items-center mt-8 ">
        <h2 class="text-lg font-medium mr-auto">
            Análise de Risco Ergonômico por Área - {{ $empresa->nome }}
        </h2>
    <div class="flex-wrap">
        {{-- Ajuste esta rota se necessário. --}}
        <a href="{{ route('infoempresa', ['id' => $empresa->id]) }}" class="btn btn-primary shadow-md mr-2" style="margin: 5px"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar para Empresa</a>
     </div>

     <a href="{{ route('imprimedashboardempresaarp', ['id' => $empresa->id]) }}" class="btn btn-danger shadow-md mr-2" style="margin: 5px">
        <i data-feather="printer" class="w-4 h-4 mr-2"></i> Imprimir Relatório
    </a>
</div>

<div class="intro-y box mt-8">
    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
        <h2 class="font-medium text-base mr-auto">
            <i data-feather="bar-chart-2" class="w-5 h-5 mr-2 inline-block"></i> Distribuição Geral de Risco por Área
        </h2>
    </div>

   
{{-- Verificamos se existem dados gerais para exibir --}}
{{-- ================================================================= --}}
{{-- ==================== TABELAS DE DADOS POR SETOR =================== --}}
{{-- ================================================================= --}}
@foreach($mediasPorSetor as $setor => $dadosDoSetor)
<div class="intro-y box mt-8">
    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
        <h2 class="font-medium text-base mr-auto">
            Resultados do Setor: <span class="font-bold">{{ $setor }}</span>
            <span class="text-gray-600 ml-2">
                ({{ $dadosDoSetor['totalParticipantes'] }} respondente(s))
            </span>
        </h2>
    </div>

    <div class="p-5">
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="border text-center">Categoria</th>
                        <th class="border text-center">Média</th>
                        <th class="border text-center">Severidade</th>
                        <th class="border text-center">Risco</th>
                        <th class="border text-left">Plano de Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dadosDoSetor['medias'] as $dado)
                        <tr class="hover:bg-gray-200">
                            <td class="border text-center">{{ $dado['categoria'] }}</td>
                            <td class="border text-center font-bold">
                                {{ number_format($dado['media'], 2, ',', '.') }}
                            </td>

                            {{-- Severidade --}}
                            <td class="border text-center">
                                @php
                                    $corFundo = '#ccc';
                                    $corTexto = '#000';
                                    $nivelKey = $dado['nivel'];

                                    if ($nivelKey === 'Leve') {
                                        $corFundo = '#22c55e'; $corTexto = '#fff';
                                    } elseif ($nivelKey === 'Moderado') {
                                        $corFundo = '#facc15'; $corTexto = '#000';
                                    } elseif ($nivelKey === 'Sério') {
                                        $corFundo = '#f97316'; $corTexto = '#fff';
                                    } else {
                                        $corFundo = '#dc2626'; $corTexto = '#fff';
                                        $nivelKey = 'Severo';
                                    }
                                @endphp
                                <span style="background-color: {{ $corFundo }}; color: {{ $corTexto }}; padding: 5px 10px; border-radius: 6px;">
                                    {{ $nivelKey }}
                                </span>
                            </td>

                            {{-- Risco --}}
                            <td class="border text-center">
                                @php
                                    if ($nivelKey === 'Leve') $risco = 'Insignificante';
                                    elseif ($nivelKey === 'Moderado') $risco = 'Baixo';
                                    elseif ($nivelKey === 'Sério') $risco = 'Alto';
                                    else $risco = 'Severo';
                                @endphp
                                {{ $risco }}
                            </td>

                            {{-- Plano de Ação --}}
                            <td class="border text-left p-3">
                                @php
                                    $idxArr = $loop->index;
                                    if ($idxArr > 15) $idxArr = 15;

                                    $fraseSugestao = $sugestoesDict[$idxArr][$nivelKey]
                                        ?? 'Sem plano de ação definido para este cenário.';
                                @endphp
                                <span class="text-xs text-gray-700 dark:text-gray-300">
                                    {{ $fraseSugestao }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center border p-3">
                                Nenhum dado encontrado para este setor
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endforeach
       
@else
{{-- Mensagem para quando não há absolutamente nenhum dado --}}
<div class="intro-y box mt-5 p-5">
    <p class="text-center">Nenhum resultado de pesquisa encontrado para esta empresa.</p>
</div>
@endif
        </div>
        
    </div>
</div>
@endsection

@push('custom-scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        // Dados para os gráficos individuais (com slug corrigido)
        const all_chart_data = @json($js_chart_data); 
        
        // Dados para o Gráfico Geral
        const general_chart_data = @json($js_general_chart_data);
        
        // --- 1. CRIAÇÃO DO GRÁFICO GERAL ---
        const ctxGeral = document.getElementById('chartGeral');

        if (ctxGeral && general_chart_data.labels.length > 0) {
            
            const datasets = [
                {
                    label: 'Risco Alto',
                    data: general_chart_data.high,
                    backgroundColor: 'rgba(220, 38, 38, 0.7)', // Red
                    borderColor: 'rgba(220, 38, 38, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Risco Moderado',
                    data: general_chart_data.moderate,
                    backgroundColor: 'rgba(250, 204, 21, 0.7)', // Yellow
                    borderColor: 'rgba(250, 204, 21, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Risco Baixo',
                    data: general_chart_data.low,
                    backgroundColor: 'rgba(34, 197, 94, 0.7)', // Green
                    borderColor: 'rgba(34, 197, 94, 1)',
                    borderWidth: 1
                }
            ];
            
            new Chart(ctxGeral.getContext('2d'), {
                type: 'bar', // Gráfico de barras
                data: {
                    labels: general_chart_data.labels, // Nomes das Áreas
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            stacked: false, // Barras LADO A LADO (Agrupadas)
                            title: {
                                display: true,
                                text: 'Áreas'
                            }
                        },
                        y: {
                            stacked: false, // Barras LADO A LADO (Agrupadas)
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            },
                            title: {
                                display: true,
                                text: 'Nº de Mapeamentos'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true, // Mostra a legenda para identificar as cores
                            position: 'top',
                        }
                    }
                }
            });
        }
        // --- FIM DA CRIAÇÃO DO GRÁFICO GERAL ---


        // Opções padrão para todos os gráficos de barra individuais
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false, // Importante para o container de altura fixa
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        // Garante que o eixo Y mostre apenas números inteiros
                        stepSize: 1
                    }
                }
            },
            plugins: {
                legend: {
                    display: false // Oculta a legenda
                }
            }
        };

        // --- 2. CRIAÇÃO DOS GRÁFICOS INDIVIDUAIS ---
        // Itera sobre cada item na estrutura de dados usando o SLUG como chave
        for (const slug in all_chart_data) {
            
            // Pula a iteração se for uma propriedade de protótipo (boa prática JS)
            if (!all_chart_data.hasOwnProperty(slug)) continue;

            const areaData = all_chart_data[slug];
            
            // O ID do canvas é chart- + o SLUG EXATO que veio do PHP
            const chartId = 'chart-' + slug; 
            const ctx = document.getElementById(chartId);
            
            if (ctx) { 
                
                // Define os dados do gráfico
                const chartData = {
                    labels: ['Risco Alto', 'Risco Moderado', 'Risco Baixo'],
                    datasets: [{
                        label: 'Nº de Mapeamentos',
                        data: [
                            areaData.counts.high, 
                            areaData.counts.moderate, 
                            areaData.counts.low
                        ],
                        backgroundColor: [
                            'rgba(220, 38, 38, 0.7)', // Red
                            'rgba(250, 204, 21, 0.7)', // Yellow
                            'rgba(34, 197, 94, 0.7)'  // Green
                        ],
                        borderColor: [
                            'rgba(220, 38, 38, 1)',
                            'rgba(250, 204, 21, 1)',
                            'rgba(34, 197, 94, 1)'
                        ],
                        borderWidth: 1
                    }]
                };

                // Cria o gráfico
                new Chart(ctx.getContext('2d'), {
                    type: 'bar',
                    data: chartData,
                    options: chartOptions
                });

            } else {
                console.warn('Elemento Canvas não encontrado para o ID:', chartId);
            }
        }
    });
</script>

@endpush