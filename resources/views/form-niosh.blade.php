@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Cadastro de Formulário Niosh
            </h2>
        <a href="{{ route('info-subsetor',  ['id' => $id_subsetor]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('cad-niosh') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                            <label for="fit" class="form-label"><strong>FDH (H): Força de Destino Horizontal.</strong></label>
                              <input type="Number" placeholder="FDH (H): Força de Destino Horizontal." class="form-control" name="fdh" id="fdh">
                        </div>

                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>FAV (Vc): Força de Alavanca Vertical de Compressão.</strong></label>
                           <input type="Number" placeholder="FAV (Vc): Força de Alavanca Vertical de Compressão." class="form-control" name="fav" id="fav">
                           
                        </div>
                            
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>FDC (Dc): Força de Compressão Diagonal.</strong></label>
                              <input type="Number" placeholder="FDC (Dc): Força de Compressão Diagonal" class="form-control" name="fdc" id="fdc">
                                 
                        </div>
                     </div>  

                      <div class="col-span-12 xl:col-span-6">
                       
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>FRLT (A): Força Relativa de Torção.</strong></label>
                            <input type="Number" placeholder="FRLT (A): Força Relativa de Torção." class="form-control" name="frlt" id="frlt">
                    
                        </div>

                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>FFL: Força de Fricção Lateral.</strong></label>
                              <input type="Number" placeholder="FFL: Força de Fricção Lateral." class="form-control" name="ffl" id="ffl">
                             
                        </div>
                            
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>FQPC: Força de Qualificação para Postura Correta.</strong></label>
                              <input type="Number" class="form-control"  placeholder="FQPC: Força de Qualificação para Postura Correta." name="fqpc" id="fqpc">
                                
                        </div>

                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Peso (kg).</strong></label>
                              <input type="Number"  class="form-control"  placeholder="Peso KG" class="form-control" name="peso" id="peso">
                                
                        </div>
                     </div>  


                     
                 
                     <div class="col-span-12 xl:col-span-6">
                          <div class="mt-3">
                                    <label for="atividade" class="form-label"><strong>Atividade</strong></label>
                                    <input id="atividade" type="text" name="atividade" class="form-control"
                                        placeholder="Atividade avaliada" required>
                                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Cadastrar Niosh</button>
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
