@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Cadastro de Caracteristicas do Ambiente de Trabalho
            </h2>
        </div>

        <form action="{{ route('cad-caracteristicas') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="id_subsetor" value="{{$id_subsetor}}">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Titulo</strong></label>
                            <input id="update-profile-form-7" type="text" name="titulo[]" class="form-control"
                                placeholder="Titulo da Caracteristica" value="Postura de Trabalho:" required>
                                <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                </span>
                               
                        </div>
                   
                         <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong>Descrição da Caracteristica</strong></label>
                            <textarea class="form-control editor" name="descricao[]" id="descricao" cols="30" rows="15"></textarea>
                             <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                </span>
                        
                        </div>

                         <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Titulo</strong></label>
                            <input id="update-profile-form-7" type="text" name="titulo[]" class="form-control"
                                placeholder="Titulo da Caracteristica" value="Descrição do Posto de Trabalho:" required>
                                <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                </span>
                                
                        </div>
                   
                         <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong>Descrição da Caracteristica</strong></label>
                            <textarea class="form-control editor" name="descricao[]" id="descricao" cols="30" rows="15"></textarea>
                             <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                </span>
                        </div>

                         <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Titulo</strong></label>
                            <input id="update-profile-form-7" type="text" name="titulo[]" class="form-control"
                                placeholder="Titulo da Caracteristica" value="Medidas da Bancada de Trabalho:" required>
                                <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                </span>
                                
                        </div>
                   
                         <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong>Descrição da Caracteristica</strong></label>
                            <textarea class="form-control editor" name="descricao[]" id="descricao" cols="30" rows="15"></textarea>
                             <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                </span>
                        </div>
                        
                         <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Titulo</strong></label>
                            <input id="update-profile-form-7" type="text" name="titulo[]" class="form-control"
                                placeholder="Titulo da Caracteristica" value="Descrição dos Equipamentos/Ferramentas de Trabalho:" required>
                                <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                </span>
                                
                        </div>
                   
                         <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong>Descrição da Caracteristica</strong></label>
                            <textarea class="form-control editor" name="descricao[]" id="descricao" cols="30" rows="15"></textarea>
                             <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                </span>
                        </div>

                        
                         <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Titulo</strong></label>
                            <input id="update-profile-form-7" type="text" name="titulo[]" class="form-control"
                                placeholder="Titulo da Caracteristica" value="Descrição dos Equipamentos de Segurança:" required>
                                <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                </span>
                                
                        </div>
                   
                         <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong>Descrição da Caracteristica</strong></label>
                            <textarea class="form-control editor" name="descricao[]" id="descricao" cols="30" rows="15"></textarea>
                             <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                </span>
                        </div>
                        <div id="dynamic-fields"></div>
                    
                <div class="flex justify-end mt-4">
                 <button type="button" class="btn btn-primary w-40" style="margin:5px" onclick="addCaracteristicas()">Adicionar Mais Características</button>
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Cadastrar Caracteristica</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END: Personal Information -->
    <!-- END: Users Layout -->
    </div>
@endsection
<script>
    function addCaracteristicas() {
        const inputField = document.createElement('div');
        inputField.innerHTML = `
                     <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Titulo</strong></label>
                            <input id="update-profile-form-7" type="text" name="titulo[]" class="form-control"
                                placeholder="Titulo da Caracteristica" value="" required>
                                <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                </span>
                        </div>
                   
                         <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong>Descrição da Caracteristica</strong></label>
                            <textarea class="form-control editor" name="descricao[]" id="descricao" cols="30" rows="15"></textarea>
                             <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                                            <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                                </span>
                        </div>
                    
        `;
        document.getElementById('dynamic-fields').appendChild(inputField);
    }

    function removeInput(element) {
    // Encontre o elemento pai do ícone de fechar
    var inputContainer = element.parentNode;
    // Remova o elemento pai, que contém o input e o ícone de fechar
    inputContainer.parentNode.removeChild(inputContainer);
}
</script>
@push('custom-scripts')





@endpush
