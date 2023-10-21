@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Cadastro de Conclusão
           
            </h2>
             <a href="{{ route('info-subsetor',  ['id' => $id_subsetor]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('cad-conclusao') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="ferramenta" value="{{$ferramenta}}">
                    @if($ferramenta == 'Sue Rodgers')
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="conclusao" class="form-label"><strong>Membro</strong></label>
                              <select class="form-control" name="membro" id="membro">
                                       
                                        <option value="Pescoço">Pescoço</option>
                                        <option value="Ombros">Ombros</option>
                                        <option value="Tronco">Tronco</option>
                                        <option value="Braço">Braço</option>
                                        <option value="Mãos">Mãos</option>
                                        <option value="Pernas">Pernas</option>
                                        
                                      
                            </select>
                        </div>
                    @endif
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="conclusao" class="form-label"><strong>Conclusão</strong></label>
                              <select class="form-control" name="conclusao" id="conclusao">
                                        @if($ferramenta == 'Moore e Garg')
                                        <option value="Baixo Risco">Baixo Risco</option>
                                        <option value="Duvidoso">Duvidoso</option>
                                        <option value="Risco">Risco</option>
                                        @elseif($ferramenta == 'Rula')
                                         <option value="aceitável se não é mantida ou repetida por longos períodos">Aceitável se não é mantida ou repetida por longos períodos </option>
                                        <option value="são necessários mais estudos e que serão necessárias mudanças">São necessários mais estudos e que serão necessárias mudanças </option>
                                        <option value="são necessárias pesquisas e mudanças em um futuro próximo">São necessárias pesquisas e mudanças em um futuro próximo </option>
                                        <option value="são necessárias pesquisas e mudanças imediatamente">São necessárias pesquisas e mudanças imediatamente </option>
                                        @elseif($ferramenta == 'OWAS')
                                        <option value="Sem ações corretivas, postura adequada">Sem ações corretivas, postura adequada </option>
                                        <option value="Ações corretivas são requeridas em um futuro próximo">Ações corretivas são requeridas em um futuro próximo </option>
                                        <option value="Ações corretivas são necessária a curto prazo">Ações corretivas são necessária a curto prazo </option>
                                        <option value="Ações corretivas imediatas">Ações corretivas imediatas</option>
                                        @elseif($ferramenta == 'Sue Rodgers')
                                        <option value="RISCO ALTO">Risco Alto</option>
                                        <option value="RISCO MODERADO">Risco Moderado</option>
                                        <option value="RISCO BAIXO">Risco Baixo</option>
                                        @elseif($ferramenta == 'NIOSH')
                                        <option value="Faixa Segura">Faixa Segura</option>
                                        <option value="Faixa é considerada de risco moderado">Faixa é considerada de risco moderado</option>
                                        <option value="Faixa é considerada de alto risco">Faixa é considerada de alto risco</option>
                                        @elseif($ferramenta == 'OCRA')
                                        <option value="Ausente ou Aceitável">Ausente ou Aceitável</option>
                                        <option value="Limite">Limite</option>
                                        <option value="Baixo">Baixo</option>
                                        <option value="Médio">Médio</option>
                                        <option value="Alto">Alto</option>
                                        @endif
                            </select>
                        </div>


                          <div class="mt-3">
                                    <label for="atividade" class="form-label"><strong>Atividade</strong></label>
                                    <input id="atividade" type="text" name="atividade" class="form-control"
                                        placeholder="Atividade avaliada" required>
                                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Cadastrar Conclusão Simplificado</button>
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
