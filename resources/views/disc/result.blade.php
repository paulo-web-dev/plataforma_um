<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado DISC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-white">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1>Resultado do Perfil DISC</h1>
            <h3 class="text-muted">{{ $funcionario->nome }} - {{ $perfilDominante }}</h3>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <canvas id="discChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 text-center">
            <div class="col-3">
                <h2 class="text-danger">{{ $percentages['D'] }}%</h2>
                <strong>Dominância</strong>
            </div>
            <div class="col-3">
                <h2 class="text-warning">{{ $percentages['I'] }}%</h2>
                <strong>Influência</strong>
            </div>
            <div class="col-3">
                <h2 class="text-success">{{ $percentages['S'] }}%</h2>
                <strong>Estabilidade</strong>
            </div>
            <div class="col-3">
                <h2 class="text-info">{{ $percentages['C'] }}%</h2>
                <strong>Conformidade</strong>
            </div>
        </div>

        <div class="row mt-5 justify-content-center">
            <div class="col-md-8 text-center">
                <hr class="my-4">
                <p class="lead text-secondary">
                    Obrigado por preencher o teste de perfil comportamental!
                </p>
                <p>
                    Recebemos suas respostas com sucesso. Fique atento, pois <strong>logo alguém de nossa equipe entrará em contato</strong> para apresentar e discutir o seu relatório detalhado.
                </p>
            </div>
        </div>
        
        {{-- <div class="text-center mt-4">
            <a href="{{ route('disc.resultDocumento', ['id' => $id]) }}" class="btn btn-outline-primary">Imprimir Resultado</a>
        </div> --}}
    </div>

    <script>
        const ctx = document.getElementById('discChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Dominância (D)', 'Influência (I)', 'Estabilidade (S)', 'Conformidade (C)'],
                datasets: [{
                    label: 'Percentual (%)',
                    data: [{{ $percentages['D'] }}, {{ $percentages['I'] }}, {{ $percentages['S'] }}, {{ $percentages['C'] }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)', // Vermelho D
                        'rgba(255, 205, 86, 0.8)', // Amarelo I
                        'rgba(75, 192, 192, 0.8)', // Verde S
                        'rgba(54, 162, 235, 0.8)'  // Azul C
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
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