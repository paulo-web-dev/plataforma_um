@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Cadastro de Disposição Final
            </h2>
        </div>

        <form action="{{ route('cad-disposicao') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                     
                   
                         <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong>Disposição FInal</strong></label>
                            <textarea class="form-control editor" name="disposicao" id="disposicao" cols="30" rows="15">
As considerações técnicas descritas nesta Análise Ergonômica do Trabalho
retratam a situação do momento em que foram feitas as etapas de
reconhecimento dos riscos ergonômicos.
As etapas posteriores a serem realizadas devem ser juntadas a esta análise
ergonômica base na forma de complementação deste trabalho.
Todos os pontos levantados são frutos das observações feitas pelos profissionais
durante sua visita nos postos de trabalho ou através de informações obtidas
junto aos funcionários dos setores avaliados.
As recomendações e sugestões, apresentadas nesta avaliação, tem por objetivo
melhorar as condições de trabalho, proporcionando, qualidade de vida,
segurança e prevenção de doenças ocupacionais dos funcionários da empresa.
Os pontos emitidos, de modo algum, devem ser encarados como uma solução
definitiva para os riscos ergonômicos existentes, pois pode haver alternativas
que aplicadas simultaneamente implementarão uma melhor equação do
problema.
                            </textarea>
                        </div>
                    
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Cadastrar Disposição Final</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END: Personal Information -->
    <!-- END: Users Layout -->
    </div>
@endsection

@push('custom-scripts')





@endpush
