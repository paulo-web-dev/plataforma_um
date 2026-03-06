<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa Concluída</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-body p-5 text-center">
                    <div class="mb-4">
                        <div class="display-1 text-success">✓</div>
                    </div>
                    
                    <h1 class="fw-bold mb-3">Muito Obrigado!</h1>
                    
                    <p class="lead text-muted mb-4">
                        Sua participação na pesquisa de perfil <strong>DISC</strong> foi registrada com sucesso, 
                        <span class="text-dark">{{ $funcionario->nome }}</span>.
                    </p>
                    
                    <hr class="my-4">
                    
                    <p class="small text-secondary">
                        Suas respostas são fundamentais para o nosso processo de desenvolvimento interno. 
                        A equipe de RH entrará em contato caso seja necessário.
                    </p>

                    <div class="mt-4">
                        <a href="/" class="btn btn-primary px-4 py-2">Voltar ao Início</a>
                    </div>
                </div>
            </div>
            <p class="text-center mt-4 text-muted small">&copy; {{ date('Y') }} - Departamento de Recursos Humanos</p>
        </div>
    </div>
</body>
</html>