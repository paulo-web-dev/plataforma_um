@include('layouts.header-arp')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card shadow-sm">
                    <div class="card-body">
                        
                        {{-- Cabeçalho da Página --}}
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h4 class="card-title mb-0">Informações do Posto de Trabalho</h4>
                                <p class="text-muted small mb-0">Editando: <span class="text-primary font-weight-bold">{{ $subsetor->nome }}</span></p>
                            </div>
                            <a href="{{ route('info-setor-arp', ['id' => $subsetor->id_setor]) }}" class="btn btn-light btn-sm shadow-sm">
                                <i class="mdi mdi-arrow-left me-1"></i> Voltar ao Setor
                            </a>
                        </div>

                        <hr class="mb-4">

                        {{-- Exibição de Erros --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Formulário de Atualização --}}
                        <form class="forms-sample" action="{{ route('upd-subsetor-arp') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- ID oculto para o Update --}}
                            <input type="hidden" name="id" value="{{ $subsetor->id }}">
                            <input type="hidden" name="id_setor" value="{{ $subsetor->id_setor }}">

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="nome"><strong>Nome do Posto de Trabalho</strong></label>
                                        <input type="text" class="form-control form-control-lg" id="nome" name="nome" 
                                               value="{{ $subsetor->nome }}" placeholder="Ex: Linha de Montagem A" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><strong>ID do Registro</strong></label>
                                        <input type="text" class="form-control" value="#{{ $subsetor->id }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="transcricao"><strong>Tarefa Descrita</strong></label>
                                
                                {{-- Botão de Áudio (Recurso do Layout ARP) --}}
                                <div class="mb-2">
                                  
                                   
                                </div>

                                <textarea class="form-control" name="descricao" id="transcricao" rows="12" 
                                          placeholder="Descreva as atividades detalhadamente...">{{ $subsetor->descricao }}</textarea>
                            </div>

                            <div class="form-group mt-3">
                                <label for="transcricao"><strong>Tarefa Real</strong></label>
                                
                                {{-- Botão de Áudio (Recurso do Layout ARP) --}}
                                <div class="mb-2">
                                                                   </div>

                                <textarea class="form-control" name="tarefa_real"  rows="12" 
                                          placeholder="Descreva as atividades detalhadamente...">{{ $subsetor->tarefa_real }}</textarea>
                            </div>

                            <div class="mt-5 border-top pt-4 flex justify-content-between">
                                <button type="submit" class="btn btn-primary btn-lg me-2">
                                    <i class="mdi mdi-content-save me-1"></i> Salvar Alterações
                                </button>
                                <a href="{{ route('info-setor-arp', ['id' => $subsetor->id_setor]) }}" class="btn btn-light">Descartar Mudanças</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        
        {{-- Aqui você pode incluir as tabelas de Moore, Rula, etc, mantendo o estilo --}}
        
    </div>
</div>

@include('layouts.footer-arp')

@push('custom-scripts')
<script>
    const startButton = document.getElementById('startButton');
    const textarea = document.getElementById('transcricao');
    let recognition;
    let isRecording = false;

    // Inicializa com o conteúdo já existente no banco para não perder dados ao ditar
    let transcricoesAnteriores = [textarea.value]; 

    startButton.addEventListener('click', () => {
        if (!('webkitSpeechRecognition' in window)) {
            alert('Seu navegador não suporta a API de reconhecimento de fala.');
            return;
        }

        if (!isRecording) {
            recognition = new webkitSpeechRecognition();
            recognition.continuous = true;
            recognition.interimResults = true;
            recognition.lang = 'pt-BR';

            recognition.onstart = () => {
                isRecording = true;
                startButton.classList.replace('btn-outline-primary', 'btn-danger');
                startButton.innerHTML = '<i class="mdi mdi-stop me-1"></i> Parar Gravação';
            };

            recognition.onresult = (event) => {
                let resultText = '';
                for (let i = event.resultIndex; i < event.results.length; i++) {
                    if (event.results[i].isFinal) {
                        const novaTranscricao = event.results[i][0].transcript.trim();
                        textarea.value += (textarea.value ? ' ' : '') + novaTranscricao;
                    }
                }
            };

            recognition.onerror = (event) => {
                console.error('Erro:', event.error);
                stopRecording();
            };

            recognition.onend = () => { stopRecording(); };
            recognition.start();
        } else {
            recognition.stop();
            stopRecording();
        }
    });

    function stopRecording() {
        isRecording = false;
        startButton.classList.replace('btn-danger', 'btn-outline-primary');
        startButton.innerHTML = '<i class="mdi mdi-microphone me-1"></i> Iniciar Ditado por Voz';
    }
</script>
@endpush