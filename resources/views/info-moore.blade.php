@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Atualização de Formulário Moore e Garg
            </h2>
        </div>

        <form action="{{ route('upd-moore') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="id" value="{{$moore->id}}">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="fit" class="form-label"><strong>Intensidade do esforço (FIT)</strong></label>
                              <select class="form-control" name="fit" id="fit">
                                        <option @if($moore->fit == 1) selected @endif  value="1">Leve - Tranquilo</option>
                                        <option @if($moore->fit == 3) selected @endif value="3">Médio - Percebe-se algum esforço</option>
                                        <option @if($moore->fit == 6) selected @endif value="6">Pesado - Esforço nítido; sem expressão facial</option>
                                        <option @if($moore->fit == 9) selected @endif value="9">Muito Pesado - Esforço nítido; muda a expressão facial</option>
                                        <option @if($moore->fit == 13) selected @endif value="13">Próx. Máximo - Usa tronco e membros</option>
                            </select>
                        </div>


                        <div class="mt-3">
                            <label for="fde" class="form-label"><strong>Duração do Esforço (FDE)</strong></label>
                              <select class="form-control" name="fde" id="fde">
                                        <option @if($moore->fde == 0.5) selected @endif value="0.5"> < 10% do ciclo</option>
                                        <option @if($moore->fde == 1) selected @endif value="1">10 - 29% do ciclo</option>
                                        <option @if($moore->fde == 1.5) selected @endif value="1.5">30 - 49% do ciclo</option>
                                        <option @if($moore->fde == 2) selected @endif value="2">50 - 79% do ciclo</option>
                                        <option @if($moore->fde == 3) selected @endif value="3"> > 80% do ciclo</option>
                            </select>
                        </div>
                   
                       <div class="mt-3">
                            <label for="fde" class="form-label"><strong>Freqüência do Esforço (FFE)</strong></label>
                              <select class="form-control" name="ffe" id="ffe">
                                        <option @if($moore->ffe == 0.5) selected @endif value="0.5">< 4  p/min</option>
                                        <option @if($moore->ffe == 1) selected @endif value="1">  4 -  8  p/min</option>
                                        <option @if($moore->ffe == 1.5) selected @endif value="1.5">  9 - 14 p/min</option>
                                        <option @if($moore->ffe == 2) selected @endif value="2">15 - 19 p/min</option>
                                        <option @if($moore->ffe == 3) selected @endif value="3">> 20 p/min</option>
                            </select>
                        </div>

                        
                       <div class="mt-3">
                            <label for="fde" class="form-label"><strong>Postura da Mão-Punho (FPMP)</strong></label>
                              <select class="form-control" name="fpmp" id="fpmp">
                                       <option @if($moore->fpmp == 1) selected @endif value="1">Muito Boa - Neutro</option>           
                                       <option  value="1">Boa - Próxima do neutro</option>
                                       <option @if($moore->fpmp == 1.5) selected @endif value="1.5">Razoável - Não neutro</option>
                                       <option @if($moore->fpmp == 2) selected @endif value="2">Ruim - Desvio nítido</option>
                                       <option @if($moore->fpmp == 3) selected @endif value="3">Muito Ruim - Desvio próximo do máximo</option>
                            </select>
                        </div>


                        <div class="mt-3">
                            <label for="fde" class="form-label"><strong>Ritmo do Trabalho (FRT)</strong></label>
                              <select class="form-control" name="frt" id="frt">
                                       <option value="1">Muito Lento -   = < 80%</option>           
                                       <option value="1">Lento - 81 -  90%</option>
                                       <option @if($moore->frt == 1) selected @endif value="1">Razoável -  91 - 100%</option>
                                       <option @if($moore->frt == 1.5) selected @endif value="1.5">Rápido - 100 - 115% (apertado, porém acompanha)</option>
                                       <option @if($moore->frt == 2) selected @endif value="2">Muito Rápido - Desvio próximo do máximo</option>
                            </select>
                        </div>

                           <div class="mt-3">
                            <label for="fde" class="form-label"><strong>Duração do Trabalho (FDT)</strong></label>
                              <select class="form-control" name="fdt" id="fdt">
                                   <option @if($moore->fdt == 0.25) selected @endif value="0.25"> = < 1 hora p/dia</option>
                                   <option @if($moore->fdt == 0.5) selected @endif value="0.50"> 1 - 2 horas p/dia</option>
                                   <option @if($moore->fdt == 0.75) selected @endif value="0.75"> 2 - 4 horas p/dia</option>
                                   <option @if($moore->fdt == 1) selected @endif value="1"> 4 - 8 horas p/dia</option>
                                   <option @if($moore->fdt == 1.5) selected @endif value="1.5"> > 8 horas p/dia</option>
                            </select>
                        </div>

                          <div class="mt-3">
                                    <label for="atividade" class="form-label"><strong>Atividade</strong></label>
                                    <input id="atividade" type="text" name="atividade" class="form-control"
                                     value="{{$moore->atividade}}"   placeholder="Atividade avaliada" required>
                                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Atualizar Moore e Garg</button>
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
