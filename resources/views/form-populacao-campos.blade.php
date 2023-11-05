@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
               Dado de População
            </h2>
            <a href="{{ route('info-subsetor',  ['id' => $id_subsetor]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('cad-populacao-subsetor') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                            <label for="update-profile-form-7" class="form-label"><strong>Nome</strong></label>
                            <input id="update-profile-form-7" type="text" name="nome" class="form-control"
                                placeholder="Nome" value="">
                        </div>

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Idade</strong></label>
                            <input id="update-profile-form-7" type="number" name="idade" class="form-control"
                                placeholder="Idade" value="}">
                        </div>

                        
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Tempo de Empresa</strong></label>
                            <input id="update-profile-form-7" type="number" name="tempo_empresa" class="form-control"
                                placeholder="Tempo de Empresa" value="">
                        </div>

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Sexo</strong></label>
                                <select class="form-control" name="sexo" id="sexo">
                                        <option value="MASC.">Masculino</option>
                                        <option value="FEM.">Feminino</option>  
                                        
                                                                           
                            </select>
                        </div>

                        
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Escolaridade</strong></label>
                                <select class="form-control" name="escolaridade" id="escolaridade">
                                         
                                        <option value="PRIMEIRO GRAU COMPLETO">PRIMEIRO GRAU COMPLETO</option>
                                        <option value="SEGUNDO GRAU COMPLETO">SEGUNDO GRAU COMPLETO</option>
                                        <option value="TERCEIRO GRAU COMPLETO">TERCEIRO GRAU COMPLETO</option>                                  
                            </select>
                        </div>
                    
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Cadastrar População</button>
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
