<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório ARP - {{ $empresa->nome }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        @page { size: A4; margin: 1.5cm; }
        body { background-color: #fff; font-family: 'Arial', sans-serif; color: #333; font-size: 11pt; }
        
        /* Quebras de Página */
        .page-break { page-break-before: always; }
        .no-break { page-break-inside: avoid; }

        /* Capa */
        .capa {
            height: 95vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
            padding: 2cm 0;
        }
        .capa h1 { font-size: 35pt; font-weight: bold; color: #2c3e50; }
        
        /* Sumário */
        .sumario-container { height: 95vh; padding-top: 2cm; }
        .sumario-item { display: flex; justify-content: space-between; border-bottom: 1px dotted #ccc; margin-bottom: 12px; }

        /* Estilização de Tabelas e Cores */
        .table { font-size: 10pt; }
        .bg-success { background-color: #198754 !important; color: white !important; -webkit-print-color-adjust: exact; }
        .bg-warning { background-color: #ffc107 !important; color: black !important; -webkit-print-color-adjust: exact; }
        .bg-orange { background-color: #f97316 !important; color: white !important; -webkit-print-color-adjust: exact; }
        .bg-danger { background-color: #dc3545 !important; color: white !important; -webkit-print-color-adjust: exact; }
        
        .badge { padding: 6px 10px; text-transform: uppercase; font-size: 8pt; }

        /* Assinatura */
        .assinatura-box {
            margin-top: 50px;
            border-top: 1px solid #000;
            width: 300px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            padding-top: 10px;
        }

        @media print {
            .no-print { display: none; }
            .card { border: none !important; }
        }
    </style>
</head>
<body>

    <div class="no-print text-center my-4">
        <button onclick="window.print()" class="btn btn-primary btn-lg shadow">🖨️ Gerar PDF / Imprimir</button>
    </div>

    <div class="capa">
        <div>
            <h5 class="text-muted">PROGRAMA DE GESTÃO PSICOSSOCIAL</h5>
            <hr style="width: 100px; margin: auto;">
        </div>
        <div>
            <h1>{{ $empresa->nome }}</h1>
            <h3 class="text-secondary">Relatório de Análise de Riscos Psicossociais (ARP)</h3>
            <p class="mt-4">Ano de Referência: {{ date('Y') }}</p>
        </div>
        <div>
            <p><strong>Responsável:</strong> {{ auth()->user()->name ?? 'Consultor Técnico' }}</p>
            <p><strong>Data:</strong> {{ date('d/m/Y') }}</p>
        </div>
    </div>

    <div class="page-break sumario-container">
        <h2 class="mb-5">Sumário</h2>
        <div class="sumario-item"><span>1. Identificação da Empresa</span> <span>03</span></div>
        <div class="sumario-item"><span>2. Resumo Executivo de Severidade</span> <span>03</span></div>
        <div class="sumario-item"><span>3. Resultados Consolidados (Geral)</span> <span>04</span></div>
        <div class="sumario-item"><span>4. Análise por Setor</span> <span>05</span></div>
        <div class="sumario-item"><span>5. Plano de Ação Recomendado</span> <span>{{ count($mediasPorSetor) + 5 }}</span></div>
        <div class="sumario-item"><span>6. Encerramento</span> <span>{{ count($mediasPorSetor) + 6 }}</span></div>
    </div>

    <div class="page-break">
        <h4 class="border-bottom pb-2">1. Identificação da Empresa</h4>
        <div class="row mt-3 mb-5">
            <div class="col-6 mb-2"><strong>Nome:</strong> {{ $empresa->nome }}</div>
            <div class="col-6 mb-2"><strong>CNPJ:</strong> {{ $empresa->cnpj }}</div>
            <div class="col-6 mb-2"><strong>Ramo:</strong> {{ $empresa->setor }}</div>
            <div class="col-6 mb-2"><strong>Cidade/UF:</strong> {{ $empresa->cidade }}/{{ $empresa->estado }}</div>
            <div class="col-12"><strong>Endereço:</strong> {{ $empresa->rua }}, {{ $empresa->numero }} - {{ $empresa->bairro }}</div>
        </div>

        <h4 class="border-bottom pb-2">2. Resumo Executivo de Severidade</h4>
        @php
            $contagem = ['Leve' => 0, 'Moderado' => 0, 'Sério' => 0, 'Severo' => 0];
            foreach($mediasGerais as $m) {
                $nivel = ($m['nivel'] == 'Sério') ? 'Sério' : ( ($m['nivel'] == 'Severo') ? 'Severo' : $m['nivel'] );
                if(isset($contagem[$nivel])) $contagem[$nivel]++;
            }
        @endphp

        <div class="row mt-4 text-center">
            <div class="col-3"><div class="p-3 border rounded bg-light text-success"><h5>{{ $contagem['Leve'] }}</h5><small>Leve</small></div></div>
            <div class="col-3"><div class="p-3 border rounded bg-light text-warning"><h5>{{ $contagem['Moderado'] }}</h5><small>Moderado</small></div></div>
            <div class="col-3"><div class="p-3 border rounded bg-light text-orange" style="color:#f97316;"><h5>{{ $contagem['Sério'] }}</h5><small>Sério</small></div></div>
            <div class="col-3"><div class="p-3 border rounded bg-light text-danger"><h5>{{ $contagem['Severo'] }}</h5><small>Severo</small></div></div>
        </div>
        <p class="mt-4 small">O gráfico acima consolida a percepção geral de risco da empresa com base em todos os indicadores analisados.</p>
    </div>

    <div class="page-break">
        <h4 class="mb-4">3. Resultados Consolidados (Geral)</h4>
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Categoria</th>
                    <th class="text-center">Média</th>
                    <th class="text-center">Severidade</th>
                    <th class="text-center">Nível de Risco</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mediasGerais as $dado)
                <tr>
                    <td class="fw-bold">{{ $dado['categoria'] }}</td>
                    <td class="text-center">{{ number_format($dado['media'], 2, ',', '.') }}</td>
                    <td class="text-center">
                        @php
                            $cor = 'bg-secondary';
                            if ($dado['nivel'] === 'Leve') $cor = 'bg-success';
                            elseif ($dado['nivel'] === 'Moderado') $cor = 'bg-warning';
                            elseif ($dado['nivel'] === 'Sério') $cor = 'bg-orange';
                            else $cor = 'bg-danger';
                        @endphp
                        <span class="badge {{ $cor }}">{{ $dado['nivel'] }}</span>
                    </td>
                    <td class="text-center">
                        {{ $dado['nivel'] === 'Leve' ? 'Insignificante' : ($dado['nivel'] === 'Moderado' ? 'Baixo' : ($dado['nivel'] === 'Sério' ? 'Alto' : 'Crítico')) }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @foreach($mediasPorSetor as $setor => $dadosDoSetor)
    <div class="page-break">
        <h4 class="mb-3">4. Análise do Setor: <span class="text-primary">{{ $setor }}</span></h4>
        <p class="small">Total de participantes neste setor: {{ $dadosDoSetor['totalParticipantes'] }}</p>
        
        <table class="table table-sm table-striped border">
            <thead>
                <tr class="table-secondary">
                    <th>Indicador Psicossocial</th>
                    <th class="text-center">Média Local</th>
                    <th class="text-center">Classificação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dadosDoSetor['medias'] as $d)
                <tr>
                    <td>{{ $d['categoria'] }}</td>
                    <td class="text-center fw-bold">{{ number_format($d['media'], 2, ',', '.') }}</td>
                    <td class="text-center">
                         @php
                            $corS = 'bg-secondary';
                            if ($d['nivel'] === 'Leve') $corS = 'bg-success';
                            elseif ($d['nivel'] === 'Moderado') $corS = 'bg-warning';
                            elseif ($d['nivel'] === 'Sério') $corS = 'bg-orange';
                            else $corS = 'bg-danger';
                        @endphp
                        <span class="badge {{ $corS }}">{{ $d['nivel'] }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach

    <div class="page-break">
        <h4 class="mb-4">5. Plano de Ação Recomendado (Geral)</h4>
        <p class="small text-muted mb-4">Abaixo, listamos as intervenções sugeridas para cada categoria, priorizando os níveis de maior severidade encontrados na média geral.</p>
        
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th style="width: 25%;">Categoria</th>
                    <th style="width: 15%;" class="text-center">Severidade</th>
                    <th>Ações Estratégicas Recomendadas</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sugestoesDict = [ /* O array que você forneceu será usado aqui */
                        0 => ['Leve' => 'Realizar campanhas educativas...', 'Moderado' => '...', 'Sério' => '...', 'Severo' => '...'],
                        // ... (o Laravel lerá do @php que você já tem no arquivo)
                    ];
                @endphp

                @foreach ($mediasGerais as $index => $dado)
                <tr class="no-break">
                    <td class="fw-bold">{{ $dado['categoria'] }}</td>
                    <td class="text-center">
                        <span class="badge {{ $cor ?? '' }}" 
                            @if($dado['nivel'] === 'Leve') style="background-color: #198754; color:white;" 
                            @elseif($dado['nivel'] === 'Moderado') style="background-color: #ffc107; color:black;" 
                            @elseif($dado['nivel'] === 'Sério') style="background-color: #f97316; color:white;" 
                            @else style="background-color: #dc3545; color:white;" @endif>
                            {{ $dado['nivel'] }}
                        </span>
                    </td>
                    <td style="font-size: 9.5pt;">
                        @php
                            $nivelKey = $dado['nivel'];
                            // Garante que o índice não estoure o dicionário
                            $idx = min($index, 15);
                            echo $sugestoesDict[$idx][$nivelKey] ?? 'Realizar monitoramento preventivo da categoria.';
                        @endphp
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="page-break">
        <h4 class="mb-5 border-bottom pb-2">6. Encerramento</h4>
        <p>As conclusões apresentadas neste documento baseiam-se nos dados estatísticos coletados. Este relatório deve ser utilizado como guia para melhoria contínua do ambiente de trabalho e saúde mental dos colaboradores.</p>
        
        <div style="height: 150px;"></div>
        
        <div class="text-center">
            <p>{{ $empresa->cidade }} - {{ $empresa->estado }}, {{ date('d/m/Y') }}</p>
            
            <div class="assinatura-box">
                <p class="mb-0"><strong>{{ auth()->user()->name ?? 'NOME DO RESPONSÁVEL' }}</strong></p>
                <p class="small">Responsável Técnico / Consultoria</p>
            </div>
        </div>
    </div>

</body>
</html>