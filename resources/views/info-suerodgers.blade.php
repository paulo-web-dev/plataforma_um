@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Atualização de Formulário Sue e Rodgers
            </h2>
             <a href="{{ route('info-subsetor',  ['id' => $sue->id_subsetor]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('upd-suerodgers') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="id" value="{{$sue->id}}">
                    <div class="col-span-12 xl:col-span-6">
                       
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Pescoço Nível de Esforço</strong></label>
                              <select class="form-control" name="pescoco_ne" id="pescoco">
                                        <option @if($pescoco[0] == 1) selected @endif  value="1">1 - Baixo</option>
                                        <option @if($pescoco[0] == 2) selected @endif value="2">2 - Moderado </option>
                                        <option @if($pescoco[0] == 3) selected @endif value="3">3 - Pesado </option>
                            </select> 
                        </div>

                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Pescoço Tempo de Esforço</strong></label>
                              <select class="form-control" name="pescoco_te" id="pescoco">
                                        <option @if($pescoco[1] == 1) selected @endif value="1">1 - 0 a 5 segundos</option>
                                        <option @if($pescoco[1] == 2) selected @endif value="2">2 - 6 a 20 segundos </option>
                                        <option @if($pescoco[1] == 3) selected @endif value="3">3 - + de 20 segundos </option>
                            </select> 
                        </div>
                            
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Pescoço Esforços por Minuto</strong></label>
                              <select class="form-control" name="pescoco_em" id="pescoco">
                                        <option @if($pescoco[2] == 1) selected @endif value="1">1 - 0 a 1</option>
                                        <option @if($pescoco[2] == 2) selected @endif value="2">2 - 2 a 5</option>
                                        <option @if($pescoco[2] == 3) selected @endif value="3">3 - + de 5</option>
                            </select> 
                        </div>
                     </div>  

                      <div class="col-span-12 xl:col-span-6">
                       
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Ombros Nível de Esforço</strong></label>
                              <select class="form-control" name="ombro_ne" id="pescoco">
                                        <option @if($ombro[0] == 1) selected @endif value="1">1 - Baixo</option>
                                        <option @if($ombro[0] == 2) selected @endif value="2">2 - Moderado </option>
                                        <option @if($ombro[0] == 3) selected @endif value="3">3 - Pesado </option>
                            </select> 
                        </div>

                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Ombros Tempo de Esforço</strong></label>
                              <select class="form-control" name="ombro_te" id="pescoco">
                                        <option @if($ombro[1] == 1) selected @endif value="1">1 - 0 a 5 segundos</option>
                                        <option @if($ombro[1] == 2) selected @endif value="2">2 - 6 a 20 segundos </option>
                                        <option @if($ombro[1] == 3) selected @endif value="3">3 - + de 20 segundos </option>
                            </select> 
                        </div>
                            
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Ombros Esforços por Minuto</strong></label>
                              <select class="form-control" name="ombro_em" id="pescoco">
                                        <option @if($ombro[2] == 1) selected @endif value="1">1 - 0 a 1</option>
                                        <option @if($ombro[2] == 3) selected @endif value="2">2 - 2 a 5</option>
                                        <option @if($ombro[2] == 3) selected @endif value="3">3 - + de 5</option>
                            </select> 
                        </div>
                     </div>  

                    <div class="col-span-12 xl:col-span-6">
                       
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Tronco Nível de Esforço</strong></label>
                              <select class="form-control" name="tronco_ne" id="pescoco">
                                        <option @if($tronco[0] == 1) selected @endif value="1">1 - Baixo</option>
                                        <option @if($tronco[0] == 2) selected @endif value="2">2 - Moderado </option>
                                        <option @if($tronco[0] == 3) selected @endif value="3">3 - Pesado </option>
                            </select> 
                        </div>

                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Tronco Tempo de Esforço</strong></label>
                              <select class="form-control" name="tronco_te" id="pescoco">
                                        <option @if($tronco[1] == 1) selected @endif value="1">1 - 0 a 5 segundos</option>
                                        <option @if($tronco[1] == 2) selected @endif value="2">2 - 6 a 20 segundos </option>
                                        <option @if($tronco[1] == 3) selected @endif value="3">3 - + de 20 segundos </option>
                            </select> 
                        </div>
                            
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Tronco Esforços por Minuto</strong></label>
                              <select class="form-control" name="tronco_em" id="pescoco">
                                        <option @if($tronco[2] == 1) selected @endif value="1">1 - 0 a 1</option>
                                        <option @if($tronco[2] == 2) selected @endif value="2">2 - 2 a 5</option>
                                        <option @if($tronco[2] == 3) selected @endif value="3">3 - + de 5</option>
                            </select> 
                        </div>
                     </div> 


                     
                    <div class="col-span-12 xl:col-span-6">
                       
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Braços Nível de Esforço</strong></label>
                              <select class="form-control" name="braco_ne" id="pescoco">
                                        <option @if($braco[0] == 1) selected @endif value="1">1 - Baixo</option>
                                        <option @if($braco[0] == 2) selected @endif  value="2">2 - Moderado </option>
                                        <option @if($braco[0] == 3) selected @endif  value="3">3 - Pesado </option>
                            </select> 
                        </div>

                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Braços Tempo de Esforço</strong></label>
                              <select class="form-control" name="braco_te" id="pescoco">
                                        <option @if($braco[1] == 1) selected @endif value="1">1 - 0 a 5 segundos</option>
                                        <option @if($braco[1] == 2) selected @endif value="2">2 - 6 a 20 segundos </option>
                                        <option @if($braco[1] == 3) selected @endif value="3">3 - + de 20 segundos </option>
                            </select> 
                        </div>
                            
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Braços Esforços por Minuto</strong></label>
                              <select class="form-control" name="braco_em" id="pescoco">
                                        <option @if($braco[2] == 1) selected @endif value="1">1 - 0 a 1</option>
                                        <option @if($braco[2] == 2) selected @endif value="2">2 - 2 a 5</option>
                                        <option @if($braco[2] == 3) selected @endif value="3">3 - + de 5</option>
                            </select> 
                        </div>
                     </div>

                       
                    <div class="col-span-12 xl:col-span-6">
                       
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Mãos, Punhos e Dedos de Esforço</strong></label>
                              <select class="form-control" name="mpd_ne" id="pescoco">
                                        <option @if($mao_punho_dedo[0] == 1) selected @endif value="1">1 - Baixo</option>
                                        <option @if($mao_punho_dedo[0] == 2) selected @endif value="2">2 - Moderado </option>
                                        <option @if($mao_punho_dedo[0] == 3) selected @endif value="3">3 - Pesado </option>
                            </select> 
                        </div>

                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Mãos, Punhos e Dedos  Tempo de Esforço</strong></label>
                              <select class="form-control" name="mpd_te" id="pescoco">
                                        <option @if($mao_punho_dedo[1] == 1) selected @endif value="1">1 - 0 a 5 segundos</option>
                                        <option @if($mao_punho_dedo[1] == 2) selected @endif value="2">2 - 6 a 20 segundos </option>
                                        <option @if($mao_punho_dedo[1] == 3) selected @endif value="3">3 - + de 20 segundos </option>
                            </select> 
                        </div>
                            
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Mãos, Punhos e Dedos  Esforços por Minuto</strong></label>
                              <select class="form-control" name="mpd_em" id="pescoco">
                                        <option @if($mao_punho_dedo[2] == 1) selected @endif value="1">1 - 0 a 1</option>
                                        <option @if($mao_punho_dedo[2] == 2) selected @endif value="2">2 - 2 a 5</option>    
                                        <option @if($mao_punho_dedo[2] == 3) selected @endif value="3">3 - + de 5</option>
                            </select> 
                        </div>
                     </div>

                      
                    <div class="col-span-12 xl:col-span-6">
                       
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Pernas, Pés e Dedos Nível de Esforço</strong></label>
                              <select class="form-control" name="ppd_ne" id="pescoco">
                                        <option @if($perna_pe_dedo[0] == 1) selected @endif value="1">1 - Baixo</option>
                                        <option @if($perna_pe_dedo[0] == 2) selected @endif  value="2">2 - Moderado </option>
                                        <option @if($perna_pe_dedo[0] == 3) selected @endif  value="3">3 - Pesado </option>
                            </select> 
                        </div>

                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Pernas, Pés e Dedos Tempo de Esforço</strong></label>
                              <select class="form-control" name="ppd_te" id="pescoco">
                                        <option @if($perna_pe_dedo[1] == 1) selected @endif value="1">1 - 0 a 5 segundos</option>
                                        <option @if($perna_pe_dedo[1] == 2) selected @endif value="2">2 - 6 a 20 segundos </option>
                                        <option @if($perna_pe_dedo[1] == 3) selected @endif value="3">3 - + de 20 segundos </option>
                            </select> 
                        </div>
                            
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Pernas, Pés e Dedos Esforços por Minuto</strong></label>
                              <select class="form-control" name="ppd_em" id="pescoco">
                                        <option @if($perna_pe_dedo[2] == 1) selected @endif value="1">1 - 0 a 1</option>
                                        <option @if($perna_pe_dedo[2] == 2) selected @endif value="2">2 - 2 a 5</option>
                                        <option @if($perna_pe_dedo[2] == 3) selected @endif value="3">3 - + de 5</option>
                            </select> 
                        </div>
                     </div>
                     <div class="col-span-12 xl:col-span-6">
                          <div class="mt-3">
                                    <label for="atividade" class="form-label"><strong>Atividade</strong></label>
                                    <input id="atividade" type="text" name="atividade" class="form-control"
                                       value="{{$sue->atividade}}" placeholder="Atividade avaliada" required>
                                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Atualização Sue Rodgers</button>
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
