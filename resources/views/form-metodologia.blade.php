@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Cadastro de Metodologia
            </h2>
        <a href="{{ route('infoempresa',  ['id' => $id_empresa]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('cad-metodologia') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="id_empresa" value="{{$id_empresa}}">
                    <div class="col-span-12 xl:col-span-6">
                     
                   
              <div class="mt-6">
        <label for="conteudo" class="form-label">Metodologia</label>
        <div class="mt-2">
            <textarea class="form-control editor" name="metodologia" id="editor" cols="30" rows="15"><p>Este estudo foi realizado através de coleta de dados por meio de avaliações e observações dos postos de trabalho existentes na empresa, em dias normais de atividade, onde o colaborador exercia suas funções ao longo da jornada de trabalho, com a finalidade de atender a legislação vigente e melhorar a qualidade de vida dos colaboradores.</p><p><strong>MÉTODOS UTILIZADOS:</strong></p><p>OBSERVAÇÕES IN LOCO E FOTOS – ANÁLISE DA ATIVIDADE</p><p>A fim de se obter informações complementares e a confirmação dos dados obtidos até o momento registrados, foi realizada a observação dos trabalhadores em seus próprios postos de trabalho, de forma aleatória e durante um dia normal de trabalho. Foram observados os modos operatórios, o conteúdo das tarefas, o ritmo de trabalho, as exigências cognitivas.<br><br>MODO OPERATÓRIO – Observa neste item quais movimentos são realizados para completar o ciclo do trabalho (no início, meio e no fim da tarefa). Como na empresa existem tarefas diversificadas fizemos uma análise por setor e por atividade.<br><br><strong>CONTEÚDO DAS TAREFAS</strong> – Designa o modo como o trabalhador percebe as condições de seu trabalho: estimulante, monótono, aquém de suas capacidades, socialmente importante e outros. Na empresa alguns consideraram o trabalho monótono principalmente os que geram repetitividade, com grau leve de dificuldade e boa colaboração entre os funcionários.<br><br><strong>RITMO DE TRABALHO</strong> – Existe uma distinção entre ritmo e cadência. A cadência tem um aspecto quantitativo, o ritmo qualitativo. A cadência refere-se à velocidade dos movimentos quase repete em uma dada unidade de tempo, o ritmo é a maneira como as cadências são ajustadas ou arranjadas: pode ser livre (quando o indivíduo tem autonomia para determinar sua própria cadência) ou imposto (por uma máquina, pela esteira da linha de montagem e até por incentivos à Operação) - Teiger, 1985. Na empresa encontramos: o trabalho livre.<br><br><strong>EXIGÊNCIAS COGNITIVAS</strong> – Detectamos que quanto ao conhecimento, à percepção para a realização das atividades, a maioria dos colaboradores tinha um bom preparo para a efetivação do trabalho</p></textarea>
        </div>
    </div>

                    
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Cadastrar Metodologia</button>
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
