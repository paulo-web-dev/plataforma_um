<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AET Insights - Dashboard | {{ $empresa->nome }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @php
        // ── Fonte de dados: $empresa->mapeamento (relation do modelo) ─────────
        // Mesma coleção usada em relatorio.blade.php via $empresa->mapeamento
        $mapeamentos = $empresa->mapeamento;

        $totalPostos = $mapeamentos->count();

        $altoRisco  = $mapeamentos->filter(fn($m) =>
            str_contains(strtolower($m->classificacao), 'alto') ||
            str_contains(strtolower($m->classificacao), 'crít')
        )->count();

        $medioRisco = $mapeamentos->filter(fn($m) =>
            str_contains(strtolower($m->classificacao), 'méd') ||
            str_contains(strtolower($m->classificacao), 'med') ||
            str_contains(strtolower($m->classificacao), 'moderado')
        )->count();

        $baixoRisco = $mapeamentos->filter(fn($m) =>
            str_contains(strtolower($m->classificacao), 'baixo') ||
            str_contains(strtolower($m->classificacao), 'aceit')
        )->count();

        $base = $totalPostos > 0 ? $totalPostos : 1;

        $percAlto  = round(($altoRisco  / $base) * 100);
        $percMedio = round(($medioRisco / $base) * 100);
        $percBaixo = round(($baixoRisco / $base) * 100);

        // Conic-gradient: Baixo (verde) → Médio (laranja) → Alto (vermelho)
        $stop1 = $percBaixo;
        $stop2 = $percBaixo + $percMedio;

        // ── Totais de áreas / setores (via $empresa->area relation) ───────────
        $totalAreas   = $empresa->area->count();
        $totalSetores = $empresa->area->flatMap->setores->count();

        // ── Plano de ação ─────────────────────────────────────────────────────
        $totalPlanos = $empresa->planodeacao->count();

        // ── Conformidade NR-17: proxy = % de postos com risco baixo/aceitável ─
        $percConformidade = $percBaixo;

        // ── Cor principal da identidade visual ────────────────────────────────
        $corPrincipal = $identidade->cor_principal ?? '#1e5297';
    @endphp

    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f4f7f9; }

        .header-bg { background-color: {{ $corPrincipal }}; }

        .btn-secondary {
            background-color: color-mix(in srgb, {{ $corPrincipal }} 70%, black);
        }
        .btn-secondary:hover {
            background-color: color-mix(in srgb, {{ $corPrincipal }} 50%, black);
        }
        .btn-primary {
            background-color: color-mix(in srgb, {{ $corPrincipal }} 60%, white);
        }
        .btn-primary:hover {
            background-color: color-mix(in srgb, {{ $corPrincipal }} 40%, white);
        }

        .donut-chart {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: conic-gradient(
                #10b981 0% {{ $stop1 }}%,
                #f59e0b {{ $stop1 }}% {{ $stop2 }}%,
                #ef4444 {{ $stop2 }}% {{ $stop2 + $percAlto }}%,
                #e5e7eb {{ $stop2 + $percAlto }}% 100%
            );
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .donut-inner {
            width: 100px;
            height: 100px;
            background-color: white;
            border-radius: 50%;
        }
    </style>
</head>
<body class="text-gray-800 pb-10">

    {{-- ════════════════════════════════════════════════════════════════════ --}}
    {{-- CABEÇALHO                                                           --}}
    {{-- ════════════════════════════════════════════════════════════════════ --}}
    <header class="header-bg text-white pt-6 pb-12 px-8">
        <div class="max-w-7xl mx-auto">
            <div class="inline-flex items-center bg-black bg-opacity-20 text-xs px-3 py-1 rounded-full mb-4">
                <span class="w-2 h-2 bg-blue-300 rounded-full mr-2"></span>
                Análise Ergonômica do Trabalho
            </div>

            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-4xl font-bold mb-2">{{ $empresa->nome }}</h1>
                    <div class="flex flex-wrap items-center text-sm text-blue-100 gap-4 mb-2">
                        <span class="flex items-center">
                            <i class="fa-regular fa-building mr-2"></i> CNPJ {{ $empresa->cnpj }}
                        </span>
                        @foreach($empresa->responsaveis->take(1) as $resp)
                        <span class="flex items-center">
                            <i class="fa-regular fa-user mr-2"></i> {{ $resp->cargo }}: {{ $resp->nome }}
                        </span>
                        @endforeach
                        <span class="flex items-center">
                            <i class="fa-regular fa-calendar mr-2"></i>
                            {{ $empresa->periodo_inspecao }}
                        </span>
                    </div>
                    <p class="text-xs text-blue-200">
                        {{ $empresa->cidade }} – {{ $empresa->estado }} &nbsp;·&nbsp;
                        Grau de Risco {{ $empresa->grau_de_risco }} &nbsp;·&nbsp;
                        Ramo: {{ $empresa->setor }}
                    </p>
                </div>
                <div class="flex space-x-3">
                    <button onclick="window.location.reload()"
                        class="btn-secondary text-white px-4 py-2 rounded shadow flex items-center transition">
                        <i class="fa-solid fa-rotate-right mr-2"></i> Atualizar
                    </button>
                    <button onclick="window.print()"
                        class="btn-primary text-white px-4 py-2 rounded shadow flex items-center transition">
                        <i class="fa-solid fa-download mr-2"></i> Imprimir
                    </button>
                </div>
            </div>
        </div>
    </header>

    {{-- ════════════════════════════════════════════════════════════════════ --}}
    {{-- CONTEÚDO PRINCIPAL                                                  --}}
    {{-- ════════════════════════════════════════════════════════════════════ --}}
    <main class="max-w-7xl mx-auto px-8 -mt-8">

        {{-- ── KPI CARDS ─────────────────────────────────────────────────── --}}
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">

            {{-- Postos Analisados --}}
            <div class="bg-white rounded-lg p-5 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Postos Analisados</h3>
                    <div class="w-8 h-8 rounded bg-gray-100 text-gray-500 flex items-center justify-center">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                </div>
                <div class="text-3xl font-bold mb-1">{{ $totalPostos }}</div>
                <p class="text-xs text-gray-400">
                    {{ $totalAreas }} {{ $totalAreas == 1 ? 'área' : 'áreas' }},
                    {{ $totalSetores }} {{ $totalSetores == 1 ? 'setor' : 'setores' }}
                </p>
            </div>

            {{-- Risco Alto --}}
            <div class="bg-white rounded-lg p-5 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Risco Alto / Crítico</h3>
                    <div class="w-8 h-8 rounded bg-red-50 text-red-500 flex items-center justify-center">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                </div>
                <div class="text-3xl font-bold mb-1 {{ $percAlto > 0 ? 'text-red-600' : 'text-gray-700' }}">
                    {{ $percAlto }}%
                </div>
                <p class="text-xs text-gray-400">
                    {{ $altoRisco }} {{ $altoRisco == 1 ? 'posto' : 'postos' }} — ação imediata
                </p>
            </div>

            {{-- Risco Médio --}}
            <div class="bg-white rounded-lg p-5 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Risco Médio</h3>
                    <div class="w-8 h-8 rounded bg-yellow-50 text-yellow-500 flex items-center justify-center">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                </div>
                <div class="text-3xl font-bold mb-1">{{ $percMedio }}%</div>
                <p class="text-xs text-gray-400">
                    {{ $medioRisco }} {{ $medioRisco == 1 ? 'posto' : 'postos' }} — adequações necessárias
                </p>
            </div>

            {{-- Risco Baixo --}}
            <div class="bg-white rounded-lg p-5 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Risco Baixo / Aceitável</h3>
                    <div class="w-8 h-8 rounded bg-green-50 text-green-500 flex items-center justify-center">
                        <i class="fa-solid fa-shield-check"></i>
                    </div>
                </div>
                <div class="text-3xl font-bold mb-1">{{ $percBaixo }}%</div>
                <p class="text-xs text-gray-400">
                    {{ $baixoRisco }} {{ $baixoRisco == 1 ? 'posto' : 'postos' }} — monitoramento periódico
                </p>
            </div>

            {{-- Conformidade NR-17 --}}
            <div class="bg-white rounded-lg p-5 shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Conformidade NR-17</h3>
                    <div class="w-8 h-8 rounded bg-gray-100 text-gray-500 flex items-center justify-center">
                        <i class="fa-solid fa-check-double"></i>
                    </div>
                </div>
                <div class="text-2xl font-bold mb-1">{{ $percConformidade }}%</div>
                <p class="text-xs text-gray-400">
                    {{ $totalPlanos }} {{ $totalPlanos == 1 ? 'ação' : 'ações' }} no plano
                </p>
            </div>

        </div>

        {{-- ── DONUT + SETORES ───────────────────────────────────────────── --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">

            {{-- Donut de distribuição --}}
            <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-100 lg:col-span-1">
                <h3 class="text-base font-bold text-gray-800 mb-1">Distribuição de riscos</h3>
                <p class="text-xs text-gray-400 mb-8">Postos por nível de criticidade</p>

                <div class="flex flex-col items-center justify-center">
                    <div class="donut-chart mb-6">
                        <div class="donut-inner flex items-center justify-center">
                            <span class="text-xs font-bold text-gray-500">{{ $totalPostos }}<br>
                                <span class="text-gray-400 font-normal">postos</span>
                            </span>
                        </div>
                    </div>

                    <div class="flex justify-center space-x-4 w-full">
                        <div class="text-center bg-gray-50 rounded p-2 flex-1">
                            <div class="w-4 h-1 bg-red-500 mx-auto mb-1"></div>
                            <div class="text-xs text-gray-500">Alto/Crítico</div>
                            <div class="font-bold">{{ $percAlto }}%</div>
                        </div>
                        <div class="text-center bg-gray-50 rounded p-2 flex-1">
                            <div class="w-4 h-1 bg-yellow-500 mx-auto mb-1"></div>
                            <div class="text-xs text-gray-500">Médio</div>
                            <div class="font-bold">{{ $percMedio }}%</div>
                        </div>
                        <div class="text-center bg-gray-50 rounded p-2 flex-1">
                            <div class="w-4 h-1 bg-green-500 mx-auto mb-1"></div>
                            <div class="text-xs text-gray-500">Baixo</div>
                            <div class="font-bold">{{ $percBaixo }}%</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Riscos por Setor ─────────────────────────────────────────── --}}
            <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-100 lg:col-span-2">
                <h3 class="text-base font-bold text-gray-800 mb-1">Riscos por setor</h3>
                <p class="text-xs text-gray-400 mb-6">
                    Percentual de postos com risco alto em cada setor (baseado no mapeamento ergonômico)
                </p>

                <div class="space-y-4">
                    @php
                        // Agrupa os mapeamentos por setor e calcula % de risco alto em cada um
                        $porSetor = $mapeamentos->groupBy('setor');
                    @endphp

                    @forelse($porSetor as $nomeSetor => $itensSetor)
                    @php
                        $totalSetor = $itensSetor->count();
                        $altosSetor = $itensSetor->filter(fn($m) =>
                            str_contains(strtolower($m->classificacao), 'alto') ||
                            str_contains(strtolower($m->classificacao), 'crít')
                        )->count();
                        $percSetor = $totalSetor > 0 ? round(($altosSetor / $totalSetor) * 100) : 0;
                        $corBarra  = $percSetor >= 50 ? '#ef4444' : ($percSetor >= 20 ? '#f59e0b' : '#10b981');
                    @endphp
                    <div class="flex items-center">
                        <div class="w-36 text-sm text-gray-600 truncate" title="{{ $nomeSetor }}">
                            {{ $nomeSetor }}
                        </div>
                        <div class="flex-1 ml-3 relative h-4 bg-gray-100 rounded-full overflow-hidden">
                            <div class="absolute top-0 left-0 h-full rounded-full transition-all duration-500"
                                 style="width: {{ max($percSetor, 2) }}%; background-color: {{ $corBarra }}"></div>
                        </div>
                        <div class="w-16 text-right text-xs font-bold ml-2 text-gray-500">
                            {{ $altosSetor }}/{{ $totalSetor }} ({{ $percSetor }}%)
                        </div>
                    </div>
                    @empty
                    <p class="text-sm text-gray-400 italic">Nenhum mapeamento disponível.</p>
                    @endforelse
                </div>
            </div>

        </div>

        {{-- ── PLANO DE AÇÃO ────────────────────────────────────────────── --}}
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 mb-6">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                <div>
                    <h3 class="text-base font-bold text-gray-800">Plano de ação — Top 5 prioridades</h3>
                    <p class="text-xs text-gray-400">
                        Extraído de <strong>{{ $totalPlanos }}</strong> {{ $totalPlanos == 1 ? 'registro' : 'registros' }} cadastrados
                    </p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-gray-500 bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 font-medium">ÁREA</th>
                            <th class="px-6 py-3 font-medium">SETOR</th>
                            <th class="px-6 py-3 font-medium">POSTO DE TRABALHO</th>
                            <th class="px-6 py-3 font-medium">RECOMENDAÇÃO</th>
                            <th class="px-6 py-3 font-medium text-center">VIABILIDADE</th>
                            <th class="px-6 py-3 font-medium text-center">PRAZO</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-600">
                        @forelse($empresa->planodeacao->take(5) as $plano)
                        @php
                            $viabClasses = [
                                'Imediata' => 'bg-red-50 text-red-600 border-red-200',
                                'Curto'    => 'bg-yellow-50 text-yellow-700 border-yellow-200',
                                'Médio'    => 'bg-blue-50 text-blue-600 border-blue-200',
                                'Longo'    => 'bg-green-50 text-green-700 border-green-200',
                            ];
                            $viabKey = '';
                            foreach ($viabClasses as $k => $_) {
                                if (str_contains($plano->viabilidade ?? '', $k)) { $viabKey = $k; break; }
                            }
                            $badgeClass = $viabClasses[$viabKey] ?? 'bg-gray-100 text-gray-600 border-gray-200';
                        @endphp
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-xs">{{ $plano->area }}</td>
                            <td class="px-6 py-4 text-xs">{{ $plano->setor }}</td>
                            <td class="px-6 py-4 font-medium text-gray-700 text-xs">{{ $plano->posto_trabalho }}</td>
                            <td class="px-6 py-4 text-xs text-gray-600">
                                {{ Str::limit($plano->recomendacao, 140) }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="text-xs px-2 py-1 rounded-full border {{ $badgeClass }}">
                                    {{ $plano->viabilidade }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center text-xs text-gray-500">
                                {{ $plano->prazo }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-400 italic">
                                Nenhuma ação cadastrada no plano de ação.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ── MAPEAMENTO ERGONÔMICO — visão rápida ─────────────────────── --}}
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 mb-6">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-base font-bold text-gray-800">Mapeamento ergonômico — últimos registros</h3>
                <p class="text-xs text-gray-400">
                    Exibindo até 10 de {{ $totalPostos }} postos mapeados
                </p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-xs text-left">
                    <thead class="text-xs text-gray-500 bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 font-medium">ÁREA</th>
                            <th class="px-4 py-3 font-medium">SETOR</th>
                            <th class="px-4 py-3 font-medium">POSTO</th>
                            <th class="px-4 py-3 font-medium">FUNÇÃO</th>
                            <th class="px-4 py-3 font-medium">POSTURA</th>
                            <th class="px-4 py-3 font-medium">SOBRECARGA</th>
                            <th class="px-4 py-3 font-medium text-center">CLASSIFICAÇÃO</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-600">
                        @forelse($mapeamentos->take(10) as $mapeamento)
                        @php
                            $cls = strtolower($mapeamento->classificacao ?? '');
                            if (str_contains($cls, 'alto') || str_contains($cls, 'crít')) {
                                $badge = 'bg-red-50 text-red-600 border border-red-200';
                            } elseif (str_contains($cls, 'méd') || str_contains($cls, 'med') || str_contains($cls, 'moderado')) {
                                $badge = 'bg-yellow-50 text-yellow-700 border border-yellow-200';
                            } else {
                                $badge = 'bg-green-50 text-green-700 border border-green-200';
                            }
                        @endphp
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $mapeamento->area }}</td>
                            <td class="px-4 py-3">{{ $mapeamento->setor }}</td>
                            <td class="px-4 py-3 font-medium text-gray-700">{{ $mapeamento->posto_trabalho }}</td>
                            <td class="px-4 py-3">{{ Str::limit($mapeamento->funcao, 50) }}</td>
                            <td class="px-4 py-3">{{ $mapeamento->postura }}</td>
                            <td class="px-4 py-3">{{ $mapeamento->sobrecarga }}</td>
                            <td class="px-4 py-3 text-center">
                                <span class="text-xs px-2 py-1 rounded-full {{ $badge }}">
                                    {{ $mapeamento->classificacao }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-400 italic">
                                Nenhum mapeamento disponível.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ── RESPONSÁVEIS ─────────────────────────────────────────────── --}}
        @if($empresa->responsaveis->count() > 0)
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 mb-6 p-6">
            <h3 class="text-base font-bold text-gray-800 mb-4">Equipe responsável pela elaboração</h3>
            <div class="flex flex-wrap gap-4">
                @foreach($empresa->responsaveis as $resp)
                <div class="flex items-center gap-3 bg-gray-50 rounded-lg px-4 py-3">
                    <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center text-gray-500">
                        <i class="fa-solid fa-user-tie text-sm"></i>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-700">{{ $resp->nome }}</p>
                        <p class="text-xs text-gray-500">{{ $resp->cargo }}</p>
                        @if($resp->identidade_trabalho)
                        <p class="text-xs text-gray-400">{{ $resp->identidade_trabalho }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- ── RODAPÉ ───────────────────────────────────────────────────── --}}
        <div class="text-center text-xs text-gray-400 border-t border-gray-200 pt-6">
            Relatório gerado em {{ date('d/m/Y H:i') }} por
            <span class="font-bold text-gray-600">AET Insights</span>
            · CNPJ {{ $empresa->cnpj }}
            · Período: {{ $empresa->periodo_inspecao }}
        </div>

    </main>
</body>
</html>