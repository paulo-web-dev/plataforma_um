@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Cadastro de Recomendações Técnicas
            </h2>
             <a href="{{ route('info-subsetor',  ['id' => $id_subsetor]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

     <form action="{{ route('cad-recomendacao') }}" enctype="multipart/form-data" method="post" id="dynamic-form">
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
                <div class="mt-3" id="link">
                
                    <label for="update-profile-form-7" class="form-label"><strong>Recomendação</strong></label>
                   <select  class="tom-select w-full" id="post-form-3"  name="recomendacao[]" id="conclusao">
                    @foreach ($recomendacoes as $recomendacao )
                        <option>{{$recomendacao->recomendacao_limpa}}</option>
                    @endforeach
                    </select>
                    {{-- <input type="text" class="form-control editor" name="recomendacao[]" placeholder="Recomendação" required>  --}}
                      <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                         <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                       </span>

                        <span class="input-group-append close-icon close-button" onclick="changeSelect(this)" style="margin-left: 30px;">
                         <i data-feather="type" class="w-4 h-4 mr-2"></i>
                       </span> <br>
                </div>
                <div id="dynamic-fields"></div>

                <div class="flex justify-end mt-4">
                    <button type="button" class="btn btn-primary w-40" style="margin:5px" onclick="addRecommendationField()">Adicionar Mais Recomendações</button>
                    <button type="submit" class="btn btn-primary w-40 mr-auto" style="margin:5px">Cadastrar Recomendação(s)</button>
                </div>
            </div>
        </div>
    </div>
</form>
    </div>
    <!-- END: Personal Information -->
    <!-- END: Users Layout -->
    </div>
@endsection
<script>
function addRecommendationField() {
    const inputField = document.createElement('div');
    inputField.innerHTML = `
                <div class="mt-3" id="link">
            <label for="update-profile-form-7" class="form-label"><strong>Recomendação</strong></label>
            <input type="text" class="form-control editor" name="recomendacao[]" placeholder="Recomendação" required> 
            <span class="input-group-append close-icon close-button" onclick="removeInput(this)">
                <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
            </span>

              <span class="input-group-append close-icon close-button" onclick="changeType(this)" style="margin-left: 30px">
                         <i data-feather="type" class="w-4 h-4 mr-2"></i>
                       </span>
        </div>
    `;
    document.getElementById('dynamic-fields').appendChild(inputField);
    // Atualize os ícones de remoção para todos os campos
    feather.replace();
}

function changeSelect(element) {
    const inputField = document.createElement('div');
     element.parentNode.innerHTML = `
             <div class="mt-3" id="link">
            <label for="update-profile-form-7" class="form-label"><strong>Recomendação</strong></label>
            <input type="text" class="form-control editor" name="recomendacao[]" placeholder="Recomendação" required> 
            <span class="input-group-append close-icon close-button" onclick="removeInput(this)">
                <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
            </span>

              <span class="input-group-append close-icon close-button" onclick="changeType(this)" style="margin-left: 30px">
                         <i data-feather="list" class="w-4 h-4 mr-2"></i>
                       </span>
        </div>
    `;
//   element.parentNode.appendChild(inputField);
    // Atualize os ícones de remoção para todos os campos
    feather.replace();
}

function changeType(element) {
    const inputField = document.createElement('div');
     element.parentNode.innerHTML = `
        <div class="mt-3" id="link">
           <label for="update-profile-form-7" class="form-label"><strong>Recomendação</strong></label>
                   <select  class="tom-select w-full" id="post-form-3"  name="recomendacao[]" id="conclusao">
                    @foreach ($recomendacoes as $recomendacao )
                        <option>{{$recomendacao->recomendacao_limpa}}</option>
                    @endforeach
                    </select>
                    {{-- <input type="text" class="form-control editor" name="recomendacao[]" placeholder="Recomendação" required>  --}}
                      <span class="input-group-append close-icon close-button" onclick="removeInput(this)" >
                         <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>
                       </span>

                        <span class="input-group-append close-icon close-button" onclick="changeSelect(this)" style="margin-left: 30px;">
                         <i data-feather="type" class="w-4 h-4 mr-2"></i>
                       </span> <br>
                </div>
    `;
//   element.parentNode.appendChild(inputField);
    // Atualize os ícones de remoção para todos os campos
    feather.replace();
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
