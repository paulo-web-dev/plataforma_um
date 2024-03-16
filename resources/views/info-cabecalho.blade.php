@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Informação Fotos  de Cabeçalho
            </h2>
              <a href="{{ route('infoempresa',  ['id' => $cabecalho->id_empresa]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('upd-cabecalho') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="id" value="{{$cabecalho->id}}">
                  
                        <div class="col-span-12 xl:col-span-6" id="cabecalho">
                    <label class="form-label"><strong>Atualizar de Imagem/Logo da Empresa Analisada</strong></label>
                    <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">
                        <div class="px-4 pt-24 pb-24 flex items-center justify-center cursor-pointer relative">
                            <div id="areaArquivo">
                                <i data-feather="image" class="w-4 h-4 mr-2"></i>
                                <span class="mr-1 font-bold">Atualizar Imagem</span>
                            </div>
                            <input type="file" id="foto_empresa" name="foto_empresa"
                                class="w-full h-full top-0 left-0 absolute opacity-0" onchange="previewImage(this, 'preview_empresa')"> 
                        </div>
                    </div>
                    <div id="preview_empresa" class="mt-4"><img src="/fotos-empresa-cabecalho/{{$cabecalho->foto_empresa}}"></div>
                </div>

                <div class="col-span-12 xl:col-span-6" id="cabecalho">
                    <label class="form-label"><strong>Atualizar de Imagem/Logo da Empresa Que Fez a Ánalise</strong></label>
                    <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">
                        <div class="px-4 pt-24 pb-24 flex items-center justify-center cursor-pointer relative">
                            <div id="areaArquivo">
                                <i data-feather="image" class="w-4 h-4 mr-2"></i>
                                <span class="mr-1 font-bold">Atualizar Imagem</span>
                            </div>
                            <input type="file" id="foto_produtor" name="foto_produtor"
                                class="w-full h-full top-0 left-0 absolute opacity-0" onchange="previewImage(this, 'preview_produtor')"> 
                        </div>
                    </div>
                    <div id="preview_produtor" class="mt-4"><img src="/fotos-empresa-produtor/{{$cabecalho->foto_produtor}}"></div>
                </div>


                                    
              
                    <button type="submit" class="btn btn-primary w-40 mr-auto" style="margin-top:10px">Atualizar Fotos de Cabeçalho</button>
              
            </div>
        </form>
    </div>
    <!-- END: Personal Information -->
    <!-- END: Users Layout -->
    </div>
    
<script>
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        while (preview.firstChild) {
            preview.removeChild(preview.firstChild);
        }
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.className = "max-w-full h-auto";
                preview.appendChild(img);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection

@push('custom-scripts')





@endpush
