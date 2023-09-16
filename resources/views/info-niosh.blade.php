@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Atualização de Formulário Niosh
            </h2>
        </div>

        <form action="{{ route('upd-niosh') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="id" value="{{$niosh->id}}">
                    <div class="col-span-12 xl:col-span-6">
                       
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>FDH (H): Força de Destino Horizontal.</strong></label>
                              <input type="Number" placeholder="FDH (H): Força de Destino Horizontal." class="form-control" name="fdh" id="fdh" value="{{$niosh->fdh}}">
                        </div>

                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>FAV (Vc): Força de Alavanca Vertical de Compressão.</strong></label>
                           <input type="Number" placeholder="FAV (Vc): Força de Alavanca Vertical de Compressão." class="form-control" name="fav" id="fav" value="{{$niosh->fav}}">
                           
                        </div>
                            
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>FDC (Dc): Força de Compressão Diagonal.</strong></label>
                              <input type="Number" placeholder="FDC (Dc): Força de Compressão Diagonal" class="form-control" name="fdc" id="fdc" value="{{$niosh->fdc}}">
                                 
                        </div>
                     </div>  

                      <div class="col-span-12 xl:col-span-6">
                       
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>FRLT (A): Força Relativa de Torção.</strong></label>
                            <input type="Number" placeholder="FRLT (A): Força Relativa de Torção." class="form-control" name="frlt" id="frlt" value="{{$niosh->frlt}}">
                    
                        </div>

                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>FFL: Força de Fricção Lateral.</strong></label>
                              <input type="Number" placeholder="FFL: Força de Fricção Lateral." class="form-control" name="ffl" id="ffl" value="{{$niosh->ffl}}">
                             
                        </div>
                            
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>FQPC: Força de Qualificação para Postura Correta.</strong></label>
                              <input type="Number" class="form-control"  placeholder="FQPC: Força de Qualificação para Postura Correta." name="fqpc" id="fqpc" value="{{$niosh->fqpc}}">
                                
                        </div>

                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Peso (kg).</strong></label>
                              <input type="Number"  class="form-control"  placeholder="Peso KG" class="form-control" name="peso" id="peso" value="{{$niosh->peso}}">
                                
                        </div>
                     </div>  


                     
                 
                     <div class="col-span-12 xl:col-span-6">
                          <div class="mt-3">
                                    <label for="atividade" class="form-label"><strong>Atividade</strong></label>
                                    <input id="atividade" type="text" name="atividade" class="form-control"
                                        placeholder="Atividade avaliada" required value="{{$niosh->atividade}}">
                                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Atualizar Niosh</button>
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
