<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação de Perfil Comportamental</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Inter', sans-serif;
            color: #344767;
        }

        .page-header {
            background: linear-gradient(135deg, #0d6efd 0%, #0043a8 100%);
            color: white;
            padding: 60px 0 40px;
            margin-bottom: 40px;
            border-radius: 0 0 30px 30px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .question-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            background: white;
            margin-bottom: 24px;
        }

        .question-number {
            background-color: #e9ecef;
            color: #495057;
            padding: 5px 12px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.9rem;
            margin-bottom: 10px;
            display: inline-block;
        }

        .table-matrix th {
            text-align: center;
            font-size: 0.85rem;
            color: #6c757d;
        }

        .matrix-option {
            display: none;
        }

        .matrix-label {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: 2px solid #dee2e6;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-weight: 600;
            color: #adb5bd;
            transition: all 0.2s;
        }

        .matrix-option:checked + .matrix-label {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
            box-shadow: 0 4px 10px rgba(13, 110, 253, 0.3);
        }

        .val-1:checked + .matrix-label { background-color: #198754; border-color: #198754; }
        .val-4:checked + .matrix-label { background-color: #dc3545; border-color: #dc3545; }

        .sticky-legend {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: #fff;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="page-header text-center">
    <div class="container">
        <h1 class="fw-bold">Análise de Perfil DISC</h1>
        <p class="lead opacity-75">Descubra seu estilo comportamental predominante</p>
    </div>
</div>

<div class="container pb-5">

<form action="{{ route('disc.store') }}" method="POST" id="discForm">
@csrf

<!-- DADOS -->
<div class="card mb-5 border-0 shadow-sm">
    <div class="card-body p-4">
        <h5 class="text-primary mb-4">🏠 Dados do Colaborador</h5>

        <div class="row g-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text"
                           class="form-control"
                           name="nome"
                           id="nome"
                           value=""
                           required>
                    <label for="nome">Nome Completo</label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-floating">
                    <input type="email"
                           class="form-control"
                           name="email"
                           id="email"
                           value=""
                           required>
                    <label for="email">E-mail</label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sticky-legend text-center mb-4">
    <span class="badge bg-success me-2">1</span> MAIS me descreve
    <span class="mx-3 text-muted">|</span>
    <span class="badge bg-danger me-2">4</span> MENOS me descreve
</div>

<!-- PERGUNTAS -->
@foreach($perguntas as $pergunta)
<div class="question-card p-4">

    <div class="question-number">Questão {{ $pergunta->numero }}</div>

    <div class="table-responsive">
        <table class="table table-borderless table-matrix">
            <thead>
            <tr>
                <th class="text-start">Frase</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
            </tr>
            </thead>
            <tbody>

            @foreach($pergunta->alternativas as $index => $alt)
            <tr class="alternativa-row" data-question-id="{{ $pergunta->id }}">
                <td class="text-start">{{ $alt->texto }}</td>

                @for($i = 1; $i <= 4; $i++)
                <td class="text-center">
                    <input type="radio"
                           class="matrix-option val-{{ $i }}"
                           name="respostas[{{ $pergunta->id }}][{{ $alt->id }}]"
                           id="p{{ $pergunta->id }}_a{{ $alt->id }}_v{{ $i }}"
                           value="{{ $i }}"
                          
                           required>

                    <label for="p{{ $pergunta->id }}_a{{ $alt->id }}_v{{ $i }}"
                           class="matrix-label">{{ $i }}</label>
                </td>
                @endfor
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

</div>
@endforeach

<div class="d-grid col-md-6 mx-auto mt-5">
    <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold">
        📊 Processar Resultado
    </button>
</div>

</form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.matrix-option').forEach(radio => {
        radio.addEventListener('change', function () {

            const row = this.closest('.alternativa-row');
            const questionId = row.dataset.questionId;
            const value = this.value;

            document
                .querySelectorAll(`[name^="respostas[${questionId}]"]`)
                .forEach(other => {
                    if (other !== this && other.value === value) {
                        other.checked = false;
                    }
                });
        });
    });

});
</script>

</body>
</html>
