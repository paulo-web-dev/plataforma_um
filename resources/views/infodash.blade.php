<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AET Insights — Dashboard | {{ $empresa->nome }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @php
        /* ═══════════════════════════════════════════════════════════════
         *  DADOS BASE
         * ═══════════════════════════════════════════════════════════════ */
        $mapeamentos  = $empresa->mapeamento;
        $totalPostos  = $mapeamentos->count();
        $corPrincipal = $identidade->cor_principal ?? '#1e5297';

        $fnAlto  = fn($m) => str_contains(strtolower($m->classificacao ?? ''), 'alto')
                          || str_contains(strtolower($m->classificacao ?? ''), 'crít');
        $fnMedio = fn($m) => str_contains(strtolower($m->classificacao ?? ''), 'méd')
                          || str_contains(strtolower($m->classificacao ?? ''), 'med')
                          || str_contains(strtolower($m->classificacao ?? ''), 'moderado');
        $fnBaixo = fn($m) => str_contains(strtolower($m->classificacao ?? ''), 'baixo')
                          || str_contains(strtolower($m->classificacao ?? ''), 'aceit');

        $altoRisco  = $mapeamentos->filter($fnAlto)->count();
        $medioRisco = $mapeamentos->filter($fnMedio)->count();
        $baixoRisco = $mapeamentos->filter($fnBaixo)->count();
        $base       = $totalPostos > 0 ? $totalPostos : 1;

        $percAlto  = round(($altoRisco  / $base) * 100);
        $percMedio = round(($medioRisco / $base) * 100);
        $percBaixo = round(($baixoRisco / $base) * 100);

        $stop1 = $percBaixo;
        $stop2 = $percBaixo + $percMedio;

        $totalAreas   = $empresa->area->count();
        $totalSetores = $empresa->area->flatMap->setores->count();
        $totalPlanos  = $empresa->planodeacao->count();
        $percConformidade = $percBaixo;

        $porSetor      = $mapeamentos->groupBy('setor');
        $porPostura    = $mapeamentos->groupBy('postura');
        $porSobrecarga = $mapeamentos->groupBy('sobrecarga');
        $porExigencia  = $mapeamentos->groupBy('exigencia');
        $planosPorViab = $empresa->planodeacao->groupBy(function($p) {
    $v = strtolower(trim($p->viabilidade ?? ''));
    if (str_contains($v, 'curto') || str_contains($v, 'imedia'))  return 'Curto Prazo';
    if (str_contains($v, 'médio') || str_contains($v, 'medio'))   return 'Médio Prazo';
    if (str_contains($v, 'anual') || str_contains($v, 'anua')
     || str_contains($v, 'longo') || str_contains($v, 'estudo'))  return 'Anual';
    return 'Anual'; // fallback
});
// Garante a ordem fixa
$planosPorViab = collect([
    'Curto Prazo' => $planosPorViab->get('Curto Prazo', collect()),
    'Médio Prazo' => $planosPorViab->get('Médio Prazo', collect()),
    'Anual'       => $planosPorViab->get('Anual',       collect()),
])->filter(fn($v) => $v->count() > 0);        $planosPorArea = $empresa->planodeacao->groupBy('area');

        $badgeCls = fn(string $cls): string =>
            (str_contains(strtolower($cls), 'alto') || str_contains(strtolower($cls), 'crít'))
                ? 'bg-red-50 text-red-600 border-red-200'
                : ((str_contains(strtolower($cls), 'méd') || str_contains(strtolower($cls), 'med'))
                    ? 'bg-yellow-50 text-yellow-700 border-yellow-200'
                    : 'bg-green-50 text-green-700 border-green-200');
    @endphp

    <style>
        :root { --cor: {{ $corPrincipal }}; }
        body { font-family: 'Inter', sans-serif; background: #f1f5f9; }
        .hdr { background: var(--cor); }

        .donut {
            width: 140px; height: 140px; border-radius: 50%;
            background: conic-gradient(
                #10b981 0% {{ $stop1 }}%,
                #f59e0b {{ $stop1 }}% {{ $stop2 }}%,
                #ef4444 {{ $stop2 }}% {{ $stop2 + $percAlto }}%,
                #e2e8f0 {{ $stop2 + $percAlto }}% 100%
            );
            display:flex; align-items:center; justify-content:center;
        }
        .donut-hole { width:92px; height:92px; background:#fff; border-radius:50%; }

        .dd-panel { overflow:hidden; transition:max-height .35s ease, opacity .25s ease; max-height:0; opacity:0; }
        .dd-panel.open { max-height:9999px; opacity:1; }
        .dd-trigger { cursor:pointer; user-select:none; }
        .dd-trigger .chevron { transition:transform .3s; }
        .dd-trigger.open .chevron { transform:rotate(180deg); }

        .mini-bar-wrap { height:6px; background:#e2e8f0; border-radius:99px; overflow:hidden; }
        .mini-bar { height:100%; border-radius:99px; transition:width .5s ease; }

        .sticky-bar {
            position:sticky; top:0; z-index:50;
            background:rgba(255,255,255,.92); backdrop-filter:blur(8px);
            border-bottom:1px solid #e2e8f0;
        }

        .pill { font-size:.65rem; padding:2px 8px; border-radius:99px; border-width:1px; border-style:solid; display:inline-block; white-space:nowrap; }

        .card { background:#fff; border-radius:12px; border:1px solid #e2e8f0; box-shadow:0 1px 3px rgba(0,0,0,.06); margin-bottom:1.5rem; }
        .card-hdr { padding:1.25rem 1.5rem; border-bottom:1px solid #f1f5f9; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:.5rem; }
        .card-body { padding:1.25rem 1.5rem; }

        .h-bar-wrap { height:10px; background:#e2e8f0; border-radius:99px; overflow:hidden; flex:1; margin:0 8px; }
        .h-bar { height:100%; border-radius:99px; }

        @media print {
            .no-print { display:none !important; }
            .dd-panel { max-height:9999px !important; opacity:1 !important; }
            .sticky-bar { position:static; }
        }
    </style>
</head>
<body class="text-gray-800 pb-16">

{{-- STICKY NAV --}}
<nav class="sticky-bar no-print">
    <div class="max-w-7xl mx-auto px-6 flex items-center gap-5 h-12 text-xs font-medium text-gray-500 overflow-x-auto">
        <a href="#kpis"       class="hover:text-gray-900 whitespace-nowrap">Resumo</a>
        <a href="#riscos"     class="hover:text-gray-900 whitespace-nowrap">Distribuição</a>
        <a href="#por-area"   class="hover:text-gray-900 whitespace-nowrap">Por Área</a>
        <a href="#por-setor"  class="hover:text-gray-900 whitespace-nowrap">Por Setor</a>
        <a href="#fatores"    class="hover:text-gray-900 whitespace-nowrap">Fatores</a>
        <a href="#plano"      class="hover:text-gray-900 whitespace-nowrap">Plano de Ação</a>
        <a href="#mapeamento" class="hover:text-gray-900 whitespace-nowrap">Mapeamento</a>
        <a href="#populacao"  class="hover:text-gray-900 whitespace-nowrap">População</a>
        <a href="#equipe"     class="hover:text-gray-900 whitespace-nowrap">Equipe</a>
    </div>
</nav>

{{-- HEADER --}}
<header class="hdr text-white pt-7 pb-14 px-8">
    <div class="max-w-7xl mx-auto">
        <div class="inline-flex items-center bg-black/20 text-xs px-3 py-1 rounded-full mb-4">
            <span class="w-2 h-2 bg-white/60 rounded-full mr-2"></span>
            Análise Ergonômica do Trabalho — Dashboard Interativo
        </div>
        <div class="flex flex-wrap justify-between items-start gap-4">
            <div>
                <h1 class="text-3xl font-bold mb-2">{{ $empresa->nome }}</h1>
                <div class="flex flex-wrap gap-4 text-sm text-white/80 mb-2">
                    <span><i class="fa-regular fa-building mr-1"></i> CNPJ {{ $empresa->cnpj }}</span>
                    @foreach($empresa->responsaveis->take(1) as $r)
                    <span><i class="fa-regular fa-user mr-1"></i> {{ $r->cargo }}: {{ $r->nome }}</span>
                    @endforeach
                    <span><i class="fa-regular fa-calendar mr-1"></i> {{ $empresa->periodo_inspecao }}</span>
                </div>
                <p class="text-xs text-white/60">
                    {{ $empresa->cidade }} – {{ $empresa->estado }}
                    &nbsp;·&nbsp; Grau de Risco {{ $empresa->grau_de_risco }}
                    &nbsp;·&nbsp; {{ $empresa->setor }}
                </p>
            </div>
            <div class="flex gap-2 no-print">
                <button onclick="expandAll()" class="bg-white/20 hover:bg-white/30 text-white text-xs px-4 py-2 rounded-lg flex items-center gap-2 transition">
                    <i class="fa-solid fa-expand"></i> Expandir Tudo
                </button>
                <button onclick="window.print()" class="bg-white/20 hover:bg-white/30 text-white text-xs px-4 py-2 rounded-lg flex items-center gap-2 transition">
                    <i class="fa-solid fa-print"></i> Imprimir
                </button>
                <button onclick="window.location.reload()" class="bg-white/20 hover:bg-white/30 text-white text-xs px-4 py-2 rounded-lg flex items-center gap-2 transition">
                    <i class="fa-solid fa-rotate-right"></i> Atualizar
                </button>
            </div>
        </div>
    </div>
</header>

<main class="max-w-7xl mx-auto px-6 -mt-8 space-y-6">

{{-- ══════ §1  KPI CARDS ══════ --}}
<section id="kpis">
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3">
        @php
            $kpis = [
                ['Postos Mapeados',    $totalPostos,                          'fa-chart-line',         'gray',   $totalAreas.' áreas · '.$totalSetores.' setores'],
                ['Alto / Crítico',     $altoRisco.' ('.$percAlto.'%)',        'fa-triangle-exclamation','red',   'Intervenção imediata'],
                ['Risco Médio',        $medioRisco.' ('.$percMedio.'%)',      'fa-circle-exclamation',  'yellow','Adequações necessárias'],
                ['Risco Baixo',        $baixoRisco.' ('.$percBaixo.'%)',      'fa-shield-check',        'green', 'Monitoramento periódico'],
                ['Plano de Ação',      $totalPlanos,                          'fa-list-check',          'blue',  $planosPorViab->count().' prazos distintos'],
                ['Conformidade NR-17', $percConformidade.'%',                  'fa-check-double',        'indigo','Baseado no risco aceitável'],
            ];
            $kpiColors = [
                'gray'   => ['bg-gray-50',   'text-gray-500',   'bg-gray-100'],
                'red'    => ['bg-red-50',    'text-red-500',    'bg-red-100'],
                'yellow' => ['bg-yellow-50', 'text-yellow-600', 'bg-yellow-100'],
                'green'  => ['bg-green-50',  'text-green-600',  'bg-green-100'],
                'blue'   => ['bg-blue-50',   'text-blue-600',   'bg-blue-100'],
                'indigo' => ['bg-indigo-50', 'text-indigo-600', 'bg-indigo-100'],
            ];
        @endphp
        @foreach($kpis as [$label, $valor, $icon, $cor, $sub])
        @php [$bg, $text, $iconBg] = $kpiColors[$cor]; @endphp
        <div class="{{ $bg }} rounded-xl p-4 border border-white shadow-sm">
            <div class="flex justify-between items-start mb-2">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide leading-tight">{{ $label }}</p>
                <div class="w-8 h-8 rounded-lg {{ $iconBg }} {{ $text }} flex items-center justify-center shrink-0">
                    <i class="fa-solid {{ $icon }} text-sm"></i>
                </div>
            </div>
            <div class="text-2xl font-bold text-gray-800 mb-1">{{ $valor }}</div>
            <p class="text-xs text-gray-400">{{ $sub }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- ══════ §2  DISTRIBUIÇÃO DE RISCOS  (drill-down por nível) ══════ --}}
<section id="riscos">
    <div class="card">
        <div class="card-hdr">
            <div>
                <h2 class="font-bold text-gray-800">Distribuição de Riscos</h2>
                <p class="text-xs text-gray-400 mt-0.5">Clique em cada nível para ver os postos detalhados</p>
            </div>
            <span class="text-xs text-gray-400">{{ $totalPostos }} postos</span>
        </div>
        <div class="card-body">
            <div class="flex flex-col lg:flex-row gap-8 items-start">

                {{-- donut --}}
                <div class="flex flex-col items-center gap-4 shrink-0">
                    <div class="donut">
                        <div class="donut-hole flex flex-col items-center justify-center">
                            <span class="text-lg font-bold text-gray-800">{{ $totalPostos }}</span>
                            <span class="text-xs text-gray-400">postos</span>
                        </div>
                    </div>
                    <div class="flex gap-3 text-xs">
                        <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-sm bg-green-500 inline-block"></span>Baixo</span>
                        <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-sm bg-yellow-400 inline-block"></span>Médio</span>
                        <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-sm bg-red-500 inline-block"></span>Alto</span>
                    </div>
                </div>

                {{-- accordion por nível --}}
                <div class="flex-1 space-y-3 w-full">
                    @php
                        $niveis = [
                            ['Alto / Crítico',      $altoRisco,  $percAlto,  '#ef4444', $mapeamentos->filter($fnAlto)],
                            ['Médio / Moderado',    $medioRisco, $percMedio, '#f59e0b', $mapeamentos->filter($fnMedio)],
                            ['Baixo / Aceitável',   $baixoRisco, $percBaixo, '#10b981', $mapeamentos->filter($fnBaixo)],
                        ];
                    @endphp
                    @foreach($niveis as $ni => [$nlabel, $nqtd, $nperc, $ncor, $ngrupo])
                    <div class="border border-gray-100 rounded-xl overflow-hidden">
                        <div class="dd-trigger flex items-center gap-4 px-4 py-3 bg-gray-50 hover:bg-gray-100 transition"
                             onclick="toggle('risco-{{ $ni }}', this)">
                            <div class="w-3 h-3 rounded-full shrink-0" style="background:{{ $ncor }}"></div>
                            <span class="font-semibold text-sm text-gray-700 flex-1">{{ $nlabel }}</span>
                            <span class="text-sm font-bold" style="color:{{ $ncor }}">{{ $nqtd }} postos</span>
                            <div class="w-32">
                                <div class="mini-bar-wrap">
                                    <div class="mini-bar" style="width:{{ $nperc }}%;background:{{ $ncor }}"></div>
                                </div>
                            </div>
                            <span class="text-xs text-gray-500 w-8 text-right">{{ $nperc }}%</span>
                            <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs"></i>
                        </div>
                        <div id="risco-{{ $ni }}" class="dd-panel">
                            @if($ngrupo->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="w-full text-xs">
                                    <thead><tr class="bg-white border-b border-gray-100">
                                        <th class="px-4 py-2 text-left text-gray-400 font-medium">ÁREA</th>
                                        <th class="px-4 py-2 text-left text-gray-400 font-medium">SETOR</th>
                                        <th class="px-4 py-2 text-left text-gray-400 font-medium">POSTO</th>
                                        <th class="px-4 py-2 text-left text-gray-400 font-medium">POSTURA</th>
                                        <th class="px-4 py-2 text-left text-gray-400 font-medium">SOBRECARGA</th>
                                        {{-- <th class="px-4 py-2 text-left text-gray-400 font-medium">EXIGÊNCIA</th> --}}
                                        <th class="px-4 py-2 text-center text-gray-400 font-medium">CLASSIFICAÇÃO</th>
                                    </tr></thead>
                                    <tbody class="divide-y divide-gray-50">
                                        @foreach($ngrupo as $m)
                                        <tr>
                                            <td class="px-4 py-2 text-gray-500">{{ $m->area }}</td>
                                            <td class="px-4 py-2 text-gray-600">{{ $m->setor }}</td>
                                            <td class="px-4 py-2 font-medium text-gray-800">{{ $m->posto_trabalho }}</td>
                                            {{-- <td class="px-4 py-2 text-gray-500">{{ Str::limit($m->funcao, 45) }}</td> --}}
                                            <td class="px-4 py-2 text-gray-500">{{ $m->postura }}</td>
                                            <td class="px-4 py-2 text-gray-500">{{ $m->sobrecarga }}</td>
                                            {{-- <td class="px-4 py-2 text-gray-500">{{ $m->exigencia }}</td> --}}
                                            <td class="px-4 py-2 text-center">
                                                <span class="pill border {{ $badgeCls($m->classificacao ?? '') }}">{{ $m->classificacao }}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <p class="px-4 py-4 text-xs text-gray-400 italic">Nenhum posto nesta classificação.</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ══════ §3  DRILL-DOWN  Área → Setor → Subsetor ══════ --}}
<section id="por-area">
    <div class="card">
        <div class="card-hdr">
            <div>
                <h2 class="font-bold text-gray-800">Análise Hierárquica: Área → Setor → Subsetor</h2>
                <p class="text-xs text-gray-400 mt-0.5">Clique para expandir cada nível — ferramentas, ambiente, população e saúde incluídos</p>
            </div>
            <span class="text-xs text-gray-400">{{ $totalAreas }} {{ $totalAreas == 1 ? 'área' : 'áreas' }}</span>
        </div>
        <div class="divide-y divide-gray-50">

            @foreach($empresa->area as $areaIdx => $area)
            @php
                $mapArea   = $mapeamentos->filter(fn($m) => $m->area == $area->nome);
                $altosArea = $mapArea->filter($fnAlto)->count();
                $totArea   = $mapArea->count();
                $percAA    = $totArea > 0 ? round(($altosArea/$totArea)*100) : 0;
                $corAA     = $percAA >= 50 ? '#ef4444' : ($percAA >= 20 ? '#f59e0b' : '#10b981');
            @endphp
            <div>
                <div class="dd-trigger flex items-center gap-4 px-5 py-4 hover:bg-gray-50 transition"
                     onclick="toggle('area-{{ $areaIdx }}', this)">
                    <div class="w-8 h-8 rounded-lg bg-slate-100 text-slate-500 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-layer-group text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">{{ $area->nome }}</p>
                        <p class="text-xs text-gray-400">
                            {{ $area->setores->count() }} setores ·
                            {{ $area->setores->flatMap->subsetores->count() }} subsetores ·
                            {{ $totArea }} postos mapeados
                        </p>
                    </div>
                    <div class="w-40 hidden md:block">
                        <div class="mini-bar-wrap">
                            <div class="mini-bar" style="width:{{ max($percAA,2) }}%;background:{{ $corAA }}"></div>
                        </div>
                        <p class="text-xs text-gray-400 mt-1 text-right">{{ $percAA }}% risco alto</p>
                    </div>
                    <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs ml-2"></i>
                </div>

                <div id="area-{{ $areaIdx }}" class="dd-panel bg-gray-50/50">
                    <div class="divide-y divide-gray-100 pl-8">

                        @foreach($area->setores as $setIdx => $setor)
                        @php
                            $mapSet   = $mapeamentos->filter(fn($m) => $m->setor == $setor->nome);
                            $altosSet = $mapSet->filter($fnAlto)->count();
                            $totSet   = $mapSet->count();
                            $percSA   = $totSet > 0 ? round(($altosSet/$totSet)*100) : 0;
                            $corSA    = $percSA >= 50 ? '#ef4444' : ($percSA >= 20 ? '#f59e0b' : '#10b981');
                        @endphp
                        <div>
                            <div class="dd-trigger flex items-center gap-4 px-5 py-3 hover:bg-gray-100/70 transition"
                                 onclick="toggle('setor-{{ $areaIdx }}-{{ $setIdx }}', this)">
                                <div class="w-7 h-7 rounded-md bg-blue-50 text-blue-400 flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-sitemap text-xs"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-700 text-sm">{{ $setor->nome }}</p>
                                    <p class="text-xs text-gray-400">{{ $setor->subsetores->count() }} subsetores · {{ $totSet }} postos</p>
                                </div>
                                <div class="w-32 hidden md:block">
                                    <div class="mini-bar-wrap">
                                        <div class="mini-bar" style="width:{{ max($percSA,2) }}%;background:{{ $corSA }}"></div>
                                    </div>
                                    <p class="text-xs text-gray-400 mt-1 text-right">{{ $percSA }}% alto</p>
                                </div>
                                <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs ml-2"></i>
                            </div>

                            <div id="setor-{{ $areaIdx }}-{{ $setIdx }}" class="dd-panel bg-white">
                                <div class="divide-y divide-gray-50 pl-8">

                                    @foreach($setor->subsetores as $subIdx => $subsetor)
                                    @php
                                        $simS   = isset($subsetor->dadossaude) ? $subsetor->dadossaude->sim : 0;
                                        $naoS   = isset($subsetor->dadossaude) ? $subsetor->dadossaude->nao : 0;
                                        $totS   = ($simS + $naoS) > 0 ? ($simS + $naoS) : 1;
                                        $percSim = round(($simS / $totS) * 100);
                                        $conclusoes = $subsetor->conclusoes ?? collect();
                                        $moores     = $subsetor->moore ?? collect();
                                        $popCount   = isset($subsetor->populacaosubsetor) ? $subsetor->populacaosubsetor->count() : 0;
                                    @endphp
                                    <div>
                                        <div class="dd-trigger flex items-center gap-3 px-5 py-3 hover:bg-gray-50 transition"
                                             onclick="toggle('sub-{{ $areaIdx }}-{{ $setIdx }}-{{ $subIdx }}', this)">
                                            <div class="w-6 h-6 rounded bg-indigo-50 text-indigo-400 flex items-center justify-center shrink-0">
                                                <i class="fa-solid fa-user-gear" style="font-size:.6rem"></i>
                                            </div>
                                            <div class="flex-1">
                                                <p class="text-sm font-medium text-gray-700">{{ $subsetor->nome }}</p>
                                                <p class="text-xs text-gray-400">
                                                    {{ $conclusoes->count() + $moores->count() }} avaliações ·
                                                    {{ $popCount }} trabalhadores
                                                    @if(isset($subsetor->dadossaude)) · {{ $percSim }}% queixas @endif
                                                </p>
                                            </div>
                                            <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs"></i>
                                        </div>

                                        <div id="sub-{{ $areaIdx }}-{{ $setIdx }}-{{ $subIdx }}" class="dd-panel">
                                            <div class="px-5 py-4 space-y-5 bg-slate-50/60">

                                                {{-- Descrição --}}
                                                @if($subsetor->descricao)
                                                <div>
                                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">Descrição</p>
                                                    <p class="text-xs text-gray-600 leading-relaxed">{{ Str::limit(strip_tags($subsetor->descricao), 500) }}</p>
                                                </div>
                                                @endif

                                                {{-- Características do ambiente --}}
                                                @if(isset($subsetor->caracteristicas) && $subsetor->caracteristicas->count() > 0)
                                                <div>
                                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Características do Ambiente de Trabalho</p>
                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
                                                        @foreach($subsetor->caracteristicas as $car)
                                                        <p class="text-xs text-gray-600">
                                                            <span class="font-medium text-gray-700">{{ $car->titulo }}:</span>
                                                            {{ strip_tags($car->descricao) }}
                                                        </p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif

                                                {{-- Organização do trabalho --}}
                                                @if(isset($subsetor->dadosOrganizacionais) && $subsetor->dadosOrganizacionais->count() > 0)
                                                <div>
                                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Organização do Trabalho</p>
                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
                                                        @foreach($subsetor->dadosOrganizacionais as $dado)
                                                        @php $partes = explode(':', $dado->dado, 2); @endphp
                                                        <p class="text-xs text-gray-600">
                                                            <span class="font-medium text-gray-700">{{ $partes[0] }}:</span>
                                                            {{ isset($partes[1]) ? $partes[1] : '' }}
                                                        </p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif

                                                {{-- Análise da Atividade --}}
                                                @if(isset($subsetor->analiseAtividade))
                                                <div>
                                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">Análise da Atividade</p>
                                                    <p class="text-xs text-gray-600 leading-relaxed">{{ Str::limit(strip_tags($subsetor->analiseAtividade->analise), 500) }}</p>
                                                </div>
                                                @endif

                                                {{-- Ferramentas ergonômicas --}}
                                                @if($conclusoes->count() > 0 || $moores->count() > 0)
                                                <div>
                                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Resultados das Ferramentas Ergonômicas</p>
                                                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                                                        <table class="w-full text-xs">
                                                            <thead><tr class="bg-gray-100">
                                                                <th class="px-3 py-2 text-left font-medium text-gray-500">FERRAMENTA</th>
                                                                <th class="px-3 py-2 text-left font-medium text-gray-500">ATIVIDADE</th>
                                                                <th class="px-3 py-2 text-left font-medium text-gray-500">RESULTADO / CONCLUSÃO</th>
                                                                <th class="px-3 py-2 text-left font-medium text-gray-500">MEMBRO</th>
                                                            </tr></thead>
                                                            <tbody class="bg-white divide-y divide-gray-50">
                                                                @foreach($moores as $moore)
                                                                <tr>
                                                                    <td class="px-3 py-2 font-medium text-gray-700">Moore &amp; Garg</td>
                                                                    <td class="px-3 py-2 text-gray-600">{{ $moore->atividade }}</td>
                                                                    <td class="px-3 py-2 text-gray-600">FIT:{{ $moore->fit }} / FDE:{{ $moore->fde }} / FFE:{{ $moore->ffe }}</td>
                                                                    <td class="px-3 py-2 text-gray-500">Punhos e Mãos</td>
                                                                </tr>
                                                                @endforeach
                                                                @foreach($conclusoes as $conc)
                                                                <tr>
                                                                    <td class="px-3 py-2 font-medium text-gray-700">{{ $conc->ferramenta }}</td>
                                                                    <td class="px-3 py-2 text-gray-600">{{ $conc->atividade }}</td>
                                                                    <td class="px-3 py-2 text-gray-600">{{ $conc->conclusao }}</td>
                                                                    <td class="px-3 py-2 text-gray-500">{{ $conc->membro ?? '—' }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                @endif

                                                {{-- Pré-diagnóstico --}}
                                                @if(isset($subsetor->preDiagnostico) && $subsetor->preDiagnostico->count() > 0)
                                                <div>
                                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Pré-Diagnóstico</p>
                                                    <ul class="space-y-1">
                                                        @foreach($subsetor->preDiagnostico as $diag)
                                                        <li class="text-xs text-gray-600"><span class="font-medium text-gray-700">{{ $diag->titulo }}:</span> {{ $diag->descricao }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif

                                                {{-- Dados de saúde --}}
                                                @if(isset($subsetor->dadossaude))
                                                <div>
                                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Queixas de Saúde — {{ $subsetor->dadossaude->titulo ?? '' }}</p>
                                                    <div class="flex items-center gap-2 max-w-xs">
                                                        <span class="text-xs text-gray-500 w-20">Com queixas</span>
                                                        <div class="h-bar-wrap"><div class="h-bar bg-red-400" style="width:{{ $percSim }}%"></div></div>
                                                        <span class="text-xs font-bold text-red-500 w-20 text-right">{{ $percSim }}% ({{ $simS }})</span>
                                                    </div>
                                                    <div class="flex items-center gap-2 max-w-xs mt-1">
                                                        <span class="text-xs text-gray-500 w-20">Sem queixas</span>
                                                        <div class="h-bar-wrap"><div class="h-bar bg-green-400" style="width:{{ 100-$percSim }}%"></div></div>
                                                        <span class="text-xs font-bold text-green-500 w-20 text-right">{{ 100-$percSim }}% ({{ $naoS }})</span>
                                                    </div>
                                                </div>
                                                @endif

                                                {{-- Fotos --}}
                                                @if(isset($subsetor->fotosatividade) && $subsetor->fotosatividade->count() > 0)
                                                <div>
                                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Registros Fotográficos ({{ $subsetor->fotosatividade->count() }})</p>
                                                    <div class="flex flex-wrap gap-2">
                                                        @foreach($subsetor->fotosatividade->take(4) as $foto)
                                                        <img src="/fotos-atividades/{{ $foto->photo }}"
                                                             class="h-24 w-32 object-cover rounded-lg border border-gray-200"
                                                             alt="{{ $subsetor->nome }}">
                                                        @endforeach
                                                    </div>
                                                    @if(isset($subsetor->descricaoFotos))
                                                    <p class="text-xs text-gray-400 mt-1">{{ $subsetor->descricaoFotos->descricao }}</p>
                                                    @endif
                                                </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ══════ §4  COMPARATIVO POR SETOR (barras empilhadas + drill) ══════ --}}
<section id="por-setor">
    <div class="card">
        <div class="card-hdr">
            <div>
                <h2 class="font-bold text-gray-800">Comparativo de Risco por Setor</h2>
                <p class="text-xs text-gray-400 mt-0.5">Barra empilhada: verde = baixo · amarelo = médio · vermelho = alto. Clique para detalhar.</p>
            </div>
        </div>
        <div class="card-body space-y-2">
            @forelse($porSetor as $nomeSetor => $itensSetor)
            @php
                $tot = $itensSetor->count();
                $alt = $itensSetor->filter($fnAlto)->count();
                $med = $itensSetor->filter($fnMedio)->count();
                $bx  = $itensSetor->filter($fnBaixo)->count();
                $pA  = $tot > 0 ? round(($alt/$tot)*100) : 0;
                $pM  = $tot > 0 ? round(($med/$tot)*100) : 0;
                $pB  = $tot > 0 ? round(($bx/$tot)*100)  : 0;
                $sk  = 'sc-'.Str::slug($nomeSetor);
            @endphp
            <div class="border border-gray-100 rounded-xl overflow-hidden">
                <div class="dd-trigger flex items-center gap-4 px-4 py-3 hover:bg-gray-50 transition"
                     onclick="toggle('{{ $sk }}', this)">
                    <p class="font-medium text-sm text-gray-700 w-44 truncate shrink-0">{{ $nomeSetor }}</p>
                    <div class="flex-1 h-5 rounded-full overflow-hidden flex min-w-0">
                        @if($pB > 0)<div class="h-full bg-green-400" style="width:{{ $pB }}%"></div>@endif
                        @if($pM > 0)<div class="h-full bg-yellow-400" style="width:{{ $pM }}%"></div>@endif
                        @if($pA > 0)<div class="h-full bg-red-400" style="width:{{ $pA }}%"></div>@endif
                    </div>
                    <div class="flex gap-3 text-xs shrink-0">
                        <span class="text-green-600 font-semibold">{{ $pB }}%</span>
                        <span class="text-yellow-600 font-semibold">{{ $pM }}%</span>
                        <span class="text-red-600 font-semibold">{{ $pA }}%</span>
                    </div>
                    <span class="text-xs text-gray-400 w-16 text-right shrink-0">{{ $tot }} postos</span>
                    <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs"></i>
                </div>
                <div id="{{ $sk }}" class="dd-panel">
                    <div class="overflow-x-auto">
                        <table class="w-full text-xs">
                            <thead><tr class="bg-gray-50 border-b border-gray-100">
                                <th class="px-4 py-2 text-left text-gray-400 font-medium">POSTO</th>
                                <th class="px-4 py-2 text-left text-gray-400 font-medium">FUNÇÃO</th>
                                <th class="px-4 py-2 text-left text-gray-400 font-medium">ATIVIDADE</th>
                                <th class="px-4 py-2 text-left text-gray-400 font-medium">POSTURA</th>
                                <th class="px-4 py-2 text-left text-gray-400 font-medium">SOBRECARGA</th>
                                <th class="px-4 py-2 text-left text-gray-400 font-medium">EXIGÊNCIA</th>
                                <th class="px-4 py-2 text-center text-gray-400 font-medium">RISCO</th>
                            </tr></thead>
                            <tbody class="divide-y divide-gray-50 bg-white">
                                @foreach($itensSetor as $m)
                                <tr>
                                    <td class="px-4 py-2 font-medium text-gray-700">{{ $m->posto_trabalho }}</td>
                                    <td class="px-4 py-2 text-gray-600">{{ Str::limit($m->funcao, 45) }}</td>
                                    <td class="px-4 py-2 text-gray-500">{{ $m->atividade }}</td>
                                    <td class="px-4 py-2 text-gray-500">{{ $m->postura }}</td>
                                    <td class="px-4 py-2 text-gray-500">{{ $m->sobrecarga }}</td>
                                    <td class="px-4 py-2 text-gray-500">{{ $m->exigencia }}</td>
                                    <td class="px-4 py-2 text-center">
                                        <span class="pill border {{ $badgeCls($m->classificacao ?? '') }}">{{ $m->classificacao }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-xs text-gray-400 italic">Sem dados.</p>
            @endforelse
        </div>
    </div>
</section>

{{-- ══════ §5  FATORES  (postura / sobrecarga / exigência) ══════ --}}
<section id="fatores">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        @php
            $fatorGroups = [
                ['Postura de Trabalho',   $porPostura,    'fa-person-walking', '#6366f1'],
                ['Sobrecarga Física',     $porSobrecarga, 'fa-weight-hanging', '#f59e0b'],
                ['Exigência da Atividade',$porExigencia,  'fa-bolt',           '#ef4444'],
            ];
        @endphp
        @foreach($fatorGroups as $fgIdx => [$fgLabel, $fgData, $fgIcon, $fgCor])
        <div class="card">
            <div class="card-hdr">
                <div class="flex items-center gap-2">
                    <i class="fa-solid {{ $fgIcon }} text-sm" style="color:{{ $fgCor }}"></i>
                    <h2 class="font-bold text-gray-800 text-sm">{{ $fgLabel }}</h2>
                </div>
                <span class="text-xs text-gray-400">{{ $fgData->count() }} grupos</span>
            </div>
            <div class="p-4 space-y-2">
                @forelse($fgData as $fgVal => $fgItens)
                @php
                    $fgTot  = $fgItens->count();
                    $fgAlt  = $fgItens->filter($fnAlto)->count();
                    $fgPerc = $fgTot > 0 ? round(($fgAlt/$fgTot)*100) : 0;
                    $fgBarC = $fgPerc >= 50 ? '#ef4444' : ($fgPerc >= 20 ? '#f59e0b' : '#10b981');
                    $fgKey  = 'fg-'.$fgIdx.'-'.Str::slug($fgVal ?? 'nd');
                @endphp
                <div class="border border-gray-100 rounded-lg overflow-hidden">
                    <div class="dd-trigger flex items-center gap-2 px-3 py-2 bg-gray-50 hover:bg-gray-100 transition text-xs"
                         onclick="toggle('{{ $fgKey }}', this)">
                        <span class="flex-1 font-medium text-gray-700 truncate">{{ $fgVal ?: 'Não informado' }}</span>
                        <div class="w-20"><div class="mini-bar-wrap"><div class="mini-bar" style="width:{{ max($fgPerc,2) }}%;background:{{ $fgBarC }}"></div></div></div>
                        <span class="w-12 text-right text-gray-500">{{ $fgTot }} pos.</span>
                        <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs"></i>
                    </div>
                    <div id="{{ $fgKey }}" class="dd-panel">
                        <ul class="divide-y divide-gray-50 bg-white">
                            @foreach($fgItens as $fm)
                            <li class="px-3 py-2 flex items-center gap-2 text-xs">
                                <span class="flex-1 text-gray-700">{{ $fm->posto_trabalho }} <span class="text-gray-400">– {{ $fm->setor }}</span></span>
                                <span class="pill border {{ $badgeCls($fm->classificacao ?? '') }}">{{ $fm->classificacao }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @empty
                <p class="text-xs text-gray-400 italic">Sem dados.</p>
                @endforelse
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- ══════ §6  PLANO DE AÇÃO — por viabilidade + por área ══════ --}}
<section id="plano">
    <div class="card">
        <div class="card-hdr">
            <div>
                <h2 class="font-bold text-gray-800">Plano de Ação</h2>
                <p class="text-xs text-gray-400 mt-0.5">{{ $totalPlanos }} ações — agrupadas por viabilidade</p>
            </div>
            <div class="flex gap-2 flex-wrap">
                @foreach($planosPorViab as $viab => $pItens)
                @php $vc = match($viab) {
                    'Curto Prazo' => 'bg-red-100 text-red-600',
                    'Médio Prazo' => 'bg-yellow-100 text-yellow-700',
                    default       => 'bg-green-100 text-green-700',
                }; @endphp
                <span class="text-xs px-2 py-1 rounded-lg font-medium {{ $vc }}">{{ $viab }}: {{ $pItens->count() }}</span>
                @endforeach
            </div>
        </div>
        <div class="card-body space-y-3">
            @forelse($planosPorViab as $viab => $pItens)
            @php
                $vk = 'pv-'.Str::slug($viab ?? 'nd');
                $vBrd = match($viab) {
    'Curto Prazo' => 'border-red-200',
    'Médio Prazo' => 'border-yellow-200',
    default       => 'border-green-200',
};
$vHdr = match($viab) {
    'Curto Prazo' => 'bg-red-50',
    'Médio Prazo' => 'bg-yellow-50',
    default       => 'bg-green-50',
};
            @endphp
            <div class="border {{ $vBrd }} rounded-xl overflow-hidden">
                <div class="dd-trigger flex items-center gap-4 px-4 py-3 {{ $vHdr }} hover:brightness-95 transition"
                     onclick="toggle('{{ $vk }}', this)">
                    <span class="font-semibold text-sm text-gray-700 flex-1">{{ $viab ?: 'Sem viabilidade' }}</span>
                    <span class="text-sm font-bold text-gray-600">{{ $pItens->count() }} ações</span>
                    <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs"></i>
                </div>
                <div id="{{ $vk }}" class="dd-panel">
                    <div class="divide-y divide-gray-50">
                        @foreach($pItens as $plano)
                        <div class="px-4 py-3 flex flex-col md:flex-row gap-4 bg-white text-xs">
                            <div class="flex-1">
                                <p class="font-semibold text-gray-700 mb-1">{{ $plano->posto_trabalho }}</p>
                                <p class="text-gray-500 mb-1">
                                    <span class="font-medium text-gray-600">{{ $plano->area }}</span>
                                    <span class="mx-1 text-gray-300">›</span>{{ $plano->setor }}
                                </p>
                                <p class="text-gray-500"><span class="font-medium text-gray-600">Exigência:</span> {{ $plano->exigencia }}</p>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-gray-600 mb-1">Recomendação</p>
                                <p class="text-gray-600 leading-relaxed">{{ $plano->recomendacao }}</p>
                            </div>
                            <div class="md:w-28 shrink-0 space-y-1">
                                <p class="font-medium text-gray-500">Prazo</p>
                                <p class="text-gray-700 font-semibold">{{ $plano->prazo }}</p>
                                <p class="font-medium text-gray-500 mt-2">Função</p>
                                <p class="text-gray-600">{{ Str::limit($plano->funcao, 40) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @empty
            <p class="text-xs text-gray-400 italic">Nenhuma ação cadastrada.</p>
            @endforelse
        </div>
    </div>

    {{-- plano por área --}}
    @if($planosPorArea->count() > 1)
    <div class="card">
        <div class="card-hdr">
            <h2 class="font-bold text-gray-800">Plano de Ação por Área</h2>
        </div>
        <div class="card-body space-y-2">
            @foreach($planosPorArea as $nomeAreaP => $acoesArea)
            @php
                $apk = 'pa-'.Str::slug($nomeAreaP ?? 'nd');
                $percAP = $totalPlanos > 0 ? round(($acoesArea->count()/$totalPlanos)*100) : 0;
            @endphp
            <div class="border border-gray-100 rounded-xl overflow-hidden">
                <div class="dd-trigger flex items-center gap-4 px-4 py-3 bg-gray-50 hover:bg-gray-100 transition"
                     onclick="toggle('{{ $apk }}', this)">
                    <span class="font-medium text-sm text-gray-700 flex-1">{{ $nomeAreaP ?: 'Sem área' }}</span>
                    <div class="w-32"><div class="mini-bar-wrap"><div class="mini-bar bg-indigo-400" style="width:{{ max($percAP,2) }}%"></div></div></div>
                    <span class="text-xs text-gray-500 w-16 text-right">{{ $acoesArea->count() }} ações</span>
                    <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs"></i>
                </div>
                <div id="{{ $apk }}" class="dd-panel">
                    <div class="overflow-x-auto">
                        <table class="w-full text-xs">
                            <thead><tr class="bg-gray-50 border-b border-gray-100">
                                <th class="px-4 py-2 text-left text-gray-400 font-medium">SETOR</th>
                                <th class="px-4 py-2 text-left text-gray-400 font-medium">POSTO</th>
                                <th class="px-4 py-2 text-left text-gray-400 font-medium">RECOMENDAÇÃO</th>
                                <th class="px-4 py-2 text-center text-gray-400 font-medium">PRAZO</th>
                                <th class="px-4 py-2 text-center text-gray-400 font-medium">VIABILIDADE</th>
                            </tr></thead>
                            <tbody class="divide-y divide-gray-50 bg-white">
                                @foreach($acoesArea as $acao)
                                <tr>
                                    <td class="px-4 py-2 text-gray-600">{{ $acao->setor }}</td>
                                    <td class="px-4 py-2 font-medium text-gray-700">{{ $acao->posto_trabalho }}</td>
                                    <td class="px-4 py-2 text-gray-600">{{ Str::limit($acao->recomendacao, 100) }}</td>
                                    <td class="px-4 py-2 text-center text-gray-500">{{ $acao->prazo }}</td>
                                    <td class="px-4 py-2 text-center">
                                        <span class="pill border bg-gray-50 text-gray-600 border-gray-200">{{ $acao->viabilidade }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</section>

{{-- ══════ §7  MAPEAMENTO COMPLETO (tabela filtrável) ══════ --}}
<section id="mapeamento">
    <div class="card">
        <div class="card-hdr">
            <div>
                <h2 class="font-bold text-gray-800">Mapeamento Ergonômico Completo</h2>
                <p class="text-xs text-gray-400 mt-0.5">{{ $totalPostos }} registros</p>
            </div>
        </div>
        <div class="px-5 py-3 border-b border-gray-100 flex flex-wrap gap-2 no-print">
            <input type="text" placeholder="Buscar posto, setor, função..."
                   oninput="filterTable('mapTable', this.value)"
                   class="text-xs border border-gray-200 rounded-lg px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-indigo-200">
            <select onchange="filterTableByCol('mapTable', this.value, 7)"
                    class="text-xs border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                <option value="">Todos os riscos</option>
                <option value="alto">Alto / Crítico</option>
                <option value="méd">Médio</option>
                <option value="baixo">Baixo</option>
            </select>
        </div>
        <div class="overflow-x-auto">
            <table id="mapTable" class="w-full text-xs">
                <thead><tr class="bg-gray-50 border-b border-gray-100">
                    <th class="px-4 py-3 text-left text-gray-400 font-medium">ÁREA</th>
                    <th class="px-4 py-3 text-left text-gray-400 font-medium">SETOR</th>
                    <th class="px-4 py-3 text-left text-gray-400 font-medium">POSTO</th>
                    <th class="px-4 py-3 text-left text-gray-400 font-medium">FUNÇÃO</th>
                    <th class="px-4 py-3 text-left text-gray-400 font-medium">ATIVIDADE</th>
                    <th class="px-4 py-3 text-left text-gray-400 font-medium">POSTURA</th>
                    <th class="px-4 py-3 text-left text-gray-400 font-medium">SOBRECARGA</th>
                    <th class="px-4 py-3 text-center text-gray-400 font-medium">CLASSIFICAÇÃO</th>
                </tr></thead>
                <tbody class="divide-y divide-gray-50 bg-white">
                    @forelse($mapeamentos as $m)
                    <tr>
                        <td class="px-4 py-2 text-gray-500">{{ $m->area }}</td>
                        <td class="px-4 py-2 text-gray-600">{{ $m->setor }}</td>
                        <td class="px-4 py-2 font-medium text-gray-800">{{ $m->posto_trabalho }}</td>
                        <td class="px-4 py-2 text-gray-500">{{ Str::limit($m->funcao, 45) }}</td>
                        <td class="px-4 py-2 text-gray-500">{{ $m->atividade }}</td>
                        <td class="px-4 py-2 text-gray-500">{{ $m->postura }}</td>
                        <td class="px-4 py-2 text-gray-500">{{ $m->sobrecarga }}</td>
                        <td class="px-4 py-2 text-center">
                            <span class="pill border {{ $badgeCls($m->classificacao ?? '') }}">{{ $m->classificacao }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="8" class="px-4 py-8 text-center text-gray-400 italic">Sem registros.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

{{-- ══════ §8  POPULAÇÃO por subsetor ══════ --}}
<section id="populacao">
    @php
        $subsComPop = $empresa->area->flatMap->setores->flatMap->subsetores->filter(
            fn($s) => isset($s->populacaosubsetor) && $s->populacaosubsetor->count() > 0
        );
    @endphp
    @if($subsComPop->count() > 0)
    <div class="card">
        <div class="card-hdr">
            <div>
                <h2 class="font-bold text-gray-800">Características da População</h2>
                <p class="text-xs text-gray-400 mt-0.5">Dados demográficos por subsetor</p>
            </div>
            <span class="text-xs text-gray-400">{{ $subsComPop->count() }} subsetores com dados</span>
        </div>
        <div class="divide-y divide-gray-50">
            @foreach($subsComPop as $popIdx => $sub)
            @php
                $pop      = $sub->populacaosubsetor;
                $totalPop = $pop->count();
                $generos  = $pop->groupBy('genero');
                $faixas   = $pop->groupBy('faixa_etaria');
                $escols   = $pop->groupBy('escolaridade');
                $tempos   = $pop->groupBy('tempo_admissao');
                $simSp    = isset($sub->dadossaude) ? $sub->dadossaude->sim : 0;
                $naoSp    = isset($sub->dadossaude) ? $sub->dadossaude->nao : 0;
                $totSp    = ($simSp + $naoSp) > 0 ? ($simSp + $naoSp) : 1;
                $percSimp = round(($simSp / $totSp) * 100);
            @endphp
            <div>
                <div class="dd-trigger flex items-center gap-4 px-5 py-4 hover:bg-gray-50 transition"
                     onclick="toggle('pop-{{ $popIdx }}', this)">
                    <div class="w-8 h-8 rounded-lg bg-purple-50 text-purple-400 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-users text-sm"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-700 text-sm">{{ $sub->nome }}</p>
                        <p class="text-xs text-gray-400">{{ $totalPop }} trabalhadores mapeados</p>
                    </div>
                    <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs"></i>
                </div>
                <div id="pop-{{ $popIdx }}" class="dd-panel">
                    <div class="px-5 py-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 bg-slate-50/60">
                        @foreach([
                            ['Gênero',           $generos,  '#6366f1'],
                            ['Faixa Etária',      $faixas,   '#f59e0b'],
                            ['Escolaridade',      $escols,   '#10b981'],
                            ['Tempo de Admissão', $tempos,   '#ef4444'],
                        ] as [$popLabel, $popGroup, $popCor])
                        <div class="bg-white rounded-xl border border-gray-100 p-4">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">{{ $popLabel }}</p>
                            <div class="space-y-2">
                                @foreach($popGroup as $popVal => $popItens)
                                @php $pp = $totalPop > 0 ? round(($popItens->count()/$totalPop)*100) : 0; @endphp
                                <div>
                                    <div class="flex justify-between text-xs text-gray-600 mb-0.5">
                                        <span class="truncate">{{ $popVal ?: 'N/I' }}</span>
                                        <span class="font-medium ml-2 shrink-0">{{ $popItens->count() }} ({{ $pp }}%)</span>
                                    </div>
                                    <div class="mini-bar-wrap">
                                        <div class="mini-bar" style="width:{{ $pp }}%;background:{{ $popCor }}"></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @if(isset($sub->dadossaude))
                    <div class="px-5 pb-4 bg-slate-50/60">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-2">Queixas de Saúde — {{ $sub->dadossaude->titulo ?? '' }}</p>
                        <div class="flex items-center gap-2 max-w-sm">
                            <span class="text-xs text-gray-500 w-24">Com queixas</span>
                            <div class="h-bar-wrap"><div class="h-bar bg-red-400" style="width:{{ $percSimp }}%"></div></div>
                            <span class="text-xs font-bold text-red-500 w-20 text-right">{{ $percSimp }}% ({{ $simSp }})</span>
                        </div>
                        <div class="flex items-center gap-2 max-w-sm mt-1">
                            <span class="text-xs text-gray-500 w-24">Sem queixas</span>
                            <div class="h-bar-wrap"><div class="h-bar bg-green-400" style="width:{{ 100-$percSimp }}%"></div></div>
                            <span class="text-xs font-bold text-green-500 w-20 text-right">{{ 100-$percSimp }}% ({{ $naoSp }})</span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</section>

{{-- ══════ §9  EQUIPE ══════ --}}
<section id="equipe">
    @if($empresa->responsaveis->count() > 0)
    <div class="card">
        <div class="card-hdr">
            <h2 class="font-bold text-gray-800">Equipe Responsável pela Elaboração</h2>
        </div>
        <div class="card-body flex flex-wrap gap-4">
            @foreach($empresa->responsaveis as $resp)
            <div class="flex items-center gap-3 bg-gray-50 rounded-xl px-4 py-3 border border-gray-100">
                <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-500 flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-800">{{ $resp->nome }}</p>
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
</section>

{{-- RODAPÉ --}}
<div class="text-center text-xs text-gray-400 border-t border-gray-200 pt-6">
    Dashboard gerado em {{ date('d/m/Y H:i') }} ·
    <span class="font-semibold text-gray-600">AET Insights</span> ·
    CNPJ {{ $empresa->cnpj }} ·
    Período: {{ $empresa->periodo_inspecao }}
</div>

</main>

<script>
    function toggle(id, trigger) {
        const panel = document.getElementById(id);
        if (!panel) return;
        const open = panel.classList.contains('open');
        panel.classList.toggle('open', !open);
        if (trigger) trigger.classList.toggle('open', !open);
    }

    function expandAll() {
        document.querySelectorAll('.dd-panel').forEach(p => p.classList.add('open'));
        document.querySelectorAll('.dd-trigger').forEach(t => t.classList.add('open'));
    }

    function filterTable(tableId, query) {
        const q = query.toLowerCase();
        document.querySelectorAll('#' + tableId + ' tbody tr').forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
        });
    }

    function filterTableByCol(tableId, query, colIdx) {
        const q = query.toLowerCase();
        document.querySelectorAll('#' + tableId + ' tbody tr').forEach(row => {
            const cell = row.cells[colIdx];
            if (!q) { row.style.display = ''; return; }
            row.style.display = (cell && cell.textContent.toLowerCase().includes(q)) ? '' : 'none';
        });
    }
</script>
</body>
</html>
    