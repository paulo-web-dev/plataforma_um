@extends('layouts.header')

@section('content')

 <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Cadastrar Características da Organização do Trabalho
        </h2>
         <a href="{{ route('info-subsetor',  ['id' => $idsubsetor]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
    </div>
    
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Profile Menu -->

        {{-- <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5 lg:mt-0">
                <div class="p-5 border-t nav-tab border-gray-200 dark:border-dark-5">
                    <a id="informacoes-pessoais-tab" data-toggle="tab" data-target="#informacoes-pessoais" href="javascript:;"
                        role="tab" class="flex items-center">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Informações Pessoais </a>
                </div>
            </div>
        </div> --}}
        <!-- END: Profile Menu -->

        <div class="col-span-12 lg:col-span-12 xxl:col-span-12 tab-content">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">
                    <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i data-feather="x" class="w-4 h-4"></i>
                    </button>
                </div>
            @endforeach
            <form action="{{route('cad-dadosorganizacionais')}}" method="post" enctype="multipart/form-data" data-single="true"
                method="post">
                @csrf
                <input type="hidden" value="{{$idsubsetor}}" name="id_subsetor">
                <div id="informacoes-pessoais" role="tabpanel" aria-labelledby="informacoes-pessoais-tab"
                    class="grid grid-cols-12 gap-6 tab-pane active">
                    <!-- BEGIN: Products -->
                   
                    <div class="intro-y box col-span-12 xxl:col-span-12 p-5">
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="nome" class="form-label"><strong>Dado:</strong></label>
                                     <input id="num_funcionarios" type="text" name="dado[]" class="form-control"
                                        placeholder="Número de Funcionários" value="Número de Funcionários:" required>
                                        <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                        </span>
                                       
                                </div>
                                <div class="mt-3">
                                    <label for="nome" class="form-label"><strong>Dado:</strong></label>
                                    <input id="num_funcionarios" type="text" name="dado[]" class="form-control"
                                        placeholder="Dado Organizacional" value="Jornada de Trabalho:" required>
                                        <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                        </span>
                                </div>
                                   <div class="mt-3">
                                    <label for="nome" class="form-label"><strong>Dado:</strong></label>
                                    <input id="num_funcionarios" type="text" name="dado[]" class="form-control"
                                        placeholder="Dado Organizacional" value="Carga Horária:" required>
                                        <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                        </span>
                                </div>
                                <div class="mt-3">
                                    <label for="nome" class="form-label"><strong>Dado:</strong></label>
                                    <input id="num_funcionarios" type="text" name="dado[]" class="form-control"
                                        placeholder="Dado Organizacional" value="Diversificação de Tarefas:" required>
                                        <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                        </span>
                                </div>
                                <div class="mt-3">
                                    <label for="nome" class="form-label"><strong>Dado:</strong></label>
                                    <input id="num_funcionarios" type="text" name="dado[]" class="form-control"
                                        placeholder="Dado Organizacional" value="Rodízio de Atividades:" required>
                                        <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                        </span>
                                </div>
                                <div class="mt-3">
                                    <label for="nome" class="form-label"><strong>Dado:</strong></label>
                                    <input id="num_funcionarios" type="text" name="dado[]" class="form-control"
                                        placeholder="Dado Organizacional" value="Ritimo de Trabalho:" required>
                                        <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                        </span>
                                </div>
                                <div class="mt-3">
                                    <label for="nome" class="form-label"><strong>Dado:</strong></label>
                                    <input id="num_funcionarios" type="text" name="dado[]" class="form-control"
                                        placeholder="Dado Organizacional" value="Movimentação Repetitiva:" required>
                                        <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                        </span>
                                </div>
                                <div class="mt-3">
                                    <label for="nome" class="form-label"><strong>Dado:</strong></label>
                                    <input id="num_funcionarios" type="text" name="dado[]" class="form-control"
                                        placeholder="Dado Organizacional" value="Ciclo de Trabalho:" required>
                                        <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                        </span>
                                </div>

                                <div class="mt-3">
                                    <label for="nome" class="form-label"><strong>Dado:</strong></label>
                                    <input id="num_funcionarios" type="text" name="dado[]" class="form-control"
                                        placeholder="Dado Organizacional" value="Movimentação de Cargas:" required>
                                        <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                        </span>
                                </div>

                                <div class="mt-3">
                                    <label for="nome" class="form-label"><strong>Dado:</strong></label>
                                    <input id="num_funcionarios" type="text" name="dado[]" class="form-control"
                                        placeholder="Dado Organizacional" value="Metas:" required>
                                        <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                        </span>
                                </div>

                                 <div class="mt-3">
                                    <label for="nome" class="form-label"><strong>Dado:</strong></label>
                                    <input id="num_funcionarios" type="text" name="dado[]" class="form-control"
                                        placeholder="Dado Organizacional" value="Produtividade:" required>
                                        <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                        </span>
                                </div>

                                
                                 <div class="mt-3">
                                    <label for="nome" class="form-label"><strong>Dado:</strong></label>
                                    <input id="num_funcionarios" type="text" name="dado[]" class="form-control"
                                        placeholder="Dado Organizacional" value="Dados de Produção:" required>
                                        <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                        </span>
                                </div>
                             
                                <div id="dynamic-fields"></div>
                               
                                
                            </div>
                        </div>
                        </div>

                        

                        <div class="intro-y box col-span-12 xxl:col-span-12">
                        <button type="button" class="btn btn-primary w-40" style="margin:5px" onclick="addDados()">Adicionar Mais Características da Organização do Trabalho</button>
                            <button type="submit" class="btn btn-primary w-full  mr-2 mb-2"> <i data-feather="activity"
                                    class="w-4 h-4 mr-2"></i>
                                Adicionar Características da Organização do Trabalho </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
<script>
function removeInput(element) {
    // Encontre o elemento pai do ícone de fechar
    var inputContainer = element.parentNode;
    // Remova o elemento pai, que contém o input e o ícone de fechar
    inputContainer.parentNode.removeChild(inputContainer);
}
    function addDados() {
        const inputField = document.createElement('div');
        inputField.innerHTML = `
            <div class="mt-3">
                <label for="nome" class="form-label"><strong>Dado:</strong></label>
                <input id="num_funcionarios" type="text" name="dado[]" class="form-control" placeholder="Dado Organizaciona" required>
                                        <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                        </span>
            </div>
        `;
        document.getElementById('dynamic-fields').appendChild(inputField);
        feather.replace();
    }

    
</script>
@push('custom-scripts')
    
   
         <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>  <!--Script do iconify-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
     
        
        <!-- END: JS Assets-->
    </body>
</html>

@push('custom-scripts')





@endpush
