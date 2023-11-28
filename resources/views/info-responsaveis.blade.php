@extends('layouts.header')

@section('content')
 <script src="https://cdn.jsdelivr.net/npm/signature_pad@1.5.3"></script>
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Atualização Responsáveis Pela Elaboração
            </h2>
        <a href="{{ route('infoempresa',  ['id' => $responsavel->id_empresa]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('upd-responsaveis') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="id" value="{{$responsavel->id}}">
                    <div class="col-span-12 xl:col-span-6">

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Nome</strong></label>
                            <input id="update-profile-form-7" type="text" name="nome" class="form-control"
                                placeholder="Nome" value="{{$responsavel->nome}}">
                        </div>

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Cargo</strong></label>
                            <input id="update-profile-form-7" type="text" name="cargo" class="form-control"
                                placeholder="Cargo" value="{{$responsavel->cargo}}">
                        </div>

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Identidade de Trabalho</strong></label>
                            <input id="update-profile-form-7" type="text" name="identidade_trabalho" class="form-control"
                                placeholder="Identidade de Trabalho. EX: CREFITO 3/131278 F" value="{{$responsavel->identidade_trabalho}}">
                        </div>
                        @if (isset($responsavel->foto))
                        <div class="mt-3">
                           <img src="/fotos-assinaturas/{{$responsavel->foto}}">
                        </div>
                        @endif
                       
                        <div class="mt-3">
    <!-- ... Seu HTML existente ... -->

<!-- Campo de assinatura -->
<canvas id="signatureCanvas" width="400" height="200" style="border: 1px solid #000;"></canvas>

<!-- Botão para salvar a assinatura como imagem -->
<button onclick="saveSignature()">Atualizar Assinatura e Responsável</button>

<!-- Input oculto para armazenar a imagem da assinatura -->
<input type="hidden" id="signatureImage" name="signatureImage">

<script>
    // Inicialize o SignaturePad
    var canvas = document.getElementById('signatureCanvas');
    var signaturePad = new SignaturePad(canvas);

    // Função para salvar a assinatura como imagem
    function saveSignature() {
        if (signaturePad.isEmpty()) {
            alert("Assine antes de salvar.");
        } else {
            // Obtenha a imagem da assinatura como base64
            var signatureImage = signaturePad.toDataURL();

            // Atualize o valor do input oculto
            document.getElementById('signatureImage').value = signatureImage;

            // Aqui, você pode enviar a imagem para o servidor ou fazer o que for necessário
            console.log("Assinatura salva:", signatureImage);
        }
    }

    // Adicione este código para incluir o valor da assinatura no formulário ao enviar
    var form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        // Certifique-se de que o valor da assinatura esteja incluído nos dados do formulário
        var signatureImage = document.getElementById('signatureImage').value;
        var signatureInput = document.createElement('input');
        signatureInput.type = 'hidden';
        signatureInput.name = 'signatureImage';
        signatureInput.value = signatureImage;
        form.appendChild(signatureInput);
    });
</script>

<!-- ... Seu HTML existente ... -->

                        </div>
       
                    
                {{-- <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Atualizar Responsável</button>
                </div> --}}
            </div>
        </form>
    </div>
    <!-- END: Personal Information -->
    <!-- END: Users Layout -->
    </div>
@endsection

@push('custom-scripts')





@endpush
