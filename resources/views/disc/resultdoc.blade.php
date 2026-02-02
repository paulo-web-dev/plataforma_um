<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório DISC</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f4f4;
            color: #222;
        }

        .a4 {
            width: 210mm;
            min-height: 297mm;
            margin: auto;
            background: white;
            padding: 25mm;
        }

        h1, h2, h3 {
            text-align: center;
        }

        p {
            font-size: 14px;
            line-height: 1.6;
            text-align: justify;
        }

        .grafico {
            margin-top: 40px;
            page-break-inside: avoid;
        }

        .valores {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-weight: bold;
        }

        .valores div {
            width: 23%;
            text-align: center;
        }

        /* PRINT */
        @media print {
            body {
                background: none;
            }

            .a4 {
                margin: 0;
                box-shadow: none;
            }

            .no-print {
                display: none;
            }

            @page {
                size: A4;
                margin: 20mm;
            }
        }
    </style>
</head>
<body>

<div class="a4">

    <h1>Relatório DISC</h1>

    <p>
        Olá, <strong>{{ $funcionario->nome }}</strong>, seja muito bem-vindo(a)!
    </p>

    <p>
        Gostaríamos de te parabenizar pelo grande passo dado em busca de
        autoconhecimento.
    </p>

    <p>
        Este relatório é frequentemente utilizado por profissionais
        especialistas comportamentais, como Coaches, Terapeutas e
        Profissionais de RH, com o objetivo de maximizar a performance.
        Entretanto, a devolutiva DISC deve ser realizada por um profissional
        capacitado, garantindo resultados mais assertivos.
    </p>

    @if($perfilDominante === 'D')
    <h3>Perfil Dominante – Padrão D</h3>

    <p>
        Pessoas que apresentam o padrão D têm como características marcantes
        a competitividade, agressividade, velocidade na tomada de decisão e
        foco em resultado. São determinadas e inovadoras.
    </p>

    <p>
        Por serem muito enérgicas, seus movimentos são rápidos, expansivos e
        firmes. Gostam de correr riscos e de fazer muitas coisas ao mesmo
        tempo.
    </p>

    <p>
        Sua palavra de ordem é <strong>DOMINAR</strong>. Quando essas
        características não são controladas, podem gerar a percepção de uma
        pessoa nervosa, brusca ou agressiva.
    </p>

@elseif($perfilDominante === 'I')
    <h3>Perfil Influente – Padrão I</h3>

    <p>
        Pessoas que apresentam o padrão I têm como características marcantes
        a receptividade, facilidade em se comunicar e se expressar, otimismo
        e extroversão.
    </p>

    <p>
        São espontâneas, entusiastas e tendem a ser populares por onde passam,
        exercendo forte influência sobre os outros.
    </p>

    <p>
        Por serem muito falantes e emocionais, podem deixar de lado a escuta
        ativa e prometer mais do que conseguem cumprir, movidas pelo
        otimismo e pela busca de aprovação social.
    </p>

@elseif($perfilDominante === 'S')
    <h3>Perfil Estável – Padrão S</h3>

    <p>
        Indivíduos com padrão S são calmos, prestativos, pacientes, modestos
        e descontraídos. Sua palavra de ordem é <strong>ALTRUÍSMO</strong>.
    </p>

    <p>
        São leais, confiáveis e excelentes membros de equipe. Possuem grande
        habilidade de ouvir e manter a serenidade, mesmo em situações
        desafiadoras.
    </p>

    <p>
        Evitam mudanças bruscas e decisões impulsivas. Quando não equilibram
        suas características, podem ser percebidos como lentos, indecisos ou
        resistentes a mudanças.
    </p>

@elseif($perfilDominante === 'C')
    <h3>Perfil Cauteloso – Padrão C</h3>

    <p>
        Pessoas com padrão C são precisas, lógicas, analíticas e cuidadosas.
        Gostam de dados, informações e análises detalhadas.
    </p>

    <p>
        São reservadas, focadas em qualidade e prezam por ambientes
        organizados e previsíveis. Sua palavra de ordem é
        <strong>CALCULISTA</strong>.
    </p>

    <p>
        Quando essas características não são bem administradas, podem ser
        vistas como excessivamente perfeccionistas, pessimistas ou críticas.
    </p>
@endif


    <div class="grafico">
        <canvas id="discChart" height="150"></canvas>
    </div>

    <div class="valores">
        <div>D<br>{{ $percentages['D'] }}%</div>
        <div>I<br>{{ $percentages['I'] }}%</div>
        <div>S<br>{{ $percentages['S'] }}%</div>
        <div>C<br>{{ $percentages['C'] }}%</div>
    </div>

</div>

<script>
const ctx = document.getElementById('discChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Dominância (D)', 'Influência (I)', 'Estabilidade (S)', 'Conformidade (C)'],
        datasets: [{
            data: [
                {{ $percentages['D'] }},
                {{ $percentages['I'] }},
                {{ $percentages['S'] }},
                {{ $percentages['C'] }}
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(255, 205, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(54, 162, 235, 0.8)'
            ]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                max: 100
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
});
</script>

</body>
</html>
