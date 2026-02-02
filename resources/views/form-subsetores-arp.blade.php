@include('layouts.header-arp')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        
                        {{-- Cabeçalho --}}
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Cadastro de Posto de Trabalho</h4>
                            <a href="{{ route('info-setor-arp', ['id' => $idsetor]) }}" class="btn btn-light btn-sm">
                                <i class="mdi mdi-arrow-left me-1"></i> Voltar
                            </a>
                        </div>

                        <p class="card-description"> Vincule um novo posto de trabalho ao setor </p>

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

                        {{-- Formulário --}}
                        <form class="forms-sample" action="{{ route('cad-subsetor-arp') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_setor" value="{{$idsetor}}">

                            <div class="form-group">
                                <label for="nome"><strong>Posto de Trabalho</strong></label>
                                <input type="text" class="form-control" id="nome" name="nome" 
                                       placeholder="Nome do Posto de Trabalho" required>
                            </div>

                            <div class="form-group">
                                <label for="transcricao"><strong>Tarefa prescrita</strong></label>
                                <div class="mb-2">
                                    {{-- <button type="button" id="startButton" class="btn btn-outline-secondary btn-icon-text btn-sm">
                                        <i class="mdi mdi-microphone me-1"></i> Gravar/Pausar Áudio
                                    </button> --}}
                                </div>
                                <textarea class="form-control" name="descricao" id="transcricao" rows="10" placeholder="Descreva as atividades "></textarea>
                            </div>

                            
                            <div class="form-group">
                                <label for="transcricao"><strong>Tarefa Real</strong></label>
                                <div class="mb-2">
                                    {{-- <button type="button" id="startButton" class="btn btn-outline-secondary btn-icon-text btn-sm">
                                        <i class="mdi mdi-microphone me-1"></i> Gravar/Pausar Áudio
                                    </button> --}}
                                </div>
                                <textarea class="form-control" name="tarefa_real" rows="10" placeholder="Descreva as atividades "></textarea>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary me-2">Cadastrar Posto de Trabalho</button>
                                <a href="{{ route('info-setor', ['id' => $idsetor]) }}" class="btn btn-light">Cancelar</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer-arp')

{{-- Scripts --}}
@push('custom-scripts')
<script>
    const startButton = document.getElementById('startButton');
    const textarea = document.getElementById('transcricao');
    let recognition;
    let transcricoesAnteriores = [];
    let isRecording = false;

    startButton.addEventListener('click', () => {
        if (!('webkitSpeechRecognition' in window)) {
            alert('Seu navegador não suporta a API de reconhecimento de fala. Tente usar o Google Chrome.');
            return;
        }

        if (!isRecording) {
            recognition = new webkitSpeechRecognition();
            recognition.continuous = true;
            recognition.interimResults = true;
            recognition.lang = 'pt-BR';

            recognition.onstart = () => {
                isRecording = true;
                startButton.classList.replace('btn-outline-secondary', 'btn-danger');
                startButton.innerHTML = '<i class="mdi mdi-stop me-1"></i> Parar Gravação';
                console.log('Transcrição iniciada');
            };

            recognition.onresult = (event) => {
                let transcript = '';
                for (let i = event.resultIndex; i < event.results.length; i++) {
                    if (event.results[i].isFinal) {
                        const novaTranscricao = event.results[i][0].transcript.trim();
                        if (!transcricoesAnteriores.includes(novaTranscricao)) {
                            transcricoesAnteriores.push(novaTranscricao);
                        }
                    }
                }
                textarea.value = transcricoesAnteriores.join(' ');
            };

            recognition.onerror = (event) => {
                console.error('Erro ao transcrever:', event.error);
                stopRecording();
            };

            recognition.onend = () => {
                stopRecording();
            };

            recognition.start();
        } else {
            recognition.stop();
            stopRecording();
        }
    });

    function stopRecording() {
        isRecording = false;
        startButton.classList.replace('btn-danger', 'btn-outline-secondary');
        startButton.innerHTML = '<i class="mdi mdi-microphone me-1"></i> Gravar/Pausar Áudio';
    }
</script>
@endpush