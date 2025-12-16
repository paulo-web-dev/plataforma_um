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

     <a href="{{ route('imprimedashboardempresa', ['id' => $empresa->id]) }}" class="btn btn-danger shadow-md mr-2" style="margin: 5px">
        <i data-feather="printer" class="w-4 h-4 mr-2"></i> Imprimir Relatório
    </a>
</div>

<div class="intro-y box mt-8">
    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
        <h2 class="font-medium text-base mr-auto">
            <i data-feather="bar-chart-2" class="w-5 h-5 mr-2 inline-block"></i> Distribuição Geral de Risco por Área
        </h2>
    </div>

    <div class="p-5">
        <h3 class="font-medium text-center mb-4">Comparativo de Mapeamentos por Nível de Risco</h3>
        {{-- Container com altura fixa para o gráfico geral --}}
        <div style="position: relative; height: 500px;"> 
            <canvas id="chartGeral"></canvas>
        </div>
    </div>
</div>
@forelse ($data_by_area as $area_name => $data)
    <div class="intro-y box mt-8">
        
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                <i data-feather="layers" class="w-5 h-5 mr-2 inline-block"></i> Análise da Área: <span class="font-bold text-primary">{{ $area_name }}</span>
            </h2>
        </div>

        <div class="p-5">
            <h3 class="font-medium text-center mb-4">Total de Mapeamentos por Risco</h3>
            {{-- Container com altura fixa para o gráfico individual --}}
            <div style="position: relative; height: 400px;">
                {{-- O ID do canvas agora é dinâmico, baseado no Str::slug do PHP --}}
                <canvas id="chart-{{ Str::slug($area_name) }}"></canvas>
            </div>
        </div>
        
        <div class="mt-5">
            <div class="flex items-center p-3 border-b border-t border-gray-200 dark:border-dark-5" style="background-color: rgba(220, 38, 38, 0.7); color: white;">
                <h3 class="font-medium text-base mr-auto">
                    RISCO ALTO ({{ $data['counts']['high'] }}) - Área: {{ $area_name }}
                </h3>
            </div>
            <div class="p-5">
                <div class="overflow-x-auto">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Setor</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Posto Trabalho</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Função</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Atividade</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Classificação</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data['maps_high'] as $mapeamento)
                            <tr class="hover:bg-gray-200">
                                <td class="border">{{$mapeamento->setor}}</td>
                                <td class="border">{{$mapeamento->posto_trabalho}}</td>
                                <td class="border">{{$mapeamento->funcao}}</td>
                                <td class="border">{{$mapeamento->atividade}}</td>
                                <td class="border" style="background-color: red; color: white; font-weight: bold;">
                                    {{$mapeamento->classificacao}}
                                </td>
                                <td class="border">
                                    <div class="flex justify-center">
                                        <a class="flex text-theme-1 mr-3" href="{{route('delete-mapeamento', ['id' => $mapeamento->id])}}">
                                            <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center border p-3">Nenhum mapeamento com risco alto encontrado para esta área.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <div class="flex items-center p-3 border-b border-t border-gray-200 dark:border-dark-5" style="background-color: rgba(250, 204, 21, 0.7); color: black;">
                <h3 class="font-medium text-base mr-auto">
                    RISCO MODERADO ({{ $data['counts']['moderate'] }}) - Área: {{ $area_name }}
                </h3>
            </div>
            <div class="p-5">
                <div class="overflow-x-auto">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Setor</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Posto Trabalho</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Função</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Atividade</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Classificação</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data['maps_moderate'] as $mapeamento)
                            <tr class="hover:bg-gray-200">
                                <td class="border">{{$mapeamento->setor}}</td>
                                <td class="border">{{$mapeamento->posto_trabalho}}</td>
                                <td class="border">{{$mapeamento->funcao}}</td>
                                <td class="border">{{$mapeamento->atividade}}</td>
                                <td class="border" style="background-color: yellow; color: black; font-weight: bold;">
                                    {{$mapeamento->classificacao}}
                                </td>
                                <td class="border">
                                    <div class="flex justify-center">
                                        <a class="flex text-theme-1 mr-3" href="{{route('delete-mapeamento', ['id' => $mapeamento->id])}}">
                                            <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center border p-3">Nenhum mapeamento com risco moderado encontrado para esta área.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <div class="flex items-center p-3 border-b border-t border-gray-200 dark:border-dark-5" style="background-color: rgba(34, 197, 94, 0.7); color: white;">
                <h3 class="font-medium text-base mr-auto">
                    RISCO BAIXO ({{ $data['counts']['low'] }}) - Área: {{ $area_name }}
                </h3>
            </div>
            <div class="p-5">
                <div class="overflow-x-auto">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Setor</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Posto Trabalho</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Função</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Atividade</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Classificação</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data['maps_low'] as $mapeamento)
                            <tr class="hover:bg-gray-200">
                                <td class="border">{{$mapeamento->setor}}</td>
                                <td class="border">{{$mapeamento->posto_trabalho}}</td>
                                <td class="border">{{$mapeamento->funcao}}</td>
                                <td class="border">{{$mapeamento->atividade}}</td>
                                <td class="border" style="background-color: green; color: white; font-weight: bold;">
                                    {{$mapeamento->classificacao}}
                                </td>
                                <td class="border">
                                    <div class="flex justify-center">
                                        <a class="flex text-theme-1 mr-3" href="{{route('delete-mapeamento', ['id' => $mapeamento->id])}}">
                                            <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center border p-3">Nenhum mapeamento com risco baixo encontrado para esta área.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div> @empty
    <div class="intro-y box mt-8 p-5">
        <p class="text-center">Nenhum mapeamento ergonômico encontrado para esta empresa.</p>
    </div>
@endforelse
<div class="intro-y flex items-center mt-12">
    <h2 class="text-lg font-medium mr-auto">
        Visão Geral de Todos Mapeamentos
    </h2>
</div>

<div class="intro-y box mt-5">
    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5" style="background-color: rgba(220, 38, 38, 0.7); color: white;">
        <h2 class="font-medium text-base mr-auto">
            Geral: Mapeamentos com RISCO ALTO ({{ count($risks_high) }})
        </h2>
    </div>
    <div class="p-5">
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Área</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Setor</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Posto Trabalho</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Função</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Atividade</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Classificação</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($risks_high as $mapeamento)
                    <tr class="hover:bg-gray-200">
                        <td class="border">{{$mapeamento->area}}</td>
                        <td class="border">{{$mapeamento->setor}}</td>
                        <td class="border">{{$mapeamento->posto_trabalho}}</td>
                        <td class="border">{{$mapeamento->funcao}}</td>
                        <td class="border">{{$mapeamento->atividade}}</td>
                        <td class="border" style="background-color: red; color: white; font-weight: bold;">
                            {{$mapeamento->classificacao}}
                        </td>
                        <td class="border">
                            <div class="flex justify-center">
                                <a class="flex text-theme-1 mr-3" href="{{route('delete-mapeamento', ['id' => $mapeamento->id])}}">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center border p-3">Nenhum mapeamento com risco alto encontrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="intro-y box mt-8">
    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5" style="background-color: rgba(250, 204, 21, 0.7); color: black;">
        <h2 class="font-medium text-base mr-auto">
            Geral: Mapeamentos com RISCO MODERADO ({{ count($risks_moderate) }})
        </h2>
    </div>
    <div class="p-5">
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Área</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Setor</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Posto Trabalho</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Função</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Atividade</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Classificação</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($risks_moderate as $mapeamento)
                    <tr class="hover:bg-gray-200">
                        <td class="border">{{$mapeamento->area}}</td>
                        <td class="border">{{$mapeamento->setor}}</td>
                        <td class="border">{{$mapeamento->posto_trabalho}}</td>
                        <td class="border">{{$mapeamento->funcao}}</td>
                        <td class="border">{{$mapeamento->atividade}}</td>
                        <td class="border" style="background-color: yellow; color: black; font-weight: bold;">
                            {{$mapeamento->classificacao}}
                        </td>
                        <td class="border">
                            <div class="flex justify-center">
                                <a class="flex text-theme-1 mr-3" href="{{route('delete-mapeamento', ['id' => $mapeamento->id])}}">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center border p-3">Nenhum mapeamento com risco moderado encontrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="intro-y box mt-8 mb-8">
    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5" style="background-color: rgba(34, 197, 94, 0.7); color: white;">
        <h2 class="font-medium text-base mr-auto">
            Geral: Mapeamentos com RISCO BAIXO ({{ count($risks_low) }})
        </h2>
    </div>
    <div class="p-5">
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Área</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Setor</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Posto Trabalho</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Função</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Atividade</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Classificação</th>
                        <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                     @forelse ($risks_low as $mapeamento)
                    <tr class="hover:bg-gray-200">
                        <td class="border">{{$mapeamento->area}}</td>
                        <td class="border">{{$mapeamento->setor}}</td>
                        <td class="border">{{$mapeamento->posto_trabalho}}</td>
                        <td class="border">{{$mapeamento->funcao}}</td>
                        <td class="border">{{$mapeamento->atividade}}</td>
                        <td class="border" style="background-color: green; color: white; font-weight: bold;">
                            {{$mapeamento->classificacao}}
                        </td>
                        <td class="border">
                            <div class="flex justify-center">
                                <a class="flex text-theme-1 mr-3" href="{{route('delete-mapeamento', ['id' => $mapeamento->id])}}">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center border p-3">Nenhum mapeamento com risco baixo encontrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
{{-- Verificamos se existem dados gerais para exibir --}}
@if(!empty($mediasGerais))

{{-- ================================================================= --}}
{{-- ======================= TABELA DE DADOS GERAIS ==================== --}}
{{-- ================================================================= --}}
<div class="col-span-12 xl:col-span-12">
    
    <div class="overflow-x-auto">
        {{-- Preparação dos Textos das Sugestões --}}
        @php
            $sugestoesDict = [
                0 => [ // 1. Violência...
                    'Leve' => 'Ambiente seguro e ético, ocorrências raras e tratadas imediatamente.',
                    'Moderado' => 'Relatos pontuais de críticas públicas indevidas ou decisões discriminatórias isoladas.',
                    'Sério' => 'Relatos frequentes de intimidação, violência verbal ou críticas públicas.',
                    'Severo' => 'Violência, assédio e discriminação recorrentes, impactando saúde mental e física.',
                ],
                1 => [ // 2. Reconhecimento...
                    'Leve' => 'Colaborador valorizado e reconhecido, recompensas justas e oportunas.',
                    'Moderado' => 'Justiça na recompensa questionada ocasionalmente ou reconhecimento insuficiente.',
                    'Sério' => 'Esforço não reconhecido, sentimento de desvalorização.',
                    'Severo' => 'Reconhecimento inexistente, colaborador desvalorizado e injustiça crônica.',
                ],
                2 => [ // 3. Apoio Social
                    'Leve' => 'Colaborador apoiado, serviços de suporte acessíveis e informação adequada.',
                    'Moderado' => 'Falta de apoio em momentos de alta demanda ou problemas no acesso a serviços.',
                    'Sério' => 'Falta de apoio crônica e ausência de treinamento impactando desempenho.',
                    'Severo' => 'Colaborador sem apoio, serviços inacessíveis e falta de informação constante.',
                ],
                3 => [ // 4. Supervisão
                    'Leve' => 'Supervisão justa, monitoramento razoável e feedback adequado.',
                    'Moderado' => 'Feedback inconsistente ou injustiça nas decisões.',
                    'Sério' => 'Feedback crônico ou inexistente, injustiça frequente.',
                    'Severo' => 'Supervisão abusiva, omissão de feedback e excesso de vigilância.',
                ],
                4 => [ // 5. Civilidade
                    'Leve' => 'Ambiente respeitoso e justo, civilidade é a regra.',
                    'Moderado' => 'Falta de civilidade pontual ou interação desrespeitosa.',
                    'Sério' => 'Falta de respeito frequente, abalando confiança e justiça.',
                    'Severo' => 'Falta de civilidade e respeito é a norma cultural.',
                ],
                5 => [ // 6. Relações Interpessoais
                    'Leve' => 'Comunicação clara e relacionamentos saudáveis.',
                    'Moderado' => 'Comunicação falha ocasionalmente ou pequenos atritos.',
                    'Sério' => 'Conflitos frequentes, comunicação crônica falha e baixo apoio.',
                    'Severo' => 'Ambiente hostil, conflitos constantes e comunicação ineficaz.',
                ],
                6 => [ // 7. Liderança
                    'Leve' => 'Líder claro, assume responsabilidades e atua com ética.',
                    'Moderado' => 'Falha ocasional em dar feedback ou assumir responsabilidades.',
                    'Sério' => 'Omissão frequente de informações ou falhas graves na responsabilidade.',
                    'Severo' => 'Líder abusivo, omissão de informações e falta de responsabilidade.',
                ],
                7 => [ // 8. Cultura Organizacional
                    'Leve' => 'Cultura transparente e justa, colaborador apoiado.',
                    'Moderado' => 'Comunicação falha em momentos importantes ou suporte limitado.',
                    'Sério' => 'Falhas crônicas de comunicação e normas injustas.',
                    'Severo' => 'Cultura abusiva, comunicação caótica e tratamento injusto.',
                ],
                8 => [ // 9. Carga de Trabalho
                    'Leve' => 'Colaborador lida bem com pressão ocasional, trabalho tem valor.',
                    'Moderado' => 'Agenda instável ou horas extras não programadas.',
                    'Sério' => 'Carga de horas extras longa e recorrente, instabilidade alta.',
                    'Severo' => 'Colaborador vive em função da empresa, agenda caótica e metas impossíveis.',
                ],
                9 => [ // 10. Estabilidade
                    'Leve' => 'Colaborador percebe estabilidade e remuneração justa.',
                    'Moderado' => 'Percepção de insegurança ou incômodo com remuneração.',
                    'Sério' => 'Medo de demissão alto, remuneração abaixo do mercado.',
                    'Severo' => 'Colaborador em regime precário, medo de demissão e remuneração injusta.',
                ],
                10 => [ // 11. Condições
                    'Leve' => 'Condições ambientais seguras e adequadas.',
                    'Moderado' => 'Desconforto ocasional ou falta de recurso essencial.',
                    'Sério' => 'Condições de risco ou equipamentos inadequados.',
                    'Severo' => 'Ambiente cronicamente inseguro, risco à saúde e integridade.',
                ],
                11 => [ // 12. Controle
                    'Leve' => 'Colaborador com domínio sobre ritmo e participa de decisões.',
                    'Moderado' => 'Autonomia limitada ou volume de trabalho no limite.',
                    'Sério' => 'Controle rígido e carga de trabalho excessiva.',
                    'Severo' => 'Colaborador sem autonomia, pressão extrema e exaustão.',
                ],
                12 => [ // 13. Mudanças
                    'Leve' => 'Mudanças raras e bem comunicadas.',
                    'Moderado' => 'Mudanças com comunicação ou suporte falhos.',
                    'Sério' => 'Frequência de mudanças desestabiliza rotina.',
                    'Severo' => 'Mudanças constantes, comunicação precária e estresse crônico.',
                ],
                13 => [ // 14. Ritmo
                    'Leve' => 'Colaborador lida bem com ritmo, pressão motivacional.',
                    'Moderado' => 'Pressão frequente ou ritmo imposto incomoda.',
                    'Sério' => 'Sobrecarga notória, metas irreais e ritmo imposto.',
                    'Severo' => 'Ambiente sobrecarregado, exaustão e ritmo controlado por máquinas.',
                ],
                14 => [ // 15. Funções
                    'Leve' => 'Colaborador com clareza sobre o que fazer e valor do trabalho.',
                    'Moderado' => 'Dúvidas ocasionais sobre prioridades ou demandas extras.',
                    'Sério' => 'Ordens contraditórias e papel descaracterizado.',
                    'Severo' => 'Colaborador "perdido", trabalho sem propósito e rotina caótica.',
                ],
                15 => [ // 16. Exigências Emocionais (Repete para 17 e 18)
                    'Leve' => 'Carga e exigências desafiadoras, mas gerenciáveis.',
                    'Moderado' => 'Pressão com prazos ou interação intensa.',
                    'Sério' => 'Sobrecarga quantitativa, subutilização de habilidades e alta demanda emocional.',
                    'Severo' => 'Colaborador cronicamente exausto, metas impossíveis e subutilizado.',
                ],
            ];
        @endphp

        <table class="table">
            <thead>
                <tr>
                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Categoria</th>
                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Média</th>
                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Severidade</th>
                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Risco</th>
                    {{-- Nova Coluna --}}
                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-left">Plano de Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mediasGerais as $dado)
                    <tr class="hover:bg-gray-200">
                        <td class="border text-center">{{ $dado['categoria'] }}</td>
                        <td class="border text-center font-bold">{{ number_format($dado['media'], 2, ',', '.') }}</td>
                        
                        {{-- Coluna Nível --}}
                        <td class="border text-center">
                            @php
                                // Definição de Cores
                                $corFundo = '#ccc';
                                $corTexto = '#000';
                                // Mapeamento do Nível (String)
                                // Nota: Mapeei "Risco Médio" do seu texto para "Moderado" do código
                                $nivelKey = $dado['nivel']; 

                                if ($dado['nivel'] === 'Leve') { 
                                    $corFundo = '#22c55e'; $corTexto = '#fff'; 
                                } elseif ($dado['nivel'] === 'Moderado') { 
                                    $corFundo = '#facc15'; $corTexto = '#000'; 
                                } elseif ($dado['nivel'] === 'Sério') { 
                                    $corFundo = '#f97316'; $corTexto = '#fff'; 
                                } else { 
                                    // Assumindo que o else é Severo
                                    $corFundo = '#dc2626'; $corTexto = '#fff'; 
                                    $nivelKey = 'Severo'; 
                                }
                            @endphp
                            <span style="background-color: {{ $corFundo }}; color: {{ $corTexto }}; padding: 5px 10px; border-radius: 6px;">
                                {{ $dado['nivel'] }}
                            </span>
                        </td>
                        <td class="border text-center">
                          @php
                            if ($dado['nivel'] === 'Leve') { 
                                    $risco = 'Insignificante';
                                } elseif ($dado['nivel'] === 'Moderado') { 
                                    $risco = 'Baixo';
                                } elseif ($dado['nivel'] === 'Sério') { 
                                    $risco = 'Alto';
                                } else { 
                                    
                                    $risco = 'Severo'; 
                                } 
                          @endphp 
                          {{$risco}}
                        </td>
                        {{-- Coluna Sugestão de Melhoria --}}
                        <td class="border text-left p-3">
                            @php
                                // Lógica para o índice: 
                                // O loop vai de 0 a 17. Se for maior que 15 (ou seja, 16 ou 17), força ser 15.
                                $idxArr = $loop->index;
                                if ($idxArr > 15) {
                                    $idxArr = 15;
                                }

                                // Recupera a frase baseada no índice da categoria e na chave do nível
                                $fraseSugestao = $sugestoesDict[$idxArr][$nivelKey] ?? 'Sem diagnóstico definido.';
                            @endphp
                            <span class="text-xs text-gray-700 dark:text-gray-300">
                                {{ $fraseSugestao }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> 

{{-- ================================================================= --}}
{{-- ==================== TABELAS DE DADOS POR SETOR =================== --}}
{{-- ================================================================= --}}
@foreach($mediasPorSetor as $setor => $dadosDoSetor)
<div class="intro-y box mt-8"> {{-- mt-8 para dar um espaçamento maior entre as tabelas --}}
    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
        <h2 class="font-medium text-base mr-auto">
            <a href="javascript:;" data-theme="light" class="tooltip" title="Média por Categoria para o setor {{ $setor }}">
                Resultados do Setor: <span class="font-bold">{{ $setor }}</span>
                {{-- Exibe a quantidade de respondentes do setor --}}
                <span class="text-gray-600 ml-2">({{ $dadosDoSetor['totalParticipantes'] }} respondente(s))</span>
                <i data-feather="users" class="w-4 h-4 ml-2 inline-block"></i>
            </a>
        </h2>
    </div>
    <div class="p-5">
        <div class="grid grid-cols-12 gap-x-5">
            <div class="col-span-12 xl:col-span-12">
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Categoria</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Média</th>
                                <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Nível</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dadosDoSetor['medias'] as $dado)
                                <tr class="hover:bg-gray-200">
                                    <td class="border text-center">{{ $dado['categoria'] }}</td>
                                    <td class="border text-center font-bold">{{ number_format($dado['media'], 2, ',', '.') }}</td>
                                    <td class="border text-center">
                                        @php
                                            $corFundo = '#ccc';
                                            $corTexto = '#000';
                                            if ($dado['nivel'] === 'Leve') { $corFundo = '#22c55e'; $corTexto = '#fff'; }
                                            elseif ($dado['nivel'] === 'Moderado') { $corFundo = '#facc15'; $corTexto = '#000'; }
                                            elseif ($dado['nivel'] === 'Sério') { $corFundo = '#f97316'; $corTexto = '#fff'; }
                                            else { $corFundo = '#dc2626'; $corTexto = '#fff'; }
                                        @endphp
                                        <span style="background-color: {{ $corFundo }}; color: {{ $corTexto }}; padding: 5px 10px; border-radius: 6px;">
                                            {{ $dado['nivel'] }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center border p-3">Nenhum dado encontrado para este setor</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
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