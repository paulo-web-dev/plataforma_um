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

        /* Novas classes para o passo a passo */
        .form-step {
            display: none;
            animation: fadeIn 0.4s ease-in-out;
        }

        .form-step.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
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

<div class="form-step card mb-5 border-0 shadow-sm active">
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
<div class="sticky-legend text-center mb-4" id="legendBar" style="display:none; font-size:12px; line-height:1.3;">
    
    <div style="margin-bottom:6px;">
        Ordene as alternativas de “1” a “4” na ordem que melhor descreve o seu comportamento.
        Digite 1 para a alternativa que <strong>MAIS TE DESCREVE</strong>, e digite 4 para a alternativa que 
        <strong>MENOS TE DESCREVE</strong>, continue ordenando as quatro alternativas.
    </div>

    <span class="badge bg-success me-2">1</span> MAIS me descreve
    <span class="mx-3 text-muted">|</span>
    <span class="badge bg-danger me-2">4</span> MENOS me descreve

</div>

@foreach($perguntas as $pergunta)
<div class="form-step question-card p-4">

    <div class="question-number">Questão {{ $pergunta->numero }} de {{ count($perguntas) }}</div>
<span><b>{{$pergunta->frase}}</b></span>
    <div class="table-responsive">
        <table class="table table-borderless table-matrix">
            <thead>
            
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

<div class="d-flex justify-content-between mt-4 col-md-8 mx-auto">
    <button type="button" class="btn btn-outline-secondary px-4 fw-bold" id="btnPrev" style="display: none;">
        ⬅ Anterior
    </button>
    
    <button type="button" class="btn btn-primary px-5 fw-bold ms-auto" id="btnNext">
        Próximo ➡
    </button>
</div>

<div class="d-grid col-md-6 mx-auto mt-4" id="submitContainer" style="display: none;">
    <button type="submit" class="btn btn-success btn-lg rounded-pill fw-bold">
        📊 Processar Resultado
    </button>
</div>

</form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // --- LÓGICA DE EXCLUSIVIDADE DAS RESPOSTAS (MATRIZ) ---
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

    // --- LÓGICA DO PASSO A PASSO (WIZARD) ---
    const steps = document.querySelectorAll('.form-step');
    const btnPrev = document.getElementById('btnPrev');
    const btnNext = document.getElementById('btnNext');
    const submitContainer = document.getElementById('submitContainer');
    const legendBar = document.getElementById('legendBar');
    let currentStep = 0;

    function showStep(index) {
        // Mostra apenas o passo ativo
        steps.forEach((step, i) => {
            step.classList.toggle('active', i === index);
        });

        // Controle da barra de legenda (ocultar na tela de dados iniciais)
        if (index === 0) {
            legendBar.style.display = 'none';
        } else {
            legendBar.style.display = 'block';
        }

        // Controle dos botões
        btnPrev.style.display = index === 0 ? 'none' : 'block';

        if (index === steps.length - 1) {
            // Último passo
            btnNext.style.display = 'none';
            submitContainer.style.display = 'block';
        } else {
            // Passos intermediários
            btnNext.style.display = 'block';
            submitContainer.style.display = 'none';
        }
        
        // Rola a tela suavemente para o topo do form para a pessoa ler a pergunta
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function validateCurrentStep() {
        const currentStepEl = steps[currentStep];
        // Pega todos os inputs obrigatórios do passo atual
        const inputs = currentStepEl.querySelectorAll('input[required]');
        let isValid = true;

        inputs.forEach(input => {
            if (!input.checkValidity()) {
                input.reportValidity(); // Mostra a mensagem nativa do navegador ("Preencha este campo")
                isValid = false;
            }
        });

        return isValid;
    }

    btnNext.addEventListener('click', () => {
        // Valida se o usuário preencheu o que era obrigatório antes de passar
        if (validateCurrentStep()) {
            currentStep++;
            showStep(currentStep);
        }
    });

    btnPrev.addEventListener('click', () => {
        currentStep--;
        showStep(currentStep);
    });

    // Inicializa mostrando o primeiro passo
    showStep(currentStep);

});
</script>

</body>
</html>