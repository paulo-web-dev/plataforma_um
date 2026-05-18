<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ARP Insights — Dashboard Psicossocial | Demo Jundiaí</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root { --cor: #2d3a8c; }
    body { font-family: 'Inter', sans-serif; background: #f1f5f9; }
    .hdr { background: var(--cor); }

    /* donut: Baixo=verde, Médio=amarelo, Alto=laranja, Crítico=vermelho */
    /* 5 baixo + 7 médio + 8 alto + 4 crítico = 24 postos */
    /* baixo=21%, médio=29%, alto=33%, crítico=17% */
    .donut {
      width: 140px; height: 140px; border-radius: 50%;
      background: conic-gradient(
        #10b981 0% 21%,
        #f59e0b 21% 50%,
        #f97316 50% 83%,
        #ef4444 83% 100%
      );
      display:flex; align-items:center; justify-content:center;
    }
    .donut-hole { width:92px; height:92px; background:#fff; border-radius:50%; display:flex; flex-direction:column; align-items:center; justify-content:center; }

    .dd-panel { overflow:hidden; transition:max-height .35s ease, opacity .25s ease; max-height:0; opacity:0; }
    .dd-panel.open { max-height:9999px; opacity:1; }
    .dd-trigger { cursor:pointer; user-select:none; }
    .dd-trigger .chevron { transition:transform .3s; }
    .dd-trigger.open .chevron { transform:rotate(180deg); }

    .mini-bar-wrap { height:6px; background:#e2e8f0; border-radius:99px; overflow:hidden; }
    .mini-bar { height:100%; border-radius:99px; transition:width .6s ease; }

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

    /* Score gauge bar */
    .score-bar-wrap { height:8px; background:#e2e8f0; border-radius:99px; overflow:hidden; }
    .score-bar { height:100%; border-radius:99px; }

    /* pill helpers */
    .p-critico  { background:#fef2f2; color:#dc2626; border-color:#fecaca; }
    .p-alto     { background:#fff7ed; color:#ea580c; border-color:#fed7aa; }
    .p-medio    { background:#fefce8; color:#ca8a04; border-color:#fde68a; }
    .p-baixo    { background:#f0fdf4; color:#16a34a; border-color:#bbf7d0; }

    /* dimensão icon bg */
    .dim-demanda    { background:#fef2f2; color:#dc2626; }
    .dim-controle   { background:#fff7ed; color:#ea580c; }
    .dim-suporte    { background:#eff6ff; color:#2563eb; }
    .dim-relacao    { background:#fdf4ff; color:#9333ea; }
    .dim-reconhec   { background:#f0fdf4; color:#16a34a; }
    .dim-assedio    { background:#fef2f2; color:#dc2626; }
    .dim-equilibrio { background:#fefce8; color:#ca8a04; }
    .dim-sentido    { background:#f0f9ff; color:#0284c7; }

    @media print {
      .no-print { display:none !important; }
      .dd-panel { max-height:9999px !important; opacity:1 !important; }
      .sticky-bar { position:static; }
    }
  </style>
</head>
<body class="text-gray-800 pb-16">

<!-- STICKY NAV -->
<nav class="sticky-bar no-print">
  <div class="max-w-7xl mx-auto px-6 flex items-center gap-5 h-12 text-xs font-medium text-gray-500 overflow-x-auto">
    <a href="#kpis"       class="hover:text-gray-900 whitespace-nowrap">Resumo</a>
    <a href="#distribuicao" class="hover:text-gray-900 whitespace-nowrap">Distribuição</a>
    <a href="#dimensoes"  class="hover:text-gray-900 whitespace-nowrap">Dimensões</a>
    <a href="#por-setor"  class="hover:text-gray-900 whitespace-nowrap">Por Setor</a>
    <a href="#por-funcao" class="hover:text-gray-900 whitespace-nowrap">Por Função</a>
    <a href="#plano"      class="hover:text-gray-900 whitespace-nowrap">Plano de Ação</a>
    <a href="#mapeamento" class="hover:text-gray-900 whitespace-nowrap">Mapeamento</a>
    <a href="#populacao"  class="hover:text-gray-900 whitespace-nowrap">População</a>
    <a href="#equipe"     class="hover:text-gray-900 whitespace-nowrap">Equipe</a>
  </div>
</nav>

<!-- HEADER -->
<header class="hdr text-white pt-7 pb-14 px-8">
  <div class="max-w-7xl mx-auto">
    <div class="inline-flex items-center bg-black/20 text-xs px-3 py-1 rounded-full mb-4">
      <span class="w-2 h-2 bg-white/60 rounded-full mr-2"></span>
      Avaliação de Riscos Psicossociais — Dashboard Interativo
    </div>
    <div class="flex flex-wrap justify-between items-start gap-4">
      <div>
        <h1 class="text-3xl font-bold mb-2">Demo Jundiaí.</h1>
        <div class="flex flex-wrap gap-4 text-sm text-white/80 mb-2">
          <span><i class="fa-regular fa-building mr-1"></i> CNPJ 0000000/0001-XX</span>
          <span><i class="fa-regular fa-user mr-1"></i> Psicóloga Responsável: Dra. Renata Vaz</span>
          <span><i class="fa-regular fa-calendar mr-1"></i> Janeiro a Maio / 2025</span>
        </div>
        <p class="text-xs text-white/60">
          Jundiaí – SP &nbsp;·&nbsp; Grau de Risco 3 &nbsp;·&nbsp; Instrumento Próprio — ARP / NR-17
        </p>
      </div>
      <div class="flex gap-2 no-print">
        <button onclick="expandAll()" class="bg-white/20 hover:bg-white/30 text-white text-xs px-4 py-2 rounded-lg flex items-center gap-2 transition">
          <i class="fa-solid fa-expand"></i> Expandir Tudo
        </button>
        <button onclick="window.print()" class="bg-white/20 hover:bg-white/30 text-white text-xs px-4 py-2 rounded-lg flex items-center gap-2 transition">
          <i class="fa-solid fa-print"></i> Imprimir
        </button>
      </div>
    </div>
  </div>
</header>

<main class="max-w-7xl mx-auto px-6 -mt-8 space-y-6">

<!-- ══════ §1 KPI CARDS ══════ -->
<section id="kpis">
  <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3">

    <div class="bg-gray-50 rounded-xl p-4 border border-white shadow-sm">
      <div class="flex justify-between items-start mb-2">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide leading-tight">Funções Avaliadas</p>
        <div class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center shrink-0"><i class="fa-solid fa-chart-line text-sm"></i></div>
      </div>
      <div class="text-2xl font-bold text-gray-800 mb-1">184</div>
      <p class="text-xs text-gray-400">7 setores · 24 funções</p>
    </div>

    <div class="bg-red-50 rounded-xl p-4 border border-white shadow-sm">
      <div class="flex justify-between items-start mb-2">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide leading-tight">Risco Crítico</p>
        <div class="w-8 h-8 rounded-lg bg-red-100 text-red-500 flex items-center justify-center shrink-0"><i class="fa-solid fa-triangle-exclamation text-sm"></i></div>
      </div>
      <div class="text-2xl font-bold text-gray-800 mb-1">4 (17%)</div>
      <p class="text-xs text-gray-400">Intervenção urgente</p>
    </div>

    <div class="bg-orange-50 rounded-xl p-4 border border-white shadow-sm">
      <div class="flex justify-between items-start mb-2">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide leading-tight">Risco Alto</p>
        <div class="w-8 h-8 rounded-lg bg-orange-100 text-orange-500 flex items-center justify-center shrink-0"><i class="fa-solid fa-circle-exclamation text-sm"></i></div>
      </div>
      <div class="text-2xl font-bold text-gray-800 mb-1">8 (33%)</div>
      <p class="text-xs text-gray-400">Atenção prioritária</p>
    </div>

    <div class="bg-yellow-50 rounded-xl p-4 border border-white shadow-sm">
      <div class="flex justify-between items-start mb-2">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide leading-tight">Risco Médio</p>
        <div class="w-8 h-8 rounded-lg bg-yellow-100 text-yellow-600 flex items-center justify-center shrink-0"><i class="fa-solid fa-minus-circle text-sm"></i></div>
      </div>
      <div class="text-2xl font-bold text-gray-800 mb-1">7 (29%)</div>
      <p class="text-xs text-gray-400">Monitorar e adequar</p>
    </div>

    <div class="bg-green-50 rounded-xl p-4 border border-white shadow-sm">
      <div class="flex justify-between items-start mb-2">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide leading-tight">Risco Baixo</p>
        <div class="w-8 h-8 rounded-lg bg-green-100 text-green-600 flex items-center justify-center shrink-0"><i class="fa-solid fa-shield-check text-sm"></i></div>
      </div>
      <div class="text-2xl font-bold text-gray-800 mb-1">5 (21%)</div>
      <p class="text-xs text-gray-400">Manter condições</p>
    </div>

    <div class="bg-indigo-50 rounded-xl p-4 border border-white shadow-sm">
      <div class="flex justify-between items-start mb-2">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide leading-tight">Dimensões Críticas</p>
        <div class="w-8 h-8 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center shrink-0"><i class="fa-solid fa-brain text-sm"></i></div>
      </div>
      <div class="text-2xl font-bold text-gray-800 mb-1">3 / 8</div>
      <p class="text-xs text-gray-400">Demanda · Assédio · Controle</p>
    </div>

  </div>
</section>

<!-- ══════ §2 DISTRIBUIÇÃO ══════ -->
<section id="distribuicao">
  <div class="card">
    <div class="card-hdr">
      <div>
        <h2 class="font-bold text-gray-800">Distribuição de Riscos Psicossociais</h2>
        <p class="text-xs text-gray-400 mt-0.5">Clique em cada nível para ver as funções detalhadas</p>
      </div>
      <span class="text-xs text-gray-400">24 funções avaliadas</span>
    </div>
    <div class="card-body">
      <div class="flex flex-col lg:flex-row gap-8 items-start">

        <div class="flex flex-col items-center gap-4 shrink-0">
          <div class="donut">
            <div class="donut-hole">
              <span class="text-lg font-bold text-gray-800">24</span>
              <span class="text-xs text-gray-400">funções</span>
            </div>
          </div>
          <div class="grid grid-cols-2 gap-x-4 gap-y-1 text-xs">
            <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-sm bg-green-500 inline-block"></span>Baixo (21%)</span>
            <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-sm bg-yellow-400 inline-block"></span>Médio (29%)</span>
            <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-sm bg-orange-500 inline-block"></span>Alto (33%)</span>
            <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-sm bg-red-500 inline-block"></span>Crítico (17%)</span>
          </div>
        </div>

        <div class="flex-1 space-y-3 w-full">

          <!-- Crítico -->
          <div class="border border-red-100 rounded-xl overflow-hidden">
            <div class="dd-trigger flex items-center gap-4 px-4 py-3 bg-red-50 hover:bg-red-100 transition" onclick="toggle('dist-critico', this)">
              <div class="w-3 h-3 rounded-full shrink-0 bg-red-500"></div>
              <span class="font-semibold text-sm text-gray-700 flex-1">Risco Crítico</span>
              <span class="text-sm font-bold text-red-500">4 funções</span>
              <div class="w-32"><div class="mini-bar-wrap"><div class="mini-bar bg-red-500" style="width:17%"></div></div></div>
              <span class="text-xs text-gray-500 w-8 text-right">17%</span>
              <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs"></i>
            </div>
            <div id="dist-critico" class="dd-panel">
              <table class="w-full text-xs">
                <thead><tr class="bg-white border-b border-gray-100">
                  <th class="px-4 py-2 text-left text-gray-400 font-medium">FUNÇÃO</th>
                  <th class="px-4 py-2 text-left text-gray-400 font-medium">SETOR</th>
                  <th class="px-4 py-2 text-left text-gray-400 font-medium">DIMENSÃO CRÍTICA</th>
                  <th class="px-4 py-2 text-center text-gray-400 font-medium">SCORE</th>
                  <th class="px-4 py-2 text-center text-gray-400 font-medium">NÍVEL</th>
                </tr></thead>
                <tbody class="divide-y divide-gray-50">
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Operador de Prensa</td><td class="px-4 py-2 text-gray-500">Prensagem</td><td class="px-4 py-2 text-gray-500">Alta demanda · Baixo controle · Assédio moral</td><td class="px-4 py-2 text-center font-bold text-red-600">88/100</td><td class="px-4 py-2 text-center"><span class="pill p-critico">Crítico</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Soldador MIG/TIG</td><td class="px-4 py-2 text-gray-500">Soldagem</td><td class="px-4 py-2 text-gray-500">Alta demanda · Falta de reconhecimento</td><td class="px-4 py-2 text-center font-bold text-red-600">83/100</td><td class="px-4 py-2 text-center"><span class="pill p-critico">Crítico</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Supervisor de Produção</td><td class="px-4 py-2 text-gray-500">Produção</td><td class="px-4 py-2 text-gray-500">Sobrecarga de papel · Conflito de papéis</td><td class="px-4 py-2 text-center font-bold text-red-600">81/100</td><td class="px-4 py-2 text-center"><span class="pill p-critico">Crítico</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Separador de Pedidos</td><td class="px-4 py-2 text-gray-500">Expedição</td><td class="px-4 py-2 text-gray-500">Alta pressão por metas · Isolamento</td><td class="px-4 py-2 text-center font-bold text-red-600">79/100</td><td class="px-4 py-2 text-center"><span class="pill p-critico">Crítico</span></td></tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Alto -->
          <div class="border border-orange-100 rounded-xl overflow-hidden">
            <div class="dd-trigger flex items-center gap-4 px-4 py-3 bg-orange-50 hover:bg-orange-100 transition" onclick="toggle('dist-alto', this)">
              <div class="w-3 h-3 rounded-full shrink-0 bg-orange-500"></div>
              <span class="font-semibold text-sm text-gray-700 flex-1">Risco Alto</span>
              <span class="text-sm font-bold text-orange-500">8 funções</span>
              <div class="w-32"><div class="mini-bar-wrap"><div class="mini-bar bg-orange-500" style="width:33%"></div></div></div>
              <span class="text-xs text-gray-500 w-8 text-right">33%</span>
              <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs"></i>
            </div>
            <div id="dist-alto" class="dd-panel">
              <table class="w-full text-xs">
                <thead><tr class="bg-white border-b border-gray-100">
                  <th class="px-4 py-2 text-left text-gray-400 font-medium">FUNÇÃO</th>
                  <th class="px-4 py-2 text-left text-gray-400 font-medium">SETOR</th>
                  <th class="px-4 py-2 text-left text-gray-400 font-medium">DIMENSÃO PRINCIPAL</th>
                  <th class="px-4 py-2 text-center text-gray-400 font-medium">SCORE</th>
                  <th class="px-4 py-2 text-center text-gray-400 font-medium">NÍVEL</th>
                </tr></thead>
                <tbody class="divide-y divide-gray-50">
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Operador CNC</td><td class="px-4 py-2 text-gray-500">Usinagem</td><td class="px-4 py-2 text-gray-500">Sobrecarga cognitiva · Falta de suporte</td><td class="px-4 py-2 text-center font-bold text-orange-600">74/100</td><td class="px-4 py-2 text-center"><span class="pill p-alto">Alto</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Rebarbador</td><td class="px-4 py-2 text-gray-500">Acabamento</td><td class="px-4 py-2 text-gray-500">Alta demanda · Desequilíbrio trabalho-vida</td><td class="px-4 py-2 text-center font-bold text-orange-600">71/100</td><td class="px-4 py-2 text-center"><span class="pill p-alto">Alto</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Montador de Subconjuntos</td><td class="px-4 py-2 text-gray-500">Montagem</td><td class="px-4 py-2 text-gray-500">Ritmo imposto · Baixo controle</td><td class="px-4 py-2 text-center font-bold text-orange-600">70/100</td><td class="px-4 py-2 text-center"><span class="pill p-alto">Alto</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Auxiliar de Almoxarifado</td><td class="px-4 py-2 text-gray-500">Logística</td><td class="px-4 py-2 text-gray-500">Insegurança no emprego · Falta de reconhecimento</td><td class="px-4 py-2 text-center font-bold text-orange-600">68/100</td><td class="px-4 py-2 text-center"><span class="pill p-alto">Alto</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Mecânico de Manutenção</td><td class="px-4 py-2 text-gray-500">Manutenção</td><td class="px-4 py-2 text-gray-500">Conflito de papéis · Suporte de chefia insuficiente</td><td class="px-4 py-2 text-center font-bold text-orange-600">67/100</td><td class="px-4 py-2 text-center"><span class="pill p-alto">Alto</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Analista de PCP</td><td class="px-4 py-2 text-gray-500">PCP</td><td class="px-4 py-2 text-gray-500">Alta demanda quantitativa · Desequilíbrio</td><td class="px-4 py-2 text-center font-bold text-orange-600">65/100</td><td class="px-4 py-2 text-center"><span class="pill p-alto">Alto</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Operador de Empilhadeira</td><td class="px-4 py-2 text-gray-500">Expedição</td><td class="px-4 py-2 text-gray-500">Isolamento social · Baixo suporte</td><td class="px-4 py-2 text-center font-bold text-orange-600">63/100</td><td class="px-4 py-2 text-center"><span class="pill p-alto">Alto</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Inspetor de Qualidade</td><td class="px-4 py-2 text-gray-500">Qualidade</td><td class="px-4 py-2 text-gray-500">Alta demanda emocional · Conflito de papéis</td><td class="px-4 py-2 text-center font-bold text-orange-600">62/100</td><td class="px-4 py-2 text-center"><span class="pill p-alto">Alto</span></td></tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Médio -->
          <div class="border border-yellow-100 rounded-xl overflow-hidden">
            <div class="dd-trigger flex items-center gap-4 px-4 py-3 bg-yellow-50 hover:bg-yellow-100 transition" onclick="toggle('dist-medio', this)">
              <div class="w-3 h-3 rounded-full shrink-0 bg-yellow-400"></div>
              <span class="font-semibold text-sm text-gray-700 flex-1">Risco Médio</span>
              <span class="text-sm font-bold text-yellow-600">7 funções</span>
              <div class="w-32"><div class="mini-bar-wrap"><div class="mini-bar bg-yellow-400" style="width:29%"></div></div></div>
              <span class="text-xs text-gray-500 w-8 text-right">29%</span>
              <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs"></i>
            </div>
            <div id="dist-medio" class="dd-panel">
              <table class="w-full text-xs">
                <thead><tr class="bg-white border-b border-gray-100">
                  <th class="px-4 py-2 text-left text-gray-400 font-medium">FUNÇÃO</th>
                  <th class="px-4 py-2 text-left text-gray-400 font-medium">SETOR</th>
                  <th class="px-4 py-2 text-center text-gray-400 font-medium">SCORE</th>
                  <th class="px-4 py-2 text-center text-gray-400 font-medium">NÍVEL</th>
                </tr></thead>
                <tbody class="divide-y divide-gray-50">
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Setup de Máquinas</td><td class="px-4 py-2 text-gray-500">Usinagem CNC</td><td class="px-4 py-2 text-center font-bold text-yellow-600">52/100</td><td class="px-4 py-2 text-center"><span class="pill p-medio">Médio</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Metrôlogo</td><td class="px-4 py-2 text-gray-500">Lab. Metrologia</td><td class="px-4 py-2 text-center font-bold text-yellow-600">50/100</td><td class="px-4 py-2 text-center"><span class="pill p-medio">Médio</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Conferente de Recebimento</td><td class="px-4 py-2 text-gray-500">Recebimento</td><td class="px-4 py-2 text-center font-bold text-yellow-600">48/100</td><td class="px-4 py-2 text-center"><span class="pill p-medio">Médio</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Auxiliar de Montagem</td><td class="px-4 py-2 text-gray-500">Montagem</td><td class="px-4 py-2 text-center font-bold text-yellow-600">46/100</td><td class="px-4 py-2 text-center"><span class="pill p-medio">Médio</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Abastecedor de Estampos</td><td class="px-4 py-2 text-gray-500">Prensagem</td><td class="px-4 py-2 text-center font-bold text-yellow-600">45/100</td><td class="px-4 py-2 text-center"><span class="pill p-medio">Médio</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Assistente Financeiro</td><td class="px-4 py-2 text-gray-500">Financeiro</td><td class="px-4 py-2 text-center font-bold text-yellow-600">43/100</td><td class="px-4 py-2 text-center"><span class="pill p-medio">Médio</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Analista de Compras</td><td class="px-4 py-2 text-gray-500">Compras</td><td class="px-4 py-2 text-center font-bold text-yellow-600">41/100</td><td class="px-4 py-2 text-center"><span class="pill p-medio">Médio</span></td></tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Baixo -->
          <div class="border border-green-100 rounded-xl overflow-hidden">
            <div class="dd-trigger flex items-center gap-4 px-4 py-3 bg-green-50 hover:bg-green-100 transition" onclick="toggle('dist-baixo', this)">
              <div class="w-3 h-3 rounded-full shrink-0 bg-green-500"></div>
              <span class="font-semibold text-sm text-gray-700 flex-1">Risco Baixo</span>
              <span class="text-sm font-bold text-green-600">5 funções</span>
              <div class="w-32"><div class="mini-bar-wrap"><div class="mini-bar bg-green-500" style="width:21%"></div></div></div>
              <span class="text-xs text-gray-500 w-8 text-right">21%</span>
              <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs"></i>
            </div>
            <div id="dist-baixo" class="dd-panel">
              <table class="w-full text-xs">
                <thead><tr class="bg-white border-b border-gray-100">
                  <th class="px-4 py-2 text-left text-gray-400 font-medium">FUNÇÃO</th>
                  <th class="px-4 py-2 text-left text-gray-400 font-medium">SETOR</th>
                  <th class="px-4 py-2 text-center text-gray-400 font-medium">SCORE</th>
                  <th class="px-4 py-2 text-center text-gray-400 font-medium">NÍVEL</th>
                </tr></thead>
                <tbody class="divide-y divide-gray-50">
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Analista de TI</td><td class="px-4 py-2 text-gray-500">TI / Suporte</td><td class="px-4 py-2 text-center font-bold text-green-600">28/100</td><td class="px-4 py-2 text-center"><span class="pill p-baixo">Baixo</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Analista de RH</td><td class="px-4 py-2 text-gray-500">RH</td><td class="px-4 py-2 text-center font-bold text-green-600">31/100</td><td class="px-4 py-2 text-center"><span class="pill p-baixo">Baixo</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Técnico de SGQ</td><td class="px-4 py-2 text-gray-500">SGQ</td><td class="px-4 py-2 text-center font-bold text-green-600">33/100</td><td class="px-4 py-2 text-center"><span class="pill p-baixo">Baixo</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Auxiliar de Soldagem</td><td class="px-4 py-2 text-gray-500">Soldagem</td><td class="px-4 py-2 text-center font-bold text-green-600">35/100</td><td class="px-4 py-2 text-center"><span class="pill p-baixo">Baixo</span></td></tr>
                  <tr><td class="px-4 py-2 font-medium text-gray-800">Operador de Jateamento</td><td class="px-4 py-2 text-gray-500">Acabamento</td><td class="px-4 py-2 text-center font-bold text-green-600">37/100</td><td class="px-4 py-2 text-center"><span class="pill p-baixo">Baixo</span></td></tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════ §3 DIMENSÕES PSICOSSOCIAIS ══════ -->
<section id="dimensoes">
  <div class="card">
    <div class="card-hdr">
      <div>
        <h2 class="font-bold text-gray-800">Dimensões Psicossociais Avaliadas</h2>
        <p class="text-xs text-gray-400 mt-0.5">8 dimensões · score médio da empresa por dimensão · clique para detalhar</p>
      </div>
      <span class="text-xs text-gray-400">Instrumento próprio ARP</span>
    </div>
    <div class="divide-y divide-gray-50">

      <!-- D1: Demanda Psicológica -->
      <div>
        <div class="dd-trigger flex items-center gap-4 px-5 py-4 hover:bg-gray-50 transition" onclick="toggle('dim-0', this)">
          <div class="w-9 h-9 rounded-xl dim-demanda flex items-center justify-center shrink-0"><i class="fa-solid fa-bolt text-sm"></i></div>
          <div class="flex-1">
            <p class="font-semibold text-gray-800">Demanda Psicológica</p>
            <p class="text-xs text-gray-400 mt-0.5">Pressão quantitativa, ritmo, exigências emocionais e cognitivas do trabalho</p>
          </div>
          <div class="w-48 hidden md:block">
            <div class="flex justify-between text-xs mb-1"><span class="text-gray-500">Score médio</span><span class="font-bold text-red-600">76/100</span></div>
            <div class="score-bar-wrap"><div class="score-bar bg-red-500" style="width:76%"></div></div>
          </div>
          <span class="pill p-critico ml-2">Crítico</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs ml-3"></i>
        </div>
        <div id="dim-0" class="dd-panel bg-gray-50/50">
          <div class="px-5 py-4 space-y-4">
            <p class="text-xs text-gray-600 leading-relaxed">A demanda psicológica elevada foi identificada como o principal fator de risco na empresa. Trabalhadores dos setores produtivos relatam ritmo imposto pela máquina, metas de produção agressivas e exigências emocionais decorrentes da pressão de supervisores. Os turnos noturnos amplificam o impacto desta dimensão.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
              <div class="bg-white rounded-xl border border-gray-100 p-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Subescalas mais críticas</p>
                <div class="space-y-2">
                  <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Pressão por produção</span><span class="font-bold text-red-600">89%</span></div><div class="mini-bar-wrap"><div class="mini-bar bg-red-500" style="width:89%"></div></div></div>
                  <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Ritmo acelerado</span><span class="font-bold text-red-600">84%</span></div><div class="mini-bar-wrap"><div class="mini-bar bg-red-500" style="width:84%"></div></div></div>
                  <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Sobrecarga emocional</span><span class="font-bold text-orange-600">71%</span></div><div class="mini-bar-wrap"><div class="mini-bar bg-orange-500" style="width:71%"></div></div></div>
                  <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Demanda cognitiva</span><span class="font-bold text-yellow-600">58%</span></div><div class="mini-bar-wrap"><div class="mini-bar bg-yellow-400" style="width:58%"></div></div></div>
                </div>
              </div>
              <div class="bg-white rounded-xl border border-gray-100 p-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Funções mais afetadas</p>
                <div class="space-y-1">
                  <div class="flex items-center justify-between text-xs py-1 border-b border-gray-50"><span class="text-gray-700">Operador de Prensa</span><span class="pill p-critico">88/100</span></div>
                  <div class="flex items-center justify-between text-xs py-1 border-b border-gray-50"><span class="text-gray-700">Soldador MIG/TIG</span><span class="pill p-critico">83/100</span></div>
                  <div class="flex items-center justify-between text-xs py-1 border-b border-gray-50"><span class="text-gray-700">Supervisor de Produção</span><span class="pill p-critico">81/100</span></div>
                  <div class="flex items-center justify-between text-xs py-1"><span class="text-gray-700">Separador de Pedidos</span><span class="pill p-critico">79/100</span></div>
                </div>
              </div>
              <div class="bg-white rounded-xl border border-gray-100 p-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Relatos frequentes</p>
                <ul class="space-y-1 text-xs text-gray-600">
                  <li class="flex gap-2"><i class="fa-solid fa-quote-left text-gray-300 text-xs mt-0.5 shrink-0"></i><span>"Não consigo dar conta do volume sem fazer horas extras"</span></li>
                  <li class="flex gap-2"><i class="fa-solid fa-quote-left text-gray-300 text-xs mt-0.5 shrink-0"></i><span>"A pressão aumentou depois da troca de gerência"</span></li>
                  <li class="flex gap-2"><i class="fa-solid fa-quote-left text-gray-300 text-xs mt-0.5 shrink-0"></i><span>"Saio do trabalho tão cansado que não consigo descansar"</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- D2: Controle sobre o Trabalho -->
      <div>
        <div class="dd-trigger flex items-center gap-4 px-5 py-4 hover:bg-gray-50 transition" onclick="toggle('dim-1', this)">
          <div class="w-9 h-9 rounded-xl dim-controle flex items-center justify-center shrink-0"><i class="fa-solid fa-sliders text-sm"></i></div>
          <div class="flex-1">
            <p class="font-semibold text-gray-800">Controle sobre o Trabalho</p>
            <p class="text-xs text-gray-400 mt-0.5">Autonomia, participação nas decisões, uso de habilidades e influência sobre o trabalho</p>
          </div>
          <div class="w-48 hidden md:block">
            <div class="flex justify-between text-xs mb-1"><span class="text-gray-500">Score médio</span><span class="font-bold text-orange-600">69/100</span></div>
            <div class="score-bar-wrap"><div class="score-bar bg-orange-500" style="width:69%"></div></div>
          </div>
          <span class="pill p-alto ml-2">Alto</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs ml-3"></i>
        </div>
        <div id="dim-1" class="dd-panel bg-gray-50/50">
          <div class="px-5 py-4 space-y-4">
            <p class="text-xs text-gray-600 leading-relaxed">O baixo nível de controle é predominante nos setores produtivos, onde trabalhadores têm pouca ou nenhuma autonomia sobre ritmo, método e sequência das tarefas. A combinação de alta demanda com baixo controle configura o perfil de <b>trabalho passivo</b> (modelo Karasek), com alto potencial adoecedor.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
              <div class="bg-white rounded-xl border border-gray-100 p-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Indicadores de baixo controle</p>
                <div class="space-y-2">
                  <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Autonomia sobre ritmo</span><span class="font-bold text-red-600">82% baixo</span></div><div class="mini-bar-wrap"><div class="mini-bar bg-red-500" style="width:82%"></div></div></div>
                  <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Participação em decisões</span><span class="font-bold text-orange-600">74% baixo</span></div><div class="mini-bar-wrap"><div class="mini-bar bg-orange-500" style="width:74%"></div></div></div>
                  <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Uso de habilidades</span><span class="font-bold text-yellow-600">51% baixo</span></div><div class="mini-bar-wrap"><div class="mini-bar bg-yellow-400" style="width:51%"></div></div></div>
                </div>
              </div>
              <div class="bg-white rounded-xl border border-gray-100 p-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Setores com maior déficit</p>
                <div class="space-y-1 text-xs">
                  <div class="flex justify-between py-1 border-b border-gray-50"><span class="text-gray-700">Prensagem</span><span class="pill p-critico">91% sem autonomia</span></div>
                  <div class="flex justify-between py-1 border-b border-gray-50"><span class="text-gray-700">Montagem</span><span class="pill p-alto">78% sem autonomia</span></div>
                  <div class="flex justify-between py-1"><span class="text-gray-700">Expedição</span><span class="pill p-alto">72% sem autonomia</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- D3: Suporte Social -->
      <div>
        <div class="dd-trigger flex items-center gap-4 px-5 py-4 hover:bg-gray-50 transition" onclick="toggle('dim-2', this)">
          <div class="w-9 h-9 rounded-xl dim-suporte flex items-center justify-center shrink-0"><i class="fa-solid fa-people-group text-sm"></i></div>
          <div class="flex-1">
            <p class="font-semibold text-gray-800">Suporte Social</p>
            <p class="text-xs text-gray-400 mt-0.5">Apoio de chefia e colegas, comunicação interna, coesão de equipe</p>
          </div>
          <div class="w-48 hidden md:block">
            <div class="flex justify-between text-xs mb-1"><span class="text-gray-500">Score médio</span><span class="font-bold text-orange-600">61/100</span></div>
            <div class="score-bar-wrap"><div class="score-bar bg-orange-500" style="width:61%"></div></div>
          </div>
          <span class="pill p-alto ml-2">Alto</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs ml-3"></i>
        </div>
        <div id="dim-2" class="dd-panel bg-gray-50/50">
          <div class="px-5 py-4">
            <p class="text-xs text-gray-600 leading-relaxed mb-3">O suporte social insuficiente foi relatado especialmente em relação à chefia imediata. Trabalhadores de turnos noturnos sentem-se isolados e sem canal de comunicação com a gestão. O suporte entre colegas é percebido positivamente em setores com maior estabilidade de equipe (TI, RH, SGQ).</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
              <div class="bg-white rounded-xl border border-gray-100 p-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Suporte de chefia vs. colegas</p>
                <div class="space-y-2">
                  <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Suporte da chefia</span><span class="font-bold text-red-600">72% insuficiente</span></div><div class="mini-bar-wrap"><div class="mini-bar bg-red-500" style="width:72%"></div></div></div>
                  <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Suporte dos colegas</span><span class="font-bold text-yellow-600">38% insuficiente</span></div><div class="mini-bar-wrap"><div class="mini-bar bg-yellow-400" style="width:38%"></div></div></div>
                </div>
              </div>
              <div class="bg-white rounded-xl border border-gray-100 p-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Relatos frequentes</p>
                <ul class="space-y-1 text-xs text-gray-600">
                  <li class="flex gap-2"><i class="fa-solid fa-quote-left text-gray-300 text-xs mt-0.5 shrink-0"></i><span>"Quando tenho problema, não sei a quem recorrer"</span></li>
                  <li class="flex gap-2"><i class="fa-solid fa-quote-left text-gray-300 text-xs mt-0.5 shrink-0"></i><span>"O gestor só aparece quando algo dá errado"</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- D4: Relacionamento Interpessoal / Assédio -->
      <div>
        <div class="dd-trigger flex items-center gap-4 px-5 py-4 hover:bg-gray-50 transition" onclick="toggle('dim-3', this)">
          <div class="w-9 h-9 rounded-xl dim-assedio flex items-center justify-center shrink-0"><i class="fa-solid fa-user-slash text-sm"></i></div>
          <div class="flex-1">
            <p class="font-semibold text-gray-800">Relacionamento Interpessoal e Assédio</p>
            <p class="text-xs text-gray-400 mt-0.5">Conflitos, comportamentos hostis, violência e assédio moral no trabalho</p>
          </div>
          <div class="w-48 hidden md:block">
            <div class="flex justify-between text-xs mb-1"><span class="text-gray-500">Score médio</span><span class="font-bold text-red-600">73/100</span></div>
            <div class="score-bar-wrap"><div class="score-bar bg-red-500" style="width:73%"></div></div>
          </div>
          <span class="pill p-critico ml-2">Crítico</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs ml-3"></i>
        </div>
        <div id="dim-3" class="dd-panel bg-gray-50/50">
          <div class="px-5 py-4 space-y-4">
            <p class="text-xs text-gray-600 leading-relaxed">Foram identificados relatos de comportamentos hostis e episódios de assédio moral no setor de Prensagem e na linha de montagem. Os dados indicam que <b>43% dos trabalhadores da produção</b> relataram ter sofrido ou testemunhado alguma forma de humilhação ou constrangimento nos últimos 6 meses.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
              <div class="bg-white rounded-xl border border-gray-100 p-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Tipos de ocorrências</p>
                <div class="space-y-2">
                  <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Humilhação pública</span><span class="font-bold text-red-600">43%</span></div><div class="mini-bar-wrap"><div class="mini-bar bg-red-500" style="width:43%"></div></div></div>
                  <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Ameaças implícitas</span><span class="font-bold text-orange-600">31%</span></div><div class="mini-bar-wrap"><div class="mini-bar bg-orange-500" style="width:31%"></div></div></div>
                  <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Isolamento intencional</span><span class="font-bold text-yellow-600">22%</span></div><div class="mini-bar-wrap"><div class="mini-bar bg-yellow-400" style="width:22%"></div></div></div>
                  <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Discriminação</span><span class="font-bold text-yellow-600">18%</span></div><div class="mini-bar-wrap"><div class="mini-bar bg-yellow-400" style="width:18%"></div></div></div>
                </div>
              </div>
              <div class="bg-white rounded-xl border border-gray-100 p-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Setores mais afetados</p>
                <div class="space-y-1 text-xs">
                  <div class="flex justify-between py-1 border-b border-gray-50"><span class="text-gray-700">Prensagem</span><span class="pill p-critico">68% relataram</span></div>
                  <div class="flex justify-between py-1 border-b border-gray-50"><span class="text-gray-700">Montagem</span><span class="pill p-alto">47% relataram</span></div>
                  <div class="flex justify-between py-1 border-b border-gray-50"><span class="text-gray-700">Expedição</span><span class="pill p-alto">39% relataram</span></div>
                  <div class="flex justify-between py-1"><span class="text-gray-700">TI / Administrativo</span><span class="pill p-baixo">8% relataram</span></div>
                </div>
              </div>
              <div class="bg-red-50 rounded-xl border border-red-100 p-4">
                <p class="text-xs font-semibold text-red-600 uppercase tracking-wide mb-3">⚠ Alerta Prioritário</p>
                <p class="text-xs text-gray-600 leading-relaxed">A prevalência de assédio identificada exige instauração imediata de canal de denúncias, capacitação de gestores e revisão da política disciplinar. A empresa pode incorrer em responsabilidade civil e trabalhista caso não adote medidas corretivas.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- D5: Reconhecimento -->
      <div>
        <div class="dd-trigger flex items-center gap-4 px-5 py-4 hover:bg-gray-50 transition" onclick="toggle('dim-4', this)">
          <div class="w-9 h-9 rounded-xl dim-reconhec flex items-center justify-center shrink-0"><i class="fa-solid fa-star text-sm"></i></div>
          <div class="flex-1">
            <p class="font-semibold text-gray-800">Reconhecimento e Recompensas</p>
            <p class="text-xs text-gray-400 mt-0.5">Valorização do esforço, feedback, progressão e recompensas justas</p>
          </div>
          <div class="w-48 hidden md:block">
            <div class="flex justify-between text-xs mb-1"><span class="text-gray-500">Score médio</span><span class="font-bold text-orange-600">64/100</span></div>
            <div class="score-bar-wrap"><div class="score-bar bg-orange-500" style="width:64%"></div></div>
          </div>
          <span class="pill p-alto ml-2">Alto</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs ml-3"></i>
        </div>
        <div id="dim-4" class="dd-panel bg-gray-50/50">
          <div class="px-5 py-4">
            <p class="text-xs text-gray-600 leading-relaxed mb-3">A percepção de não reconhecimento é forte nos setores de chão de fábrica. Trabalhadores relatam que seu esforço e dedicação não são valorizados pela gestão, e que há poucas oportunidades de promoção interna. A ausência de feedback positivo contribui para a desmotivação e baixo engajamento.</p>
            <div class="grid grid-cols-2 gap-3">
              <div class="bg-white rounded-xl border border-gray-100 p-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Indicadores</p>
                <div class="space-y-2">
                  <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>"Meu trabalho não é valorizado"</span><span class="font-bold text-orange-600">67%</span></div><div class="mini-bar-wrap"><div class="mini-bar bg-orange-500" style="width:67%"></div></div></div>
                  <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>"Não recebo feedback construtivo"</span><span class="font-bold text-orange-600">61%</span></div><div class="mini-bar-wrap"><div class="mini-bar bg-orange-500" style="width:61%"></div></div></div>
                  <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>"Salário incompatível com esforço"</span><span class="font-bold text-yellow-600">54%</span></div><div class="mini-bar-wrap"><div class="mini-bar bg-yellow-400" style="width:54%"></div></div></div>
                </div>
              </div>
              <div class="bg-white rounded-xl border border-gray-100 p-4">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Melhor desempenho</p>
                <div class="space-y-1 text-xs">
                  <div class="flex justify-between py-1 border-b border-gray-50"><span class="text-gray-700">TI / Suporte</span><span class="pill p-baixo">Baixo risco</span></div>
                  <div class="flex justify-between py-1 border-b border-gray-50"><span class="text-gray-700">RH</span><span class="pill p-baixo">Baixo risco</span></div>
                  <div class="flex justify-between py-1"><span class="text-gray-700">SGQ</span><span class="pill p-medio">Médio risco</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- D6: Equilíbrio Trabalho-Vida -->
      <div>
        <div class="dd-trigger flex items-center gap-4 px-5 py-4 hover:bg-gray-50 transition" onclick="toggle('dim-5', this)">
          <div class="w-9 h-9 rounded-xl dim-equilibrio flex items-center justify-center shrink-0"><i class="fa-solid fa-scale-balanced text-sm"></i></div>
          <div class="flex-1">
            <p class="font-semibold text-gray-800">Equilíbrio Trabalho-Vida Pessoal</p>
            <p class="text-xs text-gray-400 mt-0.5">Conflito trabalho-família, horas extras, disponibilidade fora do horário</p>
          </div>
          <div class="w-48 hidden md:block">
            <div class="flex justify-between text-xs mb-1"><span class="text-gray-500">Score médio</span><span class="font-bold text-yellow-600">55/100</span></div>
            <div class="score-bar-wrap"><div class="score-bar bg-yellow-400" style="width:55%"></div></div>
          </div>
          <span class="pill p-medio ml-2">Médio</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs ml-3"></i>
        </div>
        <div id="dim-5" class="dd-panel bg-gray-50/50">
          <div class="px-5 py-4">
            <p class="text-xs text-gray-600 leading-relaxed">Os trabalhadores de turno rotativo (3 turnos) apresentam maior comprometimento do equilíbrio trabalho-vida. A imprevisibilidade dos horários dificulta o convívio familiar e o acesso a atividades de lazer e saúde. O turno da madrugada concentra os maiores índices de desequilíbrio.</p>
          </div>
        </div>
      </div>

      <!-- D7: Sentido e Identidade no Trabalho -->
      <div>
        <div class="dd-trigger flex items-center gap-4 px-5 py-4 hover:bg-gray-50 transition" onclick="toggle('dim-6', this)">
          <div class="w-9 h-9 rounded-xl dim-sentido flex items-center justify-center shrink-0"><i class="fa-solid fa-compass text-sm"></i></div>
          <div class="flex-1">
            <p class="font-semibold text-gray-800">Sentido e Identidade no Trabalho</p>
            <p class="text-xs text-gray-400 mt-0.5">Significado do trabalho, comprometimento, coerência entre valores e prática</p>
          </div>
          <div class="w-48 hidden md:block">
            <div class="flex justify-between text-xs mb-1"><span class="text-gray-500">Score médio</span><span class="font-bold text-yellow-600">44/100</span></div>
            <div class="score-bar-wrap"><div class="score-bar bg-yellow-400" style="width:44%"></div></div>
          </div>
          <span class="pill p-medio ml-2">Médio</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs ml-3"></i>
        </div>
        <div id="dim-6" class="dd-panel bg-gray-50/50">
          <div class="px-5 py-4">
            <p class="text-xs text-gray-600 leading-relaxed">A percepção de sentido no trabalho é relativamente preservada — trabalhadores com maior tempo de empresa demonstram orgulho do produto fabricado. O risco concentra-se em trabalhadores novos (&lt;1 ano) e naqueles com funções altamente repetitivas, onde o esvaziamento do sentido é mais pronunciado.</p>
          </div>
        </div>
      </div>

      <!-- D8: Segurança no Emprego -->
      <div>
        <div class="dd-trigger flex items-center gap-4 px-5 py-4 hover:bg-gray-50 transition" onclick="toggle('dim-7', this)">
          <div class="w-9 h-9 rounded-xl dim-relacao flex items-center justify-center shrink-0"><i class="fa-solid fa-lock text-sm"></i></div>
          <div class="flex-1">
            <p class="font-semibold text-gray-800">Segurança no Emprego</p>
            <p class="text-xs text-gray-400 mt-0.5">Estabilidade percebida, medo de demissão, ameaças de terceirização</p>
          </div>
          <div class="w-48 hidden md:block">
            <div class="flex justify-between text-xs mb-1"><span class="text-gray-500">Score médio</span><span class="font-bold text-yellow-600">49/100</span></div>
            <div class="score-bar-wrap"><div class="score-bar bg-yellow-400" style="width:49%"></div></div>
          </div>
          <span class="pill p-medio ml-2">Médio</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs ml-3"></i>
        </div>
        <div id="dim-7" class="dd-panel bg-gray-50/50">
          <div class="px-5 py-4">
            <p class="text-xs text-gray-600 leading-relaxed">A insegurança é mais presente em funções manuais de operação, onde trabalhadores percebem risco de automação e terceirização. O Almoxarifado apresentou a maior prevalência desta dimensão (62% dos respondentes), após rumores de contratação de operadores terceirizados no início de 2025.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══════ §4 COMPARATIVO POR SETOR ══════ -->
<section id="por-setor">
  <div class="card">
    <div class="card-hdr">
      <div>
        <h2 class="font-bold text-gray-800">Comparativo de Risco Psicossocial por Setor</h2>
        <p class="text-xs text-gray-400 mt-0.5">Score médio ponderado por dimensão · clique para detalhar</p>
      </div>
    </div>
    <div class="card-body space-y-2">

      <!-- Prensagem -->
      <div class="border border-gray-100 rounded-xl overflow-hidden">
        <div class="dd-trigger flex items-center gap-4 px-4 py-3 hover:bg-gray-50 transition" onclick="toggle('set-0', this)">
          <p class="font-medium text-sm text-gray-700 w-44 truncate shrink-0">Prensagem</p>
          <div class="flex-1 h-5 rounded-full overflow-hidden flex min-w-0">
            <div class="h-full bg-red-500" style="width:88%"></div>
          </div>
          <span class="text-xs font-bold text-red-600 w-16 text-right shrink-0">88/100</span>
          <span class="pill p-critico ml-2 shrink-0">Crítico</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs ml-2"></i>
        </div>
        <div id="set-0" class="dd-panel">
          <div class="px-4 py-3 bg-white grid grid-cols-2 md:grid-cols-4 gap-3 text-xs">
            <div class="text-center p-3 bg-red-50 rounded-lg"><p class="text-gray-500 mb-1">Demanda</p><p class="font-bold text-red-600 text-lg">91</p></div>
            <div class="text-center p-3 bg-red-50 rounded-lg"><p class="text-gray-500 mb-1">Controle</p><p class="font-bold text-red-600 text-lg">89</p></div>
            <div class="text-center p-3 bg-red-50 rounded-lg"><p class="text-gray-500 mb-1">Assédio</p><p class="font-bold text-red-600 text-lg">85</p></div>
            <div class="text-center p-3 bg-orange-50 rounded-lg"><p class="text-gray-500 mb-1">Reconhecimento</p><p class="font-bold text-orange-600 text-lg">74</p></div>
          </div>
        </div>
      </div>

      <!-- Soldagem -->
      <div class="border border-gray-100 rounded-xl overflow-hidden">
        <div class="dd-trigger flex items-center gap-4 px-4 py-3 hover:bg-gray-50 transition" onclick="toggle('set-1', this)">
          <p class="font-medium text-sm text-gray-700 w-44 truncate shrink-0">Soldagem</p>
          <div class="flex-1 h-5 rounded-full overflow-hidden flex min-w-0">
            <div class="h-full bg-red-400" style="width:79%"></div>
          </div>
          <span class="text-xs font-bold text-red-600 w-16 text-right shrink-0">79/100</span>
          <span class="pill p-critico ml-2 shrink-0">Crítico</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs ml-2"></i>
        </div>
        <div id="set-1" class="dd-panel">
          <div class="px-4 py-3 bg-white grid grid-cols-2 md:grid-cols-4 gap-3 text-xs">
            <div class="text-center p-3 bg-red-50 rounded-lg"><p class="text-gray-500 mb-1">Demanda</p><p class="font-bold text-red-600 text-lg">84</p></div>
            <div class="text-center p-3 bg-orange-50 rounded-lg"><p class="text-gray-500 mb-1">Reconhecimento</p><p class="font-bold text-orange-600 text-lg">78</p></div>
            <div class="text-center p-3 bg-orange-50 rounded-lg"><p class="text-gray-500 mb-1">Equilíbrio</p><p class="font-bold text-orange-600 text-lg">71</p></div>
            <div class="text-center p-3 bg-yellow-50 rounded-lg"><p class="text-gray-500 mb-1">Suporte</p><p class="font-bold text-yellow-600 text-lg">58</p></div>
          </div>
        </div>
      </div>

      <!-- Expedição -->
      <div class="border border-gray-100 rounded-xl overflow-hidden">
        <div class="dd-trigger flex items-center gap-4 px-4 py-3 hover:bg-gray-50 transition" onclick="toggle('set-2', this)">
          <p class="font-medium text-sm text-gray-700 w-44 truncate shrink-0">Expedição</p>
          <div class="flex-1 h-5 rounded-full overflow-hidden flex min-w-0">
            <div class="h-full bg-orange-500" style="width:72%"></div>
          </div>
          <span class="text-xs font-bold text-orange-600 w-16 text-right shrink-0">72/100</span>
          <span class="pill p-alto ml-2 shrink-0">Alto</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs ml-2"></i>
        </div>
        <div id="set-2" class="dd-panel">
          <div class="px-4 py-3 bg-white grid grid-cols-2 md:grid-cols-4 gap-3 text-xs">
            <div class="text-center p-3 bg-red-50 rounded-lg"><p class="text-gray-500 mb-1">Demanda</p><p class="font-bold text-red-600 text-lg">82</p></div>
            <div class="text-center p-3 bg-orange-50 rounded-lg"><p class="text-gray-500 mb-1">Isolamento</p><p class="font-bold text-orange-600 text-lg">75</p></div>
            <div class="text-center p-3 bg-orange-50 rounded-lg"><p class="text-gray-500 mb-1">Controle</p><p class="font-bold text-orange-600 text-lg">68</p></div>
            <div class="text-center p-3 bg-yellow-50 rounded-lg"><p class="text-gray-500 mb-1">Segurança</p><p class="font-bold text-yellow-600 text-lg">52</p></div>
          </div>
        </div>
      </div>

      <!-- Manutenção -->
      <div class="border border-gray-100 rounded-xl overflow-hidden">
        <div class="dd-trigger flex items-center gap-4 px-4 py-3 hover:bg-gray-50 transition" onclick="toggle('set-3', this)">
          <p class="font-medium text-sm text-gray-700 w-44 truncate shrink-0">Manutenção</p>
          <div class="flex-1 h-5 rounded-full overflow-hidden flex min-w-0">
            <div class="h-full bg-orange-400" style="width:65%"></div>
          </div>
          <span class="text-xs font-bold text-orange-600 w-16 text-right shrink-0">65/100</span>
          <span class="pill p-alto ml-2 shrink-0">Alto</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs ml-2"></i>
        </div>
        <div id="set-3" class="dd-panel">
          <p class="px-4 py-3 text-xs text-gray-400 italic bg-white">Conflito de papéis e suporte de chefia insuficiente são os principais fatores neste setor.</p>
        </div>
      </div>

      <!-- Qualidade -->
      <div class="border border-gray-100 rounded-xl overflow-hidden">
        <div class="dd-trigger flex items-center gap-4 px-4 py-3 hover:bg-gray-50 transition" onclick="toggle('set-4', this)">
          <p class="font-medium text-sm text-gray-700 w-44 truncate shrink-0">Qualidade / SGQ</p>
          <div class="flex-1 h-5 rounded-full overflow-hidden flex min-w-0">
            <div class="h-full bg-yellow-400" style="width:47%"></div>
          </div>
          <span class="text-xs font-bold text-yellow-600 w-16 text-right shrink-0">47/100</span>
          <span class="pill p-medio ml-2 shrink-0">Médio</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs ml-2"></i>
        </div>
        <div id="set-4" class="dd-panel">
          <p class="px-4 py-3 text-xs text-gray-400 italic bg-white">Alta demanda emocional no setor de Inspeção (conflito de papéis com produção). SGQ apresenta bom nível geral.</p>
        </div>
      </div>

      <!-- Administrativo -->
      <div class="border border-gray-100 rounded-xl overflow-hidden">
        <div class="dd-trigger flex items-center gap-4 px-4 py-3 hover:bg-gray-50 transition" onclick="toggle('set-5', this)">
          <p class="font-medium text-sm text-gray-700 w-44 truncate shrink-0">Administrativo</p>
          <div class="flex-1 h-5 rounded-full overflow-hidden flex min-w-0">
            <div class="h-full bg-green-400" style="width:31%"></div>
          </div>
          <span class="text-xs font-bold text-green-600 w-16 text-right shrink-0">31/100</span>
          <span class="pill p-baixo ml-2 shrink-0">Baixo</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs ml-2"></i>
        </div>
        <div id="set-5" class="dd-panel">
          <p class="px-4 py-3 text-xs text-gray-400 italic bg-white">Melhor desempenho geral. TI, RH e Financeiro apresentam bom suporte social e maior autonomia percebida.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══════ §5 PLANO DE AÇÃO ══════ -->
<section id="plano">
  <div class="card">
    <div class="card-hdr">
      <div>
        <h2 class="font-bold text-gray-800">Plano de Ação Psicossocial</h2>
        <p class="text-xs text-gray-400 mt-0.5">18 ações — priorizadas por nível de risco e dimensão afetada</p>
      </div>
      <div class="flex gap-2 flex-wrap">
        <span class="text-xs px-2 py-1 rounded-lg font-medium bg-red-100 text-red-600">Urgente: 4</span>
        <span class="text-xs px-2 py-1 rounded-lg font-medium bg-orange-100 text-orange-700">Curto prazo: 7</span>
        <span class="text-xs px-2 py-1 rounded-lg font-medium bg-yellow-100 text-yellow-700">Médio prazo: 5</span>
        <span class="text-xs px-2 py-1 rounded-lg font-medium bg-green-100 text-green-700">Contínuo: 2</span>
      </div>
    </div>
    <div class="card-body space-y-3">

      <div class="border border-red-200 rounded-xl overflow-hidden">
        <div class="dd-trigger flex items-center gap-4 px-4 py-3 bg-red-50 hover:brightness-95 transition" onclick="toggle('pv-urgente', this)">
          <i class="fa-solid fa-circle-radiation text-red-500 text-sm"></i>
          <span class="font-semibold text-sm text-gray-700 flex-1">Intervenção Urgente — Risco Crítico</span>
          <span class="text-sm font-bold text-gray-600">4 ações</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs"></i>
        </div>
        <div id="pv-urgente" class="dd-panel">
          <div class="divide-y divide-gray-50">
            <div class="px-4 py-3 flex flex-col md:flex-row gap-4 bg-white text-xs">
              <div class="flex-1"><p class="font-semibold text-gray-700 mb-1">Instaurar canal de denúncias de assédio</p><p class="text-gray-500 mb-1"><span class="font-medium">Dimensão:</span> Assédio moral · Prensagem / Montagem</p><p class="text-gray-500"><span class="font-medium">Justificativa:</span> 43% dos trabalhadores da produção relatam episódios nos últimos 6 meses</p></div>
              <div class="flex-1"><p class="font-medium text-gray-600 mb-1">Recomendação</p><p class="text-gray-600 leading-relaxed">Implementar canal anônimo de denúncias (digital e físico), designar comissão de ética, capacitar gestores em prevenção ao assédio e elaborar política disciplinar formal com fluxo investigativo claro.</p></div>
              <div class="md:w-28 shrink-0"><p class="font-medium text-gray-500">Prazo</p><p class="text-red-600 font-bold">15 dias</p><p class="text-gray-400 mt-1">Responsável: RH + Diretoria</p></div>
            </div>
            <div class="px-4 py-3 flex flex-col md:flex-row gap-4 bg-white text-xs">
              <div class="flex-1"><p class="font-semibold text-gray-700 mb-1">Revisão imediata da gestão de metas na Prensagem</p><p class="text-gray-500 mb-1"><span class="font-medium">Dimensão:</span> Demanda psicológica · Alta pressão por produção</p></div>
              <div class="flex-1"><p class="font-medium text-gray-600 mb-1">Recomendação</p><p class="text-gray-600 leading-relaxed">Revisar metas de produção com base em capacidade real, eliminar práticas de comparação punitiva entre trabalhadores e estabelecer reuniões semanais de escuta ativa com equipes operacionais.</p></div>
              <div class="md:w-28 shrink-0"><p class="font-medium text-gray-500">Prazo</p><p class="text-red-600 font-bold">30 dias</p><p class="text-gray-400 mt-1">Responsável: Gestão Produção</p></div>
            </div>
            <div class="px-4 py-3 flex flex-col md:flex-row gap-4 bg-white text-xs">
              <div class="flex-1"><p class="font-semibold text-gray-700 mb-1">Capacitação de supervisores — liderança humanizada</p><p class="text-gray-500 mb-1"><span class="font-medium">Dimensão:</span> Suporte de chefia · Relacionamento interpessoal</p></div>
              <div class="flex-1"><p class="font-medium text-gray-600 mb-1">Recomendação</p><p class="text-gray-600 leading-relaxed">Programa de capacitação obrigatória para todos os supervisores em comunicação não violenta, gestão emocional, prevenção ao assédio e liderança baseada em segurança psicológica. Carga mínima: 16h.</p></div>
              <div class="md:w-28 shrink-0"><p class="font-medium text-gray-500">Prazo</p><p class="text-red-600 font-bold">45 dias</p><p class="text-gray-400 mt-1">Responsável: RH / T&D</p></div>
            </div>
            <div class="px-4 py-3 flex flex-col md:flex-row gap-4 bg-white text-xs">
              <div class="flex-1"><p class="font-semibold text-gray-700 mb-1">Atendimento psicológico individual para casos críticos</p><p class="text-gray-500 mb-1"><span class="font-medium">Dimensão:</span> Saúde mental · Funções com score &gt; 80</p></div>
              <div class="flex-1"><p class="font-medium text-gray-600 mb-1">Recomendação</p><p class="text-gray-600 leading-relaxed">Oferecer suporte psicológico individual (presencial ou online) para trabalhadores das funções com score crítico. Articular com convênio médico da empresa. Garantir sigilo total e ausência de impacto funcional.</p></div>
              <div class="md:w-28 shrink-0"><p class="font-medium text-gray-500">Prazo</p><p class="text-red-600 font-bold">30 dias</p><p class="text-gray-400 mt-1">Responsável: Medicina do Trabalho</p></div>
            </div>
          </div>
        </div>
      </div>

      <div class="border border-orange-200 rounded-xl overflow-hidden">
        <div class="dd-trigger flex items-center gap-4 px-4 py-3 bg-orange-50 hover:brightness-95 transition" onclick="toggle('pv-curto', this)">
          <i class="fa-solid fa-circle-exclamation text-orange-500 text-sm"></i>
          <span class="font-semibold text-sm text-gray-700 flex-1">Curto Prazo — Risco Alto (até 90 dias)</span>
          <span class="text-sm font-bold text-gray-600">7 ações</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs"></i>
        </div>
        <div id="pv-curto" class="dd-panel">
          <div class="divide-y divide-gray-50">
            <div class="px-4 py-3 flex flex-col md:flex-row gap-4 bg-white text-xs">
              <div class="flex-1"><p class="font-semibold text-gray-700 mb-1">Programa de rodízio e pausas nos turnos</p><p class="text-gray-500"><span class="font-medium">Dimensão:</span> Demanda · Equilíbrio · Prensagem, Soldagem, Montagem</p></div>
              <div class="flex-1"><p class="text-gray-600 leading-relaxed">Implantar rodízio de turnos com período mínimo de estabilidade (4 semanas), garantir pausas programadas de 10 min a cada 2h e criar política de não acionamento fora do horário de trabalho.</p></div>
              <div class="md:w-28 shrink-0"><p class="font-medium text-gray-500">Prazo</p><p class="text-orange-600 font-bold">60 dias</p></div>
            </div>
            <div class="px-4 py-3 flex flex-col md:flex-row gap-4 bg-white text-xs">
              <div class="flex-1"><p class="font-semibold text-gray-700 mb-1">Programa de reconhecimento institucional</p><p class="text-gray-500"><span class="font-medium">Dimensão:</span> Reconhecimento e recompensas</p></div>
              <div class="flex-1"><p class="text-gray-600 leading-relaxed">Criar programa de reconhecimento por desempenho e comportamento (não apenas produção), com critérios transparentes, feedbacks regulares e cerimônia trimestral de valorização.</p></div>
              <div class="md:w-28 shrink-0"><p class="font-medium text-gray-500">Prazo</p><p class="text-orange-600 font-bold">90 dias</p></div>
            </div>
            <div class="px-4 py-3 flex flex-col md:flex-row gap-4 bg-white text-xs">
              <div class="flex-1"><p class="font-semibold text-gray-700 mb-1">Grupos de escuta e espaços de fala</p><p class="text-gray-500"><span class="font-medium">Dimensão:</span> Suporte social · Expedição, Manutenção</p></div>
              <div class="flex-1"><p class="text-gray-600 leading-relaxed">Implantar grupos mensais de escuta facilitados por psicólogo para setores de alto risco. Criar fórum de sugestões anônimas com retorno formal da gestão em até 15 dias.</p></div>
              <div class="md:w-28 shrink-0"><p class="font-medium text-gray-500">Prazo</p><p class="text-orange-600 font-bold">90 dias</p></div>
            </div>
          </div>
        </div>
      </div>

      <div class="border border-yellow-200 rounded-xl overflow-hidden">
        <div class="dd-trigger flex items-center gap-4 px-4 py-3 bg-yellow-50 hover:brightness-95 transition" onclick="toggle('pv-medio', this)">
          <i class="fa-solid fa-minus-circle text-yellow-500 text-sm"></i>
          <span class="font-semibold text-sm text-gray-700 flex-1">Médio Prazo — Risco Médio (até 180 dias)</span>
          <span class="text-sm font-bold text-gray-600">5 ações</span>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs"></i>
        </div>
        <div id="pv-medio" class="dd-panel">
          <div class="divide-y divide-gray-50">
            <div class="px-4 py-3 flex flex-col md:flex-row gap-4 bg-white text-xs">
              <div class="flex-1"><p class="font-semibold text-gray-700 mb-1">Política de flexibilidade para turnos fixos</p><p class="text-gray-500"><span class="font-medium">Dimensão:</span> Equilíbrio trabalho-vida</p></div>
              <div class="flex-1"><p class="text-gray-600 leading-relaxed">Permitir a fixação de turno por solicitação justificada (saúde, família) com análise de viabilidade operacional. Implementar banco de horas com compensação real.</p></div>
              <div class="md:w-28 shrink-0"><p class="font-medium text-gray-500">Prazo</p><p class="text-yellow-600 font-bold">150 dias</p></div>
            </div>
            <div class="px-4 py-3 flex flex-col md:flex-row gap-4 bg-white text-xs">
              <div class="flex-1"><p class="font-semibold text-gray-700 mb-1">Reavaliação dos critérios de promoção interna</p><p class="text-gray-500"><span class="font-medium">Dimensão:</span> Reconhecimento · Segurança no emprego</p></div>
              <div class="flex-1"><p class="text-gray-600 leading-relaxed">Elaborar plano de cargos e salários transparente, com critérios objetivos de progressão. Comunicar oportunidades internas antes de abrir seleção externa.</p></div>
              <div class="md:w-28 shrink-0"><p class="font-medium text-gray-500">Prazo</p><p class="text-yellow-600 font-bold">180 dias</p></div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══════ §6 MAPEAMENTO COMPLETO ══════ -->
<section id="mapeamento">
  <div class="card">
    <div class="card-hdr">
      <div>
        <h2 class="font-bold text-gray-800">Mapeamento Psicossocial Completo</h2>
        <p class="text-xs text-gray-400 mt-0.5">24 funções avaliadas</p>
      </div>
    </div>
    <div class="px-5 py-3 border-b border-gray-100 flex flex-wrap gap-2 no-print">
      <input type="text" placeholder="Buscar função, setor..."
             oninput="filterTable('mapTable', this.value)"
             class="text-xs border border-gray-200 rounded-lg px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-indigo-200">
      <select onchange="filterTableByRisco('mapTable', this.value)"
              class="text-xs border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200">
        <option value="">Todos os níveis</option>
        <option value="crítico">Crítico</option>
        <option value="alto">Alto</option>
        <option value="médio">Médio</option>
        <option value="baixo">Baixo</option>
      </select>
    </div>
    <div class="overflow-x-auto">
      <table id="mapTable" class="w-full text-xs">
        <thead><tr class="bg-gray-50 border-b border-gray-100">
          <th class="px-4 py-3 text-left text-gray-400 font-medium">SETOR</th>
          <th class="px-4 py-3 text-left text-gray-400 font-medium">FUNÇÃO</th>
          <th class="px-4 py-3 text-center text-gray-400 font-medium">DEMANDA</th>
          <th class="px-4 py-3 text-center text-gray-400 font-medium">CONTROLE</th>
          <th class="px-4 py-3 text-center text-gray-400 font-medium">SUPORTE</th>
          <th class="px-4 py-3 text-center text-gray-400 font-medium">RECONHEC.</th>
          <th class="px-4 py-3 text-center text-gray-400 font-medium">ASSÉDIO</th>
          <th class="px-4 py-3 text-center text-gray-400 font-medium">SCORE</th>
          <th class="px-4 py-3 text-center text-gray-400 font-medium">NÍVEL</th>
        </tr></thead>
        <tbody class="divide-y divide-gray-50 bg-white">
          <tr><td class="px-4 py-2 text-gray-600">Prensagem</td><td class="px-4 py-2 font-medium text-gray-800">Operador de Prensa</td><td class="px-4 py-2 text-center text-red-600 font-bold">91</td><td class="px-4 py-2 text-center text-red-600 font-bold">89</td><td class="px-4 py-2 text-center text-orange-600 font-bold">74</td><td class="px-4 py-2 text-center text-orange-600 font-bold">71</td><td class="px-4 py-2 text-center text-red-600 font-bold">85</td><td class="px-4 py-2 text-center font-bold text-red-600">88</td><td class="px-4 py-2 text-center"><span class="pill p-critico">Crítico</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Soldagem</td><td class="px-4 py-2 font-medium text-gray-800">Soldador MIG/TIG</td><td class="px-4 py-2 text-center text-red-600 font-bold">84</td><td class="px-4 py-2 text-center text-orange-600 font-bold">77</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">58</td><td class="px-4 py-2 text-center text-orange-600 font-bold">78</td><td class="px-4 py-2 text-center text-orange-600 font-bold">62</td><td class="px-4 py-2 text-center font-bold text-red-600">83</td><td class="px-4 py-2 text-center"><span class="pill p-critico">Crítico</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Produção</td><td class="px-4 py-2 font-medium text-gray-800">Supervisor de Produção</td><td class="px-4 py-2 text-center text-red-600 font-bold">88</td><td class="px-4 py-2 text-center text-orange-600 font-bold">64</td><td class="px-4 py-2 text-center text-orange-600 font-bold">66</td><td class="px-4 py-2 text-center text-orange-600 font-bold">72</td><td class="px-4 py-2 text-center text-orange-600 font-bold">61</td><td class="px-4 py-2 text-center font-bold text-red-600">81</td><td class="px-4 py-2 text-center"><span class="pill p-critico">Crítico</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Expedição</td><td class="px-4 py-2 font-medium text-gray-800">Separador de Pedidos</td><td class="px-4 py-2 text-center text-red-600 font-bold">82</td><td class="px-4 py-2 text-center text-orange-600 font-bold">70</td><td class="px-4 py-2 text-center text-orange-600 font-bold">68</td><td class="px-4 py-2 text-center text-orange-600 font-bold">65</td><td class="px-4 py-2 text-center text-orange-600 font-bold">63</td><td class="px-4 py-2 text-center font-bold text-red-600">79</td><td class="px-4 py-2 text-center"><span class="pill p-critico">Crítico</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Usinagem CNC</td><td class="px-4 py-2 font-medium text-gray-800">Operador CNC</td><td class="px-4 py-2 text-center text-orange-600 font-bold">76</td><td class="px-4 py-2 text-center text-orange-600 font-bold">71</td><td class="px-4 py-2 text-center text-orange-600 font-bold">65</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">55</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">50</td><td class="px-4 py-2 text-center font-bold text-orange-600">74</td><td class="px-4 py-2 text-center"><span class="pill p-alto">Alto</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Acabamento</td><td class="px-4 py-2 font-medium text-gray-800">Rebarbador</td><td class="px-4 py-2 text-center text-orange-600 font-bold">73</td><td class="px-4 py-2 text-center text-orange-600 font-bold">69</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">57</td><td class="px-4 py-2 text-center text-orange-600 font-bold">66</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">53</td><td class="px-4 py-2 text-center font-bold text-orange-600">71</td><td class="px-4 py-2 text-center"><span class="pill p-alto">Alto</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Montagem</td><td class="px-4 py-2 font-medium text-gray-800">Montador de Subconjuntos</td><td class="px-4 py-2 text-center text-orange-600 font-bold">71</td><td class="px-4 py-2 text-center text-orange-600 font-bold">74</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">54</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">58</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">47</td><td class="px-4 py-2 text-center font-bold text-orange-600">70</td><td class="px-4 py-2 text-center"><span class="pill p-alto">Alto</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Logística</td><td class="px-4 py-2 font-medium text-gray-800">Auxiliar de Almoxarifado</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">58</td><td class="px-4 py-2 text-center text-orange-600 font-bold">62</td><td class="px-4 py-2 text-center text-orange-600 font-bold">61</td><td class="px-4 py-2 text-center text-orange-600 font-bold">70</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">45</td><td class="px-4 py-2 text-center font-bold text-orange-600">68</td><td class="px-4 py-2 text-center"><span class="pill p-alto">Alto</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Manutenção</td><td class="px-4 py-2 font-medium text-gray-800">Mecânico de Manutenção</td><td class="px-4 py-2 text-center text-orange-600 font-bold">64</td><td class="px-4 py-2 text-center text-orange-600 font-bold">61</td><td class="px-4 py-2 text-center text-orange-600 font-bold">63</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">55</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">44</td><td class="px-4 py-2 text-center font-bold text-orange-600">67</td><td class="px-4 py-2 text-center"><span class="pill p-alto">Alto</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">PCP</td><td class="px-4 py-2 font-medium text-gray-800">Analista de PCP</td><td class="px-4 py-2 text-center text-orange-600 font-bold">67</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">52</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">48</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">56</td><td class="px-4 py-2 text-center text-green-600 font-bold">31</td><td class="px-4 py-2 text-center font-bold text-orange-600">65</td><td class="px-4 py-2 text-center"><span class="pill p-alto">Alto</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Expedição</td><td class="px-4 py-2 font-medium text-gray-800">Operador de Empilhadeira</td><td class="px-4 py-2 text-center text-orange-600 font-bold">61</td><td class="px-4 py-2 text-center text-orange-600 font-bold">65</td><td class="px-4 py-2 text-center text-orange-600 font-bold">67</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">48</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">40</td><td class="px-4 py-2 text-center font-bold text-orange-600">63</td><td class="px-4 py-2 text-center"><span class="pill p-alto">Alto</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Qualidade</td><td class="px-4 py-2 font-medium text-gray-800">Inspetor de Qualidade</td><td class="px-4 py-2 text-center text-orange-600 font-bold">64</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">58</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">52</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">55</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">42</td><td class="px-4 py-2 text-center font-bold text-orange-600">62</td><td class="px-4 py-2 text-center"><span class="pill p-alto">Alto</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Usinagem CNC</td><td class="px-4 py-2 font-medium text-gray-800">Setup de Máquinas</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">55</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">48</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">46</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">52</td><td class="px-4 py-2 text-center text-green-600 font-bold">35</td><td class="px-4 py-2 text-center font-bold text-yellow-600">52</td><td class="px-4 py-2 text-center"><span class="pill p-medio">Médio</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Lab. Metrologia</td><td class="px-4 py-2 font-medium text-gray-800">Metrôlogo</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">51</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">44</td><td class="px-4 py-2 text-center text-green-600 font-bold">38</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">50</td><td class="px-4 py-2 text-center text-green-600 font-bold">32</td><td class="px-4 py-2 text-center font-bold text-yellow-600">50</td><td class="px-4 py-2 text-center"><span class="pill p-medio">Médio</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Recebimento</td><td class="px-4 py-2 font-medium text-gray-800">Conferente de Recebimento</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">52</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">46</td><td class="px-4 py-2 text-center text-green-600 font-bold">39</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">48</td><td class="px-4 py-2 text-center text-green-600 font-bold">34</td><td class="px-4 py-2 text-center font-bold text-yellow-600">48</td><td class="px-4 py-2 text-center"><span class="pill p-medio">Médio</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Montagem</td><td class="px-4 py-2 font-medium text-gray-800">Auxiliar de Montagem</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">49</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">52</td><td class="px-4 py-2 text-center text-green-600 font-bold">37</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">44</td><td class="px-4 py-2 text-center text-green-600 font-bold">28</td><td class="px-4 py-2 text-center font-bold text-yellow-600">46</td><td class="px-4 py-2 text-center"><span class="pill p-medio">Médio</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Prensagem</td><td class="px-4 py-2 font-medium text-gray-800">Abastecedor de Estampos</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">48</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">50</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">42</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">41</td><td class="px-4 py-2 text-center text-green-600 font-bold">30</td><td class="px-4 py-2 text-center font-bold text-yellow-600">45</td><td class="px-4 py-2 text-center"><span class="pill p-medio">Médio</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Financeiro</td><td class="px-4 py-2 font-medium text-gray-800">Assistente Financeiro</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">46</td><td class="px-4 py-2 text-center text-green-600 font-bold">38</td><td class="px-4 py-2 text-center text-green-600 font-bold">34</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">44</td><td class="px-4 py-2 text-center text-green-600 font-bold">26</td><td class="px-4 py-2 text-center font-bold text-yellow-600">43</td><td class="px-4 py-2 text-center"><span class="pill p-medio">Médio</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Compras</td><td class="px-4 py-2 font-medium text-gray-800">Analista de Compras</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">44</td><td class="px-4 py-2 text-center text-green-600 font-bold">36</td><td class="px-4 py-2 text-center text-green-600 font-bold">32</td><td class="px-4 py-2 text-center text-yellow-600 font-bold">42</td><td class="px-4 py-2 text-center text-green-600 font-bold">24</td><td class="px-4 py-2 text-center font-bold text-yellow-600">41</td><td class="px-4 py-2 text-center"><span class="pill p-medio">Médio</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Acabamento</td><td class="px-4 py-2 font-medium text-gray-800">Operador de Jateamento</td><td class="px-4 py-2 text-center text-green-600 font-bold">38</td><td class="px-4 py-2 text-center text-green-600 font-bold">35</td><td class="px-4 py-2 text-center text-green-600 font-bold">30</td><td class="px-4 py-2 text-center text-green-600 font-bold">36</td><td class="px-4 py-2 text-center text-green-600 font-bold">22</td><td class="px-4 py-2 text-center font-bold text-green-600">37</td><td class="px-4 py-2 text-center"><span class="pill p-baixo">Baixo</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">SGQ</td><td class="px-4 py-2 font-medium text-gray-800">Técnico de SGQ</td><td class="px-4 py-2 text-center text-green-600 font-bold">35</td><td class="px-4 py-2 text-center text-green-600 font-bold">32</td><td class="px-4 py-2 text-center text-green-600 font-bold">28</td><td class="px-4 py-2 text-center text-green-600 font-bold">31</td><td class="px-4 py-2 text-center text-green-600 font-bold">19</td><td class="px-4 py-2 text-center font-bold text-green-600">33</td><td class="px-4 py-2 text-center"><span class="pill p-baixo">Baixo</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">Soldagem</td><td class="px-4 py-2 font-medium text-gray-800">Auxiliar de Soldagem</td><td class="px-4 py-2 text-center text-green-600 font-bold">36</td><td class="px-4 py-2 text-center text-green-600 font-bold">34</td><td class="px-4 py-2 text-center text-green-600 font-bold">29</td><td class="px-4 py-2 text-center text-green-600 font-bold">33</td><td class="px-4 py-2 text-center text-green-600 font-bold">21</td><td class="px-4 py-2 text-center font-bold text-green-600">35</td><td class="px-4 py-2 text-center"><span class="pill p-baixo">Baixo</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">RH</td><td class="px-4 py-2 font-medium text-gray-800">Analista de RH</td><td class="px-4 py-2 text-center text-green-600 font-bold">33</td><td class="px-4 py-2 text-center text-green-600 font-bold">29</td><td class="px-4 py-2 text-center text-green-600 font-bold">26</td><td class="px-4 py-2 text-center text-green-600 font-bold">28</td><td class="px-4 py-2 text-center text-green-600 font-bold">17</td><td class="px-4 py-2 text-center font-bold text-green-600">31</td><td class="px-4 py-2 text-center"><span class="pill p-baixo">Baixo</span></td></tr>
          <tr><td class="px-4 py-2 text-gray-600">TI / Suporte</td><td class="px-4 py-2 font-medium text-gray-800">Analista de TI</td><td class="px-4 py-2 text-center text-green-600 font-bold">29</td><td class="px-4 py-2 text-center text-green-600 font-bold">26</td><td class="px-4 py-2 text-center text-green-600 font-bold">24</td><td class="px-4 py-2 text-center text-green-600 font-bold">27</td><td class="px-4 py-2 text-center text-green-600 font-bold">14</td><td class="px-4 py-2 text-center font-bold text-green-600">28</td><td class="px-4 py-2 text-center"><span class="pill p-baixo">Baixo</span></td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- ══════ §7 POPULAÇÃO ══════ -->
<section id="populacao">
  <div class="card">
    <div class="card-hdr">
      <div>
        <h2 class="font-bold text-gray-800">Características da População Avaliada</h2>
        <p class="text-xs text-gray-400 mt-0.5">Dados demográficos — 184 respondentes</p>
      </div>
      <span class="text-xs text-gray-400">Taxa de resposta: 91%</span>
    </div>
    <div class="divide-y divide-gray-50">

      <div>
        <div class="dd-trigger flex items-center gap-4 px-5 py-4 hover:bg-gray-50 transition" onclick="toggle('pop-geral', this)">
          <div class="w-8 h-8 rounded-lg bg-purple-50 text-purple-400 flex items-center justify-center shrink-0"><i class="fa-solid fa-users text-sm"></i></div>
          <div class="flex-1">
            <p class="font-medium text-gray-700 text-sm">Perfil Geral — Toda a empresa</p>
            <p class="text-xs text-gray-400">184 trabalhadores · 7 setores</p>
          </div>
          <i class="fa-solid fa-chevron-down chevron text-gray-400 text-xs"></i>
        </div>
        <div id="pop-geral" class="dd-panel">
          <div class="px-5 py-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 bg-slate-50/60">
            <div class="bg-white rounded-xl border border-gray-100 p-4">
              <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Gênero</p>
              <div class="space-y-2">
                <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Masculino</span><span class="font-medium">136 (74%)</span></div><div class="mini-bar-wrap"><div class="mini-bar" style="width:74%;background:#6366f1"></div></div></div>
                <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Feminino</span><span class="font-medium">48 (26%)</span></div><div class="mini-bar-wrap"><div class="mini-bar" style="width:26%;background:#6366f1"></div></div></div>
              </div>
            </div>
            <div class="bg-white rounded-xl border border-gray-100 p-4">
              <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Faixa Etária</p>
              <div class="space-y-2">
                <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>18–25 anos</span><span class="font-medium">22 (12%)</span></div><div class="mini-bar-wrap"><div class="mini-bar" style="width:12%;background:#f59e0b"></div></div></div>
                <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>26–35 anos</span><span class="font-medium">74 (40%)</span></div><div class="mini-bar-wrap"><div class="mini-bar" style="width:40%;background:#f59e0b"></div></div></div>
                <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>36–45 anos</span><span class="font-medium">58 (32%)</span></div><div class="mini-bar-wrap"><div class="mini-bar" style="width:32%;background:#f59e0b"></div></div></div>
                <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>46+ anos</span><span class="font-medium">30 (16%)</span></div><div class="mini-bar-wrap"><div class="mini-bar" style="width:16%;background:#f59e0b"></div></div></div>
              </div>
            </div>
            <div class="bg-white rounded-xl border border-gray-100 p-4">
              <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Escolaridade</p>
              <div class="space-y-2">
                <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Fund. Completo</span><span class="font-medium">18 (10%)</span></div><div class="mini-bar-wrap"><div class="mini-bar" style="width:10%;background:#10b981"></div></div></div>
                <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Médio Completo</span><span class="font-medium">88 (48%)</span></div><div class="mini-bar-wrap"><div class="mini-bar" style="width:48%;background:#10b981"></div></div></div>
                <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Técnico</span><span class="font-medium">46 (25%)</span></div><div class="mini-bar-wrap"><div class="mini-bar" style="width:25%;background:#10b981"></div></div></div>
                <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>Superior+</span><span class="font-medium">32 (17%)</span></div><div class="mini-bar-wrap"><div class="mini-bar" style="width:17%;background:#10b981"></div></div></div>
              </div>
            </div>
            <div class="bg-white rounded-xl border border-gray-100 p-4">
              <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Tempo de Empresa</p>
              <div class="space-y-2">
                <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>&lt; 1 ano</span><span class="font-medium">29 (16%)</span></div><div class="mini-bar-wrap"><div class="mini-bar" style="width:16%;background:#ef4444"></div></div></div>
                <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>1–3 anos</span><span class="font-medium">62 (34%)</span></div><div class="mini-bar-wrap"><div class="mini-bar" style="width:34%;background:#ef4444"></div></div></div>
                <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>3–5 anos</span><span class="font-medium">55 (30%)</span></div><div class="mini-bar-wrap"><div class="mini-bar" style="width:30%;background:#ef4444"></div></div></div>
                <div><div class="flex justify-between text-xs text-gray-600 mb-0.5"><span>&gt; 5 anos</span><span class="font-medium">38 (20%)</span></div><div class="mini-bar-wrap"><div class="mini-bar" style="width:20%;background:#ef4444"></div></div></div>
              </div>
            </div>
          </div>
          <div class="px-5 pb-5 bg-slate-50/60">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide mb-3">Indicadores de Saúde Mental — Questionário ARP</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
              <div>
                <div class="flex items-center gap-2 mb-1"><span class="text-xs text-gray-500 w-36">Sintomas de estresse</span><div class="h-bar-wrap"><div class="h-bar bg-red-400" style="width:61%"></div></div><span class="text-xs font-bold text-red-500 w-20 text-right">61% (112)</span></div>
                <div class="flex items-center gap-2 mb-1"><span class="text-xs text-gray-500 w-36">Sintomas de burnout</span><div class="h-bar-wrap"><div class="h-bar bg-orange-400" style="width:38%"></div></div><span class="text-xs font-bold text-orange-500 w-20 text-right">38% (70)</span></div>
                <div class="flex items-center gap-2"><span class="text-xs text-gray-500 w-36">Distúrbios do sono</span><div class="h-bar-wrap"><div class="h-bar bg-yellow-400" style="width:54%"></div></div><span class="text-xs font-bold text-yellow-600 w-20 text-right">54% (99)</span></div>
              </div>
              <div>
                <div class="flex items-center gap-2 mb-1"><span class="text-xs text-gray-500 w-36">Intenção de sair</span><div class="h-bar-wrap"><div class="h-bar bg-orange-400" style="width:44%"></div></div><span class="text-xs font-bold text-orange-500 w-20 text-right">44% (81)</span></div>
                <div class="flex items-center gap-2 mb-1"><span class="text-xs text-gray-500 w-36">Presenteísmo</span><div class="h-bar-wrap"><div class="h-bar bg-yellow-400" style="width:57%"></div></div><span class="text-xs font-bold text-yellow-600 w-20 text-right">57% (105)</span></div>
                <div class="flex items-center gap-2"><span class="text-xs text-gray-500 w-36">Absenteísmo frequente</span><div class="h-bar-wrap"><div class="h-bar bg-yellow-400" style="width:29%"></div></div><span class="text-xs font-bold text-yellow-600 w-20 text-right">29% (53)</span></div>
              </div>
              <div class="bg-indigo-50 rounded-xl p-3 border border-indigo-100">
                <p class="text-xs font-semibold text-indigo-700 mb-2">Turnos mais afetados</p>
                <div class="space-y-1 text-xs">
                  <div class="flex justify-between"><span class="text-gray-600">Turno da madrugada</span><span class="font-bold text-red-600">78% estresse</span></div>
                  <div class="flex justify-between"><span class="text-gray-600">Turno tarde</span><span class="font-bold text-orange-600">64% estresse</span></div>
                  <div class="flex justify-between"><span class="text-gray-600">Turno manhã</span><span class="font-bold text-yellow-600">48% estresse</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══════ §8 EQUIPE ══════ -->
<section id="equipe">
  <div class="card">
    <div class="card-hdr">
      <h2 class="font-bold text-gray-800">Equipe Responsável pela Elaboração</h2>
    </div>
    <div class="card-body flex flex-wrap gap-4">
      <div class="flex items-center gap-3 bg-gray-50 rounded-xl px-4 py-3 border border-gray-100">
        <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-500 flex items-center justify-center shrink-0"><i class="fa-solid fa-user-tie"></i></div>
        <div>
          <p class="text-sm font-semibold text-gray-800">Dra. Renata Vaz</p>
          <p class="text-xs text-gray-500">Psicóloga Organizacional — Responsável Técnica</p>
          <p class="text-xs text-gray-400">CRP 06/112.845</p>
        </div>
      </div>
      <div class="flex items-center gap-3 bg-gray-50 rounded-xl px-4 py-3 border border-gray-100">
        <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-500 flex items-center justify-center shrink-0"><i class="fa-solid fa-user-tie"></i></div>
        <div>
          <p class="text-sm font-semibold text-gray-800">Dr. Fábio R. Monteiro</p>
          <p class="text-xs text-gray-500">Ergonomista / Coordenador ARP</p>
          <p class="text-xs text-gray-400">CREA-SP 5.062.891-D</p>
        </div>
      </div>
      <div class="flex items-center gap-3 bg-gray-50 rounded-xl px-4 py-3 border border-gray-100">
        <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-500 flex items-center justify-center shrink-0"><i class="fa-solid fa-user-tie"></i></div>
        <div>
          <p class="text-sm font-semibold text-gray-800">Enf. Carlos Mendes</p>
          <p class="text-xs text-gray-500">Enfermeiro do Trabalho</p>
          <p class="text-xs text-gray-400">COREN-SP 412.987</p>
        </div>
      </div>
      <div class="flex items-center gap-3 bg-gray-50 rounded-xl px-4 py-3 border border-gray-100">
        <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-500 flex items-center justify-center shrink-0"><i class="fa-solid fa-user-tie"></i></div>
        <div>
          <p class="text-sm font-semibold text-gray-800">Dra. Camila A. Ferreira</p>
          <p class="text-xs text-gray-500">Fisioterapeuta do Trabalho</p>
          <p class="text-xs text-gray-400">CREFITO-SP 138.742-F</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- RODAPÉ -->
<div class="text-center text-xs text-gray-400 border-t border-gray-200 pt-6">
  Dashboard gerado em 17/05/2025 ·
  <span class="font-semibold text-gray-600">ARP Insights</span> ·
  CNPJ 12.345.678/0001-99 ·
  Período: Janeiro a Maio / 2025
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

  function filterTableByRisco(tableId, value) {
    const q = value.toLowerCase();
    document.querySelectorAll('#' + tableId + ' tbody tr').forEach(row => {
      if (!q) { row.style.display = ''; return; }
      const lastCell = row.cells[row.cells.length - 1];
      row.style.display = (lastCell && lastCell.textContent.toLowerCase().includes(q)) ? '' : 'none';
    });
  }
</script>
</body>
</html>