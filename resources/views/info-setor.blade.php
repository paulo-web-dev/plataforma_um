@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Cadastro de Setor
            </h2>
            <a href="{{ route('infoempresa',  ['id' => $setor->id_empresa]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('upd-setor') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="id" value="{{$setor->id}}">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="area" class="form-label"><strong>Áreas</strong></label>
                              <select class="form-control" name="area" id="area">
                              <option value="{{$area->id}}">{{$area->nome}}</option>
                                @foreach ($areas as $area) 
                                    <option value="{{$area->id}}">{{$area->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Setor</strong></label>
                            <input id="update-profile-form-7" type="text" name="nome" class="form-control"
                                placeholder="Nome do Setor" value="{{$setor->nome}}">
                        </div>
                   
                      
                    
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Atualizar Setor</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END: Personal Information -->
    <!-- END: Users Layout -->
    </div>


         <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Lista de Postos De Trabalho
            </h2>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12 xl:col-span-12">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Posto de Trabalho</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Duplicar</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Editar</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                             
                                @foreach ($setor->subsetores as $subsetor) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$subsetor->id}}</td>
                                        <td class="border">{{$subsetor->nome}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('duplicar-subsetor', ['id' => $subsetor->id])}}">
                                                    <i data-feather="share-2" class="w-4 h-4 mr-1"></i> Duplicar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-subsetor', ['id' => $subsetor->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                               <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-subsetor', ['id' => $subsetor->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                      
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{route('form-subsetores', ['idsetor' => $setor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Posto de Trabalho</a>
            </div>    
        </div>
    </div>
@endsection

@push('custom-scripts')





@endpush
