@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
              Dado de Plano de Ação
            </h2>
        <a href="{{ route('infoempresa',  ['id' => $plano->id_empresa]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('upd-plano-de-acao') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="id" value="{{$plano->id}}">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Área</strong></label>
                            <input id="update-profile-form-7" type="text" name="area" class="form-control" required
                                placeholder="Área" value="{{$plano->area}}">
                        </div>

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Setor</strong></label>
                            <input id="update-profile-form-7" type="text" name="setor" class="form-control" required
                                placeholder="Setor" value="{{$plano->setor}}" >
                        </div>

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Posto de Trabalho</strong></label>
                            <input id="update-profile-form-7" type="text" name="posto_trabalho" class="form-control" required
                                placeholder="Posto de Trabalho" value="{{$plano->posto_trabalho}}">
                        </div>
                        
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Função</strong></label>
                            <input id="update-profile-form-7" type="text" name="funcao" class="form-control" required
                                placeholder="Função" value="{{$plano->funcao}}">
                        </div>
                        
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Exigência da Atividade</strong></label>
                            <input id="update-profile-form-7" type="text" name="exigencia" class="form-control" required
                                placeholder="Exigência da Atividade" value="{{$plano->exigencia}}">
                        </div>
                        
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Recomendação</strong></label>
                            <input id="update-profile-form-7" type="text" name="recomendacao" class="form-control" required
                                placeholder="Recomendação" value="{{$plano->recomendacao}}">
                        </div>

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Viabilidade</strong></label>
                            <input id="update-profile-form-7" type="text" name="viabilidade" class="form-control" required
                                placeholder="Viabilidade" value="{{$plano->viabilidade}}">
                        </div>

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Prazo</strong></label>
                            <input id="update-profile-form-7" type="text" name="prazo" class="form-control" required
                                placeholder="Prazo" value="{{$plano->prazo}}">
                        </div>

                        
                
                    
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Atualizar Plano de Ação</button>
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
