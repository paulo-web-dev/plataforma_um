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
                    <input type="text" class="form-control editor" name="recomendacao[]" placeholder="Recomendação" required>
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
            <div class="mt-3">
                <label for="update-profile-form-7" class="form-label"><strong>Recomendação</strong></label>
                <input type="text" class="form-control editor" name="recomendacao[]" placeholder="Recomendação" required>
            </div>
        `;
        document.getElementById('dynamic-fields').appendChild(inputField);
    }
</script>
@push('custom-scripts')





@endpush
