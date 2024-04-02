@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Cadastro de Posto de Trabalho
            </h2>
             <a href="{{ route('info-setor',  ['id' => $idsetor]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('cad-subsetor') }}" enctype="multipart/form-data" data-single="true" method="post">
            <div class="p-5">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">
                        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i data-feather="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                @endforeach

                <div class="grid grid-cols-12 gap-x-5">

                    @csrf
                    <input type="hidden" name="id_setor" value="{{$idsetor}}">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Posto de Trabalho</strong></label>
                            <input id="update-profile-form-7" type="text" name="nome" class="form-control"
                                placeholder="Nome do Posto de Trabalho" value="" required>
                        </div>
                         <div class="mt-6">
                            <label for="conteudo" class="form-label">Descrição da tarefa</label>
                            <div class="mt-2">
                                <textarea class="form-control editor" name="descricao" id="transcricao"  cols="30" rows="15"></textarea>
                            </div>
                        </div>
                        
                     
              {{-- <div class="mt-6">
        <label for="conteudo" class="form-label">Descrição da tarefa</label>
        <div class="mt-2">
            <textarea class="form-control editor" name="descricao" id="editor" cols="30" rows="15"></textarea>
        </div>
    </div> --}}
                         {{-- <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong>Descrição do SubSetor</strong></label>
                            <textarea class="form-control editor" name="descricao" id="descricao" cols="30" rows="15"></textarea>
                        </div>
                     --}}
                <div class="flex justify-end mt-4">
                     <input id="startButton" class="btn btn-primary w-40 mr-auto" value="Gravar/Pausar Áudio">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Cadastrar Posto de Trabalho</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END: Personal Information -->
    <!-- END: Users Layout -->
    </div>
@endsection
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
@push('custom-scripts')

<script>
    const startButton = document.getElementById('startButton');
    const textarea = document.getElementById('transcricao');
    let recognition;
    let transcricoesAnteriores = [];

    startButton.addEventListener('click', () => {
        if (!('webkitSpeechRecognition' in window)) {
            console.error('Seu navegador não suporta a API de reconhecimento de fala');
            return;
        }

        recognition = new webkitSpeechRecognition();
        recognition.continuous = true;
        recognition.interimResults = true;
        recognition.lang = 'pt-BR';

        recognition.onstart = () => {
            console.log('Transcrição iniciada');
        };

        recognition.onresult = (event) => {
            let transcript = '';
            for (let i = event.resultIndex; i < event.results.length; i++) {
                if (event.results[i].isFinal) {
                    const novaTranscricao = event.results[i][0].transcript.trim();
                    if (!transcricoesAnteriores.includes(novaTranscricao)) {
                        transcript += novaTranscricao + ' ';
                        transcricoesAnteriores.push(novaTranscricao);
                    }
                } else {
                    transcript += event.results[i][0].transcript;
                }
            }
            textarea.value = transcript;
        };

        recognition.onerror = (event) => {
            console.error('Erro ao transcrever a fala:', event.error);
          /*  recognition.stop(); */
        };

        recognition.onend = () => {
            console.log('Transcrição finalizada');
           /* recognition.stop();*/
        };

        recognition.start();
    });
</script>
<script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>


@endpush
