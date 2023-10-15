@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Atualização de Formulário OWAS
            </h2>
             <a href="{{ route('info-subsetor',  ['id' => $owas->id_subsetor]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('upd-owas') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="id" value="{{$owas->id}}">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="dorso" class="form-label"><strong>Dorso</strong></label>
                              <select class="form-control" name="dorso" id="dorso">
                                        <option @if($owas->dorso == 1) selected @endif value="1">1 - Reto</option>
                                        <option @if($owas->dorso == 2) selected @endif  value="2">2 - Inclinado</option>
                                        <option @if($owas->dorso == 3) selected @endif  value="3">3 - Reto e torcido</option>
                                        <option @if($owas->dorso == 4) selected @endif  value="4">4 - Inclinado e torcido</option>
                                        
                            </select>
                        </div>

                        <div class="mt-3">
                            <label for="braco" class="form-label"><strong>Braços</strong></label>
                              <select class="form-control" name="braco" id="braco">
                                        <option @if($owas->braco == 1) selected @endif  value="1">1 - Dois Braços Pra Baixo</option>
                                        <option @if($owas->braco == 2) selected @endif  value="2">2 - Um Braço pra cima</option>
                                        <option @if($owas->braco == 3) selected @endif  value="3">3 - Dois Braços Pra cima</option>
                                        
                            </select>
                        </div>


                        <div class="mt-3">
                            <label for="pernas" class="form-label"><strong>Pernas</strong></label>
                              <select class="form-control" name="pernas" id="pernas">
                                        <option @if($owas->pernas == 1) selected @endif  value="1">1 - Duas pernas retas</option>
                                        <option @if($owas->pernas == 2) selected @endif  value="2">2 - Uma perna reta</option>
                                        <option @if($owas->pernas == 3) selected @endif  value="3">3 - Duas pernas flexionadas</option>
                                        <option @if($owas->pernas == 4) selected @endif  value="4">4 - Uma perna flexionada</option>
                                        <option @if($owas->pernas == 5) selected @endif  value="5">5 - Uma perna ajoelhada</option>
                                        <option @if($owas->pernas == 6) selected @endif  value="6">6 - Deslocamento com pernas</option>
                                        <option @if($owas->pernas == 7) selected @endif  value="7">7 - Duas pernas suspensas</option>
                                        
                            </select>
                        </div>


                        
                        <div class="mt-3">
                            <label for="pernas" class="form-label"><strong>Carga</strong></label>
                              <select class="form-control" name="carga" id="carga">
                                        <option @if($owas->carga == 1) selected @endif  value="1">1 -Carga ou força até 10kg</option>   
                                        <option @if($owas->carga == 2) selected @endif  value="2">2 - Carga ou força entre 10 e 20kg</option>   
                                        <option @if($owas->carga == 3) selected @endif  value="3">3 - Carga ou força acima de 20kg</option>                            
                            </select>
                        </div>

                        <img src="/fotos/owas.jpeg" class="legenda_rula">

                          <div class="mt-3">
                                    <label for="atividade" class="form-label"><strong>Atividade</strong></label>
                                    <input id="atividade" type="text" name="atividade" class="form-control"
                                      value="{{$owas->atividade}}"  placeholder="Atividade avaliada" required>
                                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Atualizar Owas</button>
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
