<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obrigado pelo seu Contato!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --laranja-claro: #FFB347;
            --laranja-medio: #F48C06;
            --laranja-escuro: #E57A00;
            --fundo-claro: #FFF3E0; /* Fundo mais suave para combinar com os laranjas */
            --texto-escuro: #333333;
            --sucesso-icon: #28A745; /* Um verde sutil para ícone de sucesso, se usado */
        }

        body {
            background-color: var(--fundo-claro);
            color: var(--texto-escuro);
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Ocupa a altura total da viewport */
            margin: 0;
        }

        .thank-you-container {
            max-width: 700px;
            text-align: center;
            padding: 40px;
            background-color: white;
            border-radius: 12px; /* Mantém a borda arredondada do formulário */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); /* Mesma sombra suave */
        }

        .thank-you-container h1 {
            color: var(--laranja-medio);
            font-size: 2.8rem; /* Tamanho maior para o título principal */
            margin-bottom: 20px;
            font-weight: 700;
        }

        .thank-you-container p {
            font-size: 1.15rem;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .thank-you-container .btn-primary {
            background-color: var(--laranja-medio);
            border-color: var(--laranja-medio);
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 8px; /* Mantém a forma dos botões do formulário */
            transition: background-color 0.3s ease-in-out, border-color 0.3s ease-in-out, transform 0.2s ease;
        }

        .thank-you-container .btn-primary:hover {
            background-color: var(--laranja-escuro);
            border-color: var(--laranja-escuro);
            transform: translateY(-2px);
        }

        .thank-you-container .icon-check {
            font-size: 4rem; /* Tamanho do ícone */
            color: var(--laranja-medio); /* Cor do ícone combinando com a paleta */
            margin-bottom: 20px;
            display: inline-block;
            animation: bounceIn 0.8s ease-out; /* Animação para o ícone */
        }

        /* Animação simples de "bounce" para o ícone */
        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }
            50% {
                opacity: 1;
                transform: scale(1.05);
            }
            70% {
                transform: scale(0.9);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body><center>
    <div class="container">
        <div class="thank-you-container">
            <i class="fas fa-check-circle icon-check"></i>

            <h1>Muito Obrigado!</h1>
            <p>Seu formulário foi enviado com sucesso. Agradecemos imensamente o seu tempo e a sua contribuição.</p>
            <p>Entraremos em contato em breve, se necessário.</p>
        
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>