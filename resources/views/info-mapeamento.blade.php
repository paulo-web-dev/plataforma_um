@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
              Dado de Mapeamento
            </h2>
        <a href="{{ route('infoempresa',  ['id' => $mapeamento->id_empresa]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('upd-mapeamento') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="id" value="{{$mapeamento->id}}">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Área</strong></label>
                            <input id="update-profile-form-7" type="text" name="area" class="form-control"
                                placeholder="Área" value="{{$mapeamento->area}}">
                        </div>

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Setor</strong></label>
                            <input id="update-profile-form-7" type="text" name="setor" class="form-control"
                                placeholder="Setor" value="{{$mapeamento->setor}}">
                        </div>

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Posto de Trabalho</strong></label>
                            <input id="update-profile-form-7" type="text" name="posto_trabalho" class="form-control"
                                placeholder="Posto de Trabalho" value="{{$mapeamento->posto_trabalho}}">
                        </div>
                        
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Função</strong></label>
                            <input id="update-profile-form-7" type="text" name="funcao" class="form-control"
                                placeholder="Função" value="{{$mapeamento->funcao}}">
                        </div>
                        
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Atividade</strong></label>
                            <input id="update-profile-form-7" type="text" name="atividade" class="form-control"
                                placeholder="Atividade" value="{{$mapeamento->atividade}}">
                        </div>
                        
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Postura</strong></label>
                            <input id="update-profile-form-7" type="text" name="postura" class="form-control"
                                placeholder="Postura" value="{{$mapeamento->postura}}">
                        </div>

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Exigencia</strong></label>
                            <input id="update-profile-form-7" type="text" name="exigencia" class="form-control"
                                placeholder="Postura" value="{{$mapeamento->exigencia}}">
                        </div>

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Sobrecarga</strong></label>
                            <input id="update-profile-form-7" type="text" name="sobrecarga" class="form-control"
                                placeholder="Postura" value="{{$mapeamento->sobrecarga}}">
                        </div>

                        
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Classificação</strong></label>
                            <input id="update-profile-form-7" type="text" name="classificacao" class="form-control"
                                placeholder="Postura" value="{{$mapeamento->classificacao}}">
                        </div>
                    
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Atualizar Mapeamento</button>
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
