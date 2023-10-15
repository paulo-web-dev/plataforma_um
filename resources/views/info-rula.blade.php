@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Atualização de Formulário Rula (Membros Superiores)
            </h2>
             <a href="{{ route('info-subsetor',  ['id' => $rula->id_subsetor]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('upd-rula') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="id" value="{{$rula->id}}">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Braço</strong></label>
                              <select class="form-control" name="braco" id="braco">
                                        <option @if($rula->braco == 1) selected @endif value="1">1 - 20° de extensão a 20° de flexão </option>
                                        <option @if($rula->braco == 2) selected @endif value="2">2 - > 20° de extensão  </option>
                                        <option  value="2">2 - > 20 a 40° de  flexão </option>
                                        <option @if($rula->braco == 3) selected @endif value="3">3 - > 45 a 90° de flexão </option>
                                        <option @if($rula->braco == 4) selected @endif value="4">4 - >  90° de de flexão </option>
                            </select>
                            
                        </div>
                            <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0 legenda_rula">
                                    <label class="form-check-label ml-0" for="ajuste">Adicionar Ponto de Ajuste</label>
                                    <input name="braco_desvio" class="show-code form-check-input mr-0 ml-3" type="checkbox" @if($rula->braco_desvio == 1) checked @endif>
                            </div>
                            <img src="/fotos/rula01.jpeg" class="legenda_rula">

                              <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Ante Braço</strong></label>
                              <select class="form-control" name="antebraco" id="antebraco">
                                        <option @if($rula->antebraco == 1) selected @endif value="1">1 - 60° a 100° de flexão </option>
                                        <option @if($rula->antebraco == 2) selected @endif value="2">2 - < 60° de flexão  </option>
                                        <option value="2">2 - > 100° de de flexão </option>           
                            </select>
                            
                        </div>
                         <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0 legenda_rula">
                                    <label class="form-check-label ml-0" for="ajuste">Adicionar Ponto de Ajuste</label>
                                    <input name="antebraco_desvio" class="show-code form-check-input mr-0 ml-3" type="checkbox" @if($rula->antebraco_desvio == 1) checked @endif>
                            </div>
                            <img src="/fotos/rula02.jpeg" class="legenda_rula">

                                   <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Punho</strong></label>
                              <select class="form-control" name="punho" id="punho">
                                        <option @if($rula->punho == 1) selected @endif value="1">1 - Neutra ou meia inclinação </option>
                                        <option @if($rula->punho == 2) selected @endif value="2">2 -  0 a 15° de flexão ou extensão  </option>
                                        <option value="2">2 -  20 a 40° de de flexão </option>
                                  
                            </select>
                            
                        </div>
                         <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0 legenda_rula">
                                    <label class="form-check-label ml-0" for="ajuste">Adicionar Ponto de Ajuste</label>
                                    <input name="punho_desvio" class="show-code form-check-input mr-0 ml-3" type="checkbox" @if($rula->punho_desvio == 1) checked @endif>
                            </div>
                            <img src="/fotos/rula03.jpeg" class="legenda_rula">

                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Pescoço</strong></label>
                              <select class="form-control" name="pescoco" id="pescoco">
                                        <option @if($rula->pescoco == 1) selected @endif value="1">1 - 0 a 10° de flexão </option>
                                        <option @if($rula->pescoco == 2) selected @endif value="2">2 -  10 a 20° de flexão  </option>
                                        <option @if($rula->pescoco == 3) selected @endif value="3">3 - > 20° de de flexão </option>
                                        <option @if($rula->pescoco == 4) selected @endif value="4">4 - Extensão </option>
                                       
                            </select>
                            
                        </div>
                         <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0 legenda_rula">
                                    <label class="form-check-label ml-0" for="ajuste">Adicionar Ponto de Ajuste</label>
                                    <input name="pescoco_desvio" class="show-code form-check-input mr-0 ml-3" type="checkbox" @if($rula->pescoco_desvio == 1) checked @endif>
                            </div>
                            <img src="/fotos/rula04.jpeg" class="legenda_rula">


                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Tronco</strong></label>
                              <select class="form-control" name="tronco" id="tronco">
                                        <option @if($rula->tronco == 1) selected @endif value="1">1 - 0° ou bem apoiado quando sentado </option>
                                        <option @if($rula->tronco == 2) selected @endif value="2">2 - > 0 a 20° de flexão  </option>
                                        <option @if($rula->tronco == 3) selected @endif value="3">3 - > 20 a 60° de flexão </option>
                                        <option @if($rula->tronco == 4) selected @endif value="4">4 - > 60° de de flexão </option>
                            </select>
                            
                        </div>
                         <div class="form-check form-switch w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0 legenda_rula">
                                    <label class="form-check-label ml-0" for="ajuste">Adicionar Ponto de Ajuste</label>
                                    <input name="tronco_desvio" class="show-code form-check-input mr-0 ml-3" type="checkbox" @if($rula->tronco_desvio == 1) checked @endif>
                            </div>
                            <img src="/fotos/rula05.jpeg" class="legenda_rula">

                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Pernas</strong></label>
                              <select class="form-control" name="pernas" id="pernas">
                                        <option @if($rula->perna == 1) selected @endif value="1">1 -  Pernas e pés bem apoiados e bem equilibrados</option>
                                        <option @if($rula->perna == 2) selected @endif value="2">2 - > Ao contrário</option>
                                       
                            </select>
                            
                        </div>
                            <img src="/fotos/rula06.jpeg" class="legenda_rula">
                          <div class="mt-3">
                                    <label for="atividade" class="form-label"><strong>Atividade</strong></label>
                                    <input id="atividade" type="text" name="atividade" class="form-control"
                                      value="{{$rula->atividade}}"  placeholder="Atividade avaliada" required>
                                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Atualizar Rula</button>
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
