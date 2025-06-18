<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com Opções de Rádio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --laranja-claro: #FFB347;
            --laranja-medio: #F48C06;
            --laranja-escuro: #E57A00;
            --fundo-claro: #FFF3E0;
            --texto-escuro: #333333;
        }

        body {
            background-color: var(--fundo-claro);
            color: var(--texto-escuro);
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-check-input:checked {
            background-color: var(--laranja-medio);
            border-color: var(--laranja-medio);
        }

        .btn-primary {
            background-color: var(--laranja-medio);
            border-color: var(--laranja-medio);
        }

        .btn-primary:hover {
            background-color: var(--laranja-escuro);
            border-color: var(--laranja-escuro);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">QUESTIONÁRIO ERGONÔMICO - {{$empresa->nome}}
            </h2>
            <p>No Questionário abaixo, você encontrará uma série de questões referentes às situações relacionadas ao trabalho. Para responder selecione uma das respostas que melhor represente sua opinião. <br>

                Este formulário tem como objetivo identificar e avaliar os riscos psicossociais relacionados ao ambiente de trabalho, com o intuito de subsidiar ações voltadas à promoção da saúde ocupacional e à melhoria do desempenho dos colaboradores.<br>
                
                
                As informações fornecidas serão tratadas com total sigilo e utilizadas exclusivamente para fins diagnósticos. A empresa receberá apenas um relatório consolidado contendo as análises e recomendações de melhoria, sem identificação individual dos participantes.</p>
                <form method="POST" action="{{route('cad-form-arp')}}">
                    @csrf   
                    
                <input type="hidden" name="empresa" value="{{$empresa->id}}">   
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome completo" required>
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Seu email" required>
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="departamento" class="form-label">A qual setor e/ou departamento você pertence?</label>
                    <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Departamento" required>
                    <div class="invalid-feedback">
                        
                    </div>
                </div>

                <div class="mb-3">
                    <label for="funcao" class="form-label">Qual sua função?</label>
                    <input type="text" class="form-control" id="funcao" name="funcao" placeholder="Função" required>
                    <div class="invalid-feedback">
                       
                    </div>
                </div>
      
            
                @foreach ($perguntas as $pergunta)
                    <div class="mb-3">
                        <p class="font-weight-bold">
                            {{ $loop->iteration }} - {{ $pergunta->pergunta }}
                        </p>
            
                        @foreach ($pergunta->respostas as $resposta)
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="radio" 
                                       name="respostas[{{ $pergunta->id }}]" 
                                       id="resposta_{{ $pergunta->id }}_{{ $resposta->id }}" 
                                       value="{{ $resposta->id }}">
            
                                <label class="form-check-label" 
                                       for="resposta_{{ $pergunta->id }}_{{ $resposta->id }}">
                                    {{ $resposta->resposta }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            
                <button type="submit" class="btn btn-primary">Enviar Respostas</button>
            </form>
            
        </div>
    </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>