@extends('layouts.header')

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>


@section('content')
   
 <div class="intro-y flex items-center mt-8 ">
        <h2 class="text-lg font-medium mr-auto">
            Informações da Empresa
        </h2>
    <div class="flex-wrap">
        <a href="{{ route('show-empresas') }}" class="btn btn-primary shadow-md mr-2" style="margin: 5px"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        <a href="{{ route('gera-relatorio', ['id' => $empresa->id]) }}" class="btn btn-primary shadow-md mr-2" style="margin: 5px"><i data-feather="plus" class="w-4 h-4 mr-2"></i> Gerar Relatório</a>
        @if(isset($empresa->cabecalho))
          <a href="{{ route('info-cabecalho', ['id' => $empresa->cabecalho->id]) }}" class="btn btn-primary shadow-md mr-2" style="margin: 5px"><i data-feather="plus" class="w-4 h-4 mr-2"></i> Atualizar/Ver Cabeçalho</a>  
        @else
           <a href="{{ route('form-cabecalho', ['idempresa' => $empresa->id]) }}" class="btn btn-primary shadow-md mr-2" style="margin: 5px"><i data-feather="plus" class="w-4 h-4 mr-2"></i> Cadastrar Cabeçalho</a>  
        @endif

        @if(isset($empresa->rodape))
          <a href="{{ route('info-rodape', ['id' => $empresa->rodape->id]) }}" class="btn btn-primary shadow-md mr-2" style="margin: 5px"><i data-feather="plus" class="w-4 h-4 mr-2"></i> Atualizar/Ver Rodapé</a>  
        @else
           <a href="{{ route('form-rodape', ['idempresa' => $empresa->id]) }}" class="btn btn-primary shadow-md mr-2" style="margin: 5px"><i data-feather="plus" class="w-4 h-4 mr-2"></i> Cadastrar Rodapé</a>  
        @endif
     </div>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Profile Menu -->

        {{-- <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5 lg:mt-0">
                <div class="p-5 border-t nav-tab border-gray-200 dark:border-dark-5">
                    <a id="informacoes-pessoais-tab" data-toggle="tab" data-target="#informacoes-pessoais" href="javascript:;"
                        role="tab" class="flex items-center">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Informações Pessoais </a>
                </div>
            </div>
        </div> --}}
        <!-- END: Profile Menu -->

        <div class="col-span-12 lg:col-span-12 xxl:col-span-12 tab-content">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">
                    <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i data-feather="x" class="w-4 h-4"></i>
                    </button>
                </div>
            @endforeach
            <form action="{{route('updempresa')}}" method="post" enctype="multipart/form-data" data-single="true"
                method="post">
                @csrf
                {{-- <div id="informacoes-pessoais" role="tabpanel" aria-labelledby="informacoes-pessoais-tab"
                    class="grid grid-cols-12 gap-6 tab-pane active">
                    <!-- BEGIN: Products -->
                    <div class="intro-y box col-span-12 xxl:col-span-12">
                        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base mr-auto">
                               Informações da Empresa
                            </h2>
                        </div>
                        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-24 lg:h-24 image-fit relative">
                                <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full"
                                    src="{{ url('dist/images/profile-11.jpg') }}">
                                <div
                                    class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-theme-1 rounded-full p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-camera w-4 h-4 text-white">
                                        <path
                                            d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z">
                                        </path>
                                        <circle cx="12" cy="13" r="4"></circle>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>  --}}
                    <input type="hidden" name="id" value="{{$empresa->id}}">
                    <div class="intro-y box col-span-12 xxl:col-span-12 p-5">
                        <div class="grid grid-cols-12 gap-x-5">
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="nome" class="form-label"><strong>Nome</strong></label>
                                    <input id="nome" type="text" name="nome" class="form-control"
                                        placeholder="Nome da empresa" value="{{$empresa->nome}}" required>
                                </div>

                                <div class="mt-3">
                                    <label for="nome" class="form-label"><strong>Título AET</strong></label>
                                    <input id="nome" type="text" name="titulo" class="form-control"
                                        placeholder="Título da AET" value="{{$empresa->titulo}}" >
                                </div>
                        
                                <div class="mt-3">
                                    <label for="Inscrição" class="form-label"><strong>Inscrição Estudal</strong></label>
                                    <input id="Inscrição" type="text" name="inscricao_estadual" required class="form-control"
                                        placeholder="Inscrição Estadual" value="{{$empresa->inscricao_estadual}}">
                                </div>

                                 <div class="mt-3">
                                    <label for="Inscrição" class="form-label"><strong>Período de Inspeção</strong></label>
                                    <input id="Inscrição" type="text" name="periodo_inspecao" required class="form-control"
                                        placeholder="Período Inspeção" value="{{$empresa->periodo_inspecao}}">
                                </div>
                        
                                <div class="mt-3">
                                    <label for="CNPJ" class="form-label"><strong>CNPJ</strong></label>
                                    <input id="CNPJ" type="number" name="cnpj" required class="form-control"
                                    value="{{$empresa->cnpj}}"    placeholder="CNPJ da empresa">
                                </div>
                                
                           
                                <div class="mt-3">
                                    <label for="telefone" class="form-label"><strong>Telefone</strong></label>
                                    <input id="telefone" type="number" name="telefone" required class="form-control"
                                     value="{{$empresa->telefone}}"   placeholder="Contato empresarial">
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-6">
                                <div class="mt-3">
                                    <label for="num_funcionarios" class="form-label"><strong>Número de Funcionarios</strong></label>
                                    <input id="num_funcionarios" type="number" name="num_funcionarios" class="form-control"
                                     value="{{$empresa->num_funcionarios}}"   placeholder="Número de Funcionarios">
                                </div>
                                <div class="mt-3 ">
                                    <label for="responsavel" class="form-label"><strong>Responsavel</strong></label>
                                    <input id="responsavel" type="text" name="responsavel" class="form-control"
                                      value="{{$empresa->responsavel}}"  placeholder="Responsavel">
                                </div>
                                   <div class="mt-3 ">
                                    <label for="responsavel" class="form-label"><strong>Grau de Risco</strong></label>
                                    <input id="responsavel" type="text" name="grau_de_risco" class="form-control"
                                      value="{{$empresa->grau_de_risco}}"  placeholder="Grau de Risco">
                                </div>

                                <div class="mt-3 ">
                                    <label for="setor" class="form-label"><strong>Ramo de Atividade</strong></label>
                                    <input id="setor" type="text" name="setor" class="form-control"
                                     value="{{$empresa->setor}}"   placeholder="setor">
                                </div>
                                                           </div>
                    @if (isset($empresa->photo))
                     
                    <div class="col-span-12 xl:col-span-6"> 
                        <label for="setor" class="form-label"><strong>Imagem da Empresa</strong></label>
                        <img src="/fotos-empresas/{{$empresa->photo}}" alt="Imagem">
                    </div>
                      <div class="col-span-12 xl:col-span-6"> 
                        <label class="form-label"><strong>Alterar  Imagem</strong></label>
                        <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">
                            <div class="px-4 pt-24 pb-24 flex items-center justify-center cursor-pointer relative">
                                <div id="areaArquivo">
                                    <i data-feather="image" class="w-4 h-4 mr-2"></i>
                                    <span class="mr-1 font-bold">Adicionar Imagem</span>
                                </div>
                                <input type="file" id="file" name="file"
                                    class="w-full h-full top-0 left-0 absolute opacity-0">
                            </div>
                        </div>
                    </div>
                    @else
                    
                       <div class="col-span-12 xl:col-span-6"> 
                        <label class="form-label"><strong>Upload de Imagem</strong></label>
                        <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">
                            <div class="px-4 pt-24 pb-24 flex items-center justify-center cursor-pointer relative">
                                <div id="areaArquivo">
                                    <i data-feather="image" class="w-4 h-4 mr-2"></i>
                                    <span class="mr-1 font-bold">Adicionar Imagem</span>
                                </div>
                                <input type="file" id="file" name="file"
                                    class="w-full h-full top-0 left-0 absolute opacity-0">
                            </div>
                        </div>
                    </div>
                    @endif
                        </div>
                    </div>
                    <div class="intro-y box col-span-12 xxl:col-span-6">
                        <div class="flex mt-3 ml-0">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="cep">
                                    <strong>CEP</strong>
                                </label>
                                <input class="form-control" id="cep" name="cep" type="text"
                                 value="{{$empresa->cep}}"   placeholder="Cep do Aluno" onblur="pesquisacep(this.value);">
                            </div>

                        </div>
                        <div class="flex mt-3 ml-0">
                            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                <label for="rua" class="form-label"><strong>Rua</strong></label>
                                <input id="rua" type="text" name="rua" class="form-control"
                                   value="{{$empresa->rua}}" placeholder="Rua do aluno">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label for="numero" class="form-label"><strong>Número</strong></label>
                                <input id="numero" type="text" name="num" class="form-control"
                                  value="{{$empresa->numero}}"  placeholder="Núm do aluno">
                            </div>
                        </div>
                        <div class="mt-3 ml-3">
                            <label for="bairro" class="form-label"><strong>Bairro</strong></label>
                            <input id="bairro" type="text" name="bairro" class="form-control"
                              value="{{$empresa->bairro}}"  placeholder="Bairro do aluno">
                        </div>

                        <div class="p-5 mt-3 flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="uf" class="form-label"><strong>Estado</strong></label>
                                <div class="relative">
                                    <select class="form-control" name="uf" id="uf"
                                        onchange="buscarCidades()">
                                        <option value="{{$empresa->estado}}">{{$empresa->estado}}</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AM</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="MG">MG</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SP">SP</option>
                                        <option value="SE">SE</option>
                                        <option value="TO">TO</option>
                                    </select>
                                    <br><br>
                                </div>
                               
                            </div>
                            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                <label for="cidade" class="form-label"><strong>cidade</strong></label>
                                <input id="cidade" value="{{$empresa->cidade}}" type="text" name="cidade" class="form-control"
                                    placeholder="cidade da empresa">
                            </div>
                        </div>
                         

                        <div class="intro-y box col-span-12 xxl:col-span-12">
                            <button type="submit" class="btn btn-primary w-full  mr-2 mb-2"> <i data-feather="activity"
                                    class="w-4 h-4 mr-2"></i>
                                Editar Empresa </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
        <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
             <a href="javascript:;" id="introducao" data-theme="light" class="tooltip"  title="Texto de introdução da AET, altere conforme o necessário.">Introdução   <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Introdução</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Editar</th>
<th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             @if(isset($empresa->introducao))
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">1</td>
                                        <td class="border"><?=substr($empresa->introducao->introducao, 0, 200)?> </td>
                         
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-introducao', ['id' => $empresa->introducao->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>

                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-introducao', ['id' => $empresa->introducao->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                      
                                    </tr>
                             @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{route('form-introducao', ['empresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Introdução</a>
            </div>    
        </div>
    </div>

    
     <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
               <a href="javascript:;" id="objetivos" data-theme="light" class="tooltip"  title="Lista de Objetivos que apareceram na AET">Lista de Objetivos   <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Objetivo</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Editar</th>
<th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             
                                @foreach ($empresa->objetivos as $objetivo) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$objetivo->id}}</td>
                                        <td class="border"><?= $objetivo->objetivo ?></td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-objetivo', ['id' => $objetivo->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>

                                                                                
                                          <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-objetivo', ['id' => $objetivo->id])}}">
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
                <a href="{{route('form-objetivo', ['empresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Objetivos</a>
            </div>    
        </div>

    
  <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
              <a href="javascript:;" id="metodologia" data-theme="light" class="tooltip"  title="Texto de Metodologia utilizada na AET">Metodologia   <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Metodologia</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Editar</th>
<th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             @if(isset($empresa->metodologia))
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">1</td>
                                        <td class="border"><?= substr($empresa->metodologia->metodologia, 0, 200)?>... </td>
                         
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-metodologia', ['id' => $empresa->metodologia->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                          <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-metodologia', ['id' => $empresa->metodologia->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                    </tr>

                                    
                                      
                             @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{route('form-metodologia', ['empresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Metodologia</a>
            </div>    
        </div>
    </div>

    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
               <a href="javascript:;" id="demanda" data-theme="light" class="tooltip"  title="Demanda da Empresa perante a AET">Demanda   <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Demanda</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Editar</th>
<th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             @if(isset($empresa->demanda))
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">1</td>
                                        <td class="border"><?= substr($empresa->demanda->demanda, 0, 200)?>... </td>
                         
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-demanda', ['demanda' => $empresa->demanda->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>

                                         <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-demanda', ['id' => $empresa->demanda->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                      
                                      
                                    </tr>
                             @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{route('form-demanda', ['empresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Demanda</a>
            </div>    
        </div>
    </div>

    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                <a href="javascript:;" id="analise" data-theme="light" class="tooltip"  title="Ánalise Global da Empresa">Ánalise Global   <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Ánalise</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Editar</th>
<th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             @if(isset($empresa->analise))
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">1</td>
                                        <td class="border"><?= substr($empresa->analise->analise, 0, 200)?>... </td>
                         
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-analise-global', ['analise' => $empresa->analise->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                         <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-analise-global', ['id' => $empresa->analise->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                      
                                    </tr>
                             @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{route('form-analise-global', ['empresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Ánalise</a>
            </div>    
        </div>
    </div>
 <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                <a href="javascript:;" id="areas" data-theme="light" class="tooltip"  title="Adicione e Edite as Áreas Analisadas, EX: Fábrica, Administrativo etc">Lista de Áreas   <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Área</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Editar</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             
                                @foreach ($empresa->area as $area) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$area->id}}</td>
                                        <td class="border">{{$area->nome}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-areas', ['id' => $area->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>

                                         <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-areas', ['id' => $area->id])}}">
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
                <a href="{{route('form-areas', ['idempresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Área</a>
            </div>    
        </div>


     <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
               <a href="javascript:;" id="setores" data-theme="light" class="tooltip"  title="Adicione e Edite os Setores Analisados, EX: Fiação, Retifica etc">Lista de Setores   <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
            </h2>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12 xl:col-span-12">
                    <div class="overflow-x-auto">
                        <table class="table" id="sortable-table">
                            <thead>
                                <tr>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Nome</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Editar</th>
<th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody id="sortable-tbody">
                             
                                @foreach ($empresa->setores as $setor) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$setor->id}}</td>
                                        <td class="border">{{$setor->nome}}</td>
                                        <td class="border" style="display: none">{{$loop->index}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-setor', ['id' => $setor->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>

                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-setor', ['id' => $setor->id])}}">
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
                <a href="{{route('form-setores', ['idempresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Setor</a>
            </div>    
        </div>
<!-- Inclua a biblioteca Sortable -->


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<!-- Inicialize a ordenação -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obtenha a tabela e o tbody usando os IDs
        var table = document.getElementById('sortable-table');
        var tbody = document.getElementById('sortable-tbody');

        // Inicialize o Sortable
        var sortable = new Sortable(tbody, {
            animation: 150,
            ghostClass: 'bg-gray-300',
            onEnd: function (evt) {
                // Atualize os IDs após a ordenação
                updateIds();
                sendAjaxRequest();
            },
        });

        // Função para atualizar os IDs
        function updateIds() {
            var rows = tbody.getElementsByTagName('tr');

            // Atualize os IDs com base na nova ordem
            for (var i = 0; i < rows.length; i++) {
                var idCell = rows[i].getElementsByTagName('td')[3];
                idCell.textContent = i + 1; // Atualiza o ID
            }
        }
      
    // Função para enviar uma solicitação AJAX
        function sendAjaxRequest() {
            var rows = tbody.getElementsByTagName('tr');
            var data = [];

            // Construa um array de objetos com id e nome
            for (var i = 0; i < rows.length; i++) {
                var id = rows[i].getElementsByTagName('td')[0].textContent;
                var ordenacao = rows[i].getElementsByTagName('td')[3].textContent;
                data.push({ id: id, ordenacao: ordenacao });
            }
            console.log(data);
        

            axios.post('/alteracao/ordem/setor', { data: data,  _token: '{{ csrf_token() }}', })
                .then(function (response) {
                    console.log( response);
                })
                .catch(function (error) {
                    console.error('Erro ao enviar a solicitação', error);
                });
                
        }

        
    });
</script>
   {{-- <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Populaçao Setor
            </h2>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12 xl:col-span-12">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                   
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Idade Média</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Gênero</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Tempo de Empresa</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Escolaridade</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Editar</th>
<th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$idademedia}}</td>
                                        <td class="border">Masculino: {{$porcentagemmasculino}}<br> 
                                                           Feminino: {{100 - $porcentagemmasculino}} </td>
                                        <td class="border">{{$tempoadmissaomedio}}</td>
                                        <td class="border">Escolaridade Segundo grau:{{$porcentagemescolaridadesg}}</td>
                                        
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('form-populacao', ['empresa' => $empresa->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>

                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-areas', ['id' => $area->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                      
                                    </tr>
                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{route('form-populacao', ['empresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar População</a>
            </div>    
        </div>
    </div>
 --}}




    

    
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                 <a href="javascript:;" id="equipe" data-theme="light" class="tooltip"  title="Texto Sobre a Equipe Técnica Responsável">Equipe Técnica <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Equipe Técnica</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Editar</th>
<th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             @if(isset($empresa->equipe))
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">1</td>
                                        <td class="border">{{substr($empresa->equipe->equipe, 0, 200)}}... </td>
                         
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-equipe', ['id' => $empresa->equipe->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>

                                          <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-equipe', ['id' => $empresa->equipe->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                      
                                    </tr>
                             @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{route('form-equipe', ['empresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Equipe Técnica</a>
            </div>    
        </div>
    </div>


    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
             <a href="javascript:;" id="disposicoes" data-theme="light" class="tooltip"  title="Texto com as disposições finais da AET">Disposições Finais <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Disposições Finais</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Editar</th>
<th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             @if(isset($empresa->disposicao))
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">1</td>
                                        <td class="border">{{substr($empresa->disposicao->disposicao, 0, 200)}}... </td>
                         
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-disposicao', ['id' => $empresa->disposicao->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>

                                        
                                          <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-disposicao', ['id' => $empresa->disposicao->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                      
                                    </tr>
                             @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <a href="{{route('form-disposicao', ['empresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Disposições Finais</a>
            </div>    
        </div>
    </div>

        {{-- //Responsáveis --}}
     <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                <a href="javascript:;" id="reponsaveis" data-theme="light" class="tooltip"  title="Lista de Responsáveis Pela a AET">Lista de Responsáveis <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Nome</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Cargo</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Editar</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             
                                @foreach ($empresa->responsaveis as $responsavel) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$responsavel->id}}</td>
                                        <td class="border">{{$responsavel->nome}}</td>
                                        <td class="border">{{$responsavel->cargo}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-responsaveis', ['id' => $responsavel->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>

                                                                                                                       
                                          <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-responsaveis', ['id' => $responsavel->id])}}">
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
                <a href="{{route('form-responsaveis', ['id_empresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Responsável</a>
            </div>    
        </div>
   {{-- <style>
    table th, table td {
        max-width: 10px;
        overflow: hidden;
        text-overflow: ellipsis; /* Adiciona reticências (...) para indicar que o texto foi cortado */
        white-space: nowrap; /* Evita a quebra de texto */
    }
</style> --}}
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                <a href="javascript:;" data-theme="light" class="tooltip"  title="Cadastro de Mapeamento Ergonômico" id="mapeamento">Mapeamento Ergonômico <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
            </h2>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12 xl:col-span-12">
                    <div class="overflow-x-auto">
                        <table class="table" id="mapeamento_table">
                            <thead>
                                <tr>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap" >Editar</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Área</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Setor</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Posto Trabalho</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Função</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Postura</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Atividade</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Exigência da Atividade</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Sobrecarga</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Classificação</th>
                                    
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Excluir</th>
                            </thead>
                            <tbody>
                             
                                @foreach ($empresa->mapeamento as $mapeamento) 
                                    <tr class="hover:bg-gray-200" >
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-mapeamento', ['id' => $mapeamento->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                        <td class="border" style="display: none" id="id">{{$mapeamento->id}}</td>
                                        <td class="border">{{$mapeamento->area}}</td>
                                        <td class="border">{{$mapeamento->setor}}</td>
                                        <td class="border">{{$mapeamento->posto_trabalho}}</td>
                                        <td class="border">{{$mapeamento->funcao}}</td>
                                        <td class="border" id="postura"><input type="text"  value="{{$mapeamento->postura}}" > </td>
                                        <td class="border">{{$mapeamento->atividade}}</td>
                                        <td class="border" id="exigenciam"><input type="text"  value="{{$mapeamento->exigencia}}"></td>
                                        <td class="border" id="sobrecarga"><input type="text"  value="{{$mapeamento->sobrecarga}}"></td>
                                        <td class="border" id="classificacao{{$loop->index}}">{{$mapeamento->classificacao}}</td>
                                    
                                         <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-mapeamento', ['id' => $mapeamento->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                    </tr>
                                    <script> classificacao('{{$mapeamento->classificacao}}', '{{$loop->index}}'); </script>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- Add this script at the end of your HTML body or in the head section -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all input fields with id "postura," "exigencia," and "sobrecarga"
        var posturaInput = document.querySelectorAll('#postura input');
        var exigenciamInput = document.querySelectorAll('#exigenciam input');
        var sobrecargaInput = document.querySelectorAll('#sobrecarga input');

        // Add event listeners to each input field
        posturaInput.forEach(function (input) {
            input.addEventListener('input', function () {
                  showAlert(input, 'postura');
            });
        });

        exigenciamInput.forEach(function (input) {
            input.addEventListener('input', function () {
                showAlert(input, 'exigenciam');
            });
        });

        sobrecargaInput.forEach(function (input) {
            input.addEventListener('input', function () {
                showAlert(input, 'sobrecarga');
            });
        });

        // Function to show an alert with the id attribute and field value
        function showAlert(input, fieldName) {
            // Get the closest <tr> element (parent of the input)
            var closestTr = input.closest('tr');

            // Get the value of the "id" cell in the same row
            var mapeamentoId = closestTr.querySelector('#id').textContent;

            // Get the value of the input field
            var fieldValue = input.value;
             //alert('Mapeamento ID: ' + mapeamentoId + '\n' + fieldName + ': ' + fieldValue);
            axios.post('/alteracao/mapeamento', { id: mapeamentoId, valor: fieldValue, campo: fieldName, _token: '{{ csrf_token() }}', })
                .then(function (response) {
                    console.log( response);
                })
                .catch(function (error) {
                    console.error('Erro ao enviar a solicitação', error);
                });
            
           
        }
    });
</script>

            <div class="flex justify-end mt-4">
                <a href="{{route('form-mapeamento', ['empresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar/Atualizar Mapeamento Via Planilha</a>
            </div>    
           

             <div class="flex justify-end mt-4">
                <a href="{{route('form-mapeamento-campos', ['empresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Mapeamento Campo a Campo</a>
            </div> 

            {{-- <div class="flex justify-end mt-4">
                <a href="{{route('gerar-mapeamento', ['empresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Gerar Mapeamento Com Base No Relatório</a>
            </div>     --}}
        </div>


     <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                <a href="javascript:;" data-theme="light" class="tooltip"  title="Cadastro de Plano de Ação" id="plano">Plano de Ação <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
            </h2>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12 xl:col-span-12">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                     <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Editar</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Área</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Setor</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Posto Trabalho</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Função</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Exigência da Atividade</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Melhoria</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Viabilidade</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Prazo</th>
                                   
                                    
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Excluir</th>
                            </thead>
                            <tbody>
                             
                                @foreach ($empresa->planodeacao as $plano) 
                                    <tr class="hover:bg-gray-200">
                                          <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-plano-de-acao', ['id' => $plano->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                        <td id="id" style="display:none">{{$plano->id}}</td>
                                        <td class="border">{{$plano->area}}</td>
                                        <td class="border">{{$plano->setor}}</td>
                                        <td class="border">{{$plano->posto_trabalho}}</td>
                                        <td class="border">{{$plano->funcao}}</td>
                                        <td class="border" id="exigencia"><input type="text"  value="{{$plano->exigencia}}"></td>
                                        <td class="border" id="recomendacao"><input type="text"  value="{{$plano->recomendacao}}"></td>
                                        <td class="border" id="viabilidade"><input type="text"  value="{{$plano->viabilidade}}"></td>
                                        <td class="border" id="prazo"><input type="text"  value="{{$plano->prazo}}"></td>
                                   
                                         <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-plano-de-acao', ['id' => $plano->id])}}">
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
                <a href="{{route('form-plano-de-acao', ['empresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar/Atualizar Plano de Ação via Planilha</a>
            </div>    
             <button class="btn btn-primary mr-auto mb-2" onclick="exportToExcel()">Exportar para Excel</button>
            <div class="flex justify-end mt-4">
            
                <a href="{{route('form-plano-de-acao-campos', ['empresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Plano de Ação campo a campo</a>
            </div>  


    <div class="intro-y box mt-5" style="display: none">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                <a href="javascript:;" data-theme="light" class="tooltip"  title="Cadastro de Plano de Ação" id="">Plano de Ação <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
            </h2>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12 xl:col-span-12">
                    <div class="overflow-x-auto">
                        <table class="table" id="plano_de_acao_exportacao">
                            <thead>
                                <tr>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Área</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Setor</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Posto Trabalho</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Função</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Exigência da Atividade</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Melhoria</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Viabilidade</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Prazo</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Data</th>
                            </thead>
                            <tbody>
                             
                                @foreach ($empresa->planodeacao as $plano) 
                                    <tr class="hover:bg-gray-200">
                                        
                                        <td class="border">{{$plano->area}}</td>
                                        <td class="border">{{$plano->setor}}</td>
                                        <td class="border">{{$plano->posto_trabalho}}</td>
                                        <td class="border">{{$plano->funcao}}</td>
                                        <td class="border" id="">{{$plano->exigencia}}"</td>
                                        <td class="border" id="">{{$plano->recomendacao}}"</td>
                                        <td class="border" id="">{{$plano->viabilidade}}"</td>
                                        <td class="border" id="">{{$plano->prazo}}"</td>
                                        <td class="border"></td>
                                    </tr>
                                    
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

{{--             
            <div class="flex justify-end mt-4">
                <a href="{{route('gerar-plano-de-acao', ['empresa' => $empresa->id])}}" class="btn btn-primary mr-auto mb-2">Gerar  Plano de Ação Com Base No Relatório</a>
            </div>  --}}
        </div>

        <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all input fields with id "exigencia," "recomendacao," "viabilidade," and "prazo"
        var exigenciaInput = document.querySelectorAll('#exigencia input');
        var recomendacaoInput = document.querySelectorAll('#recomendacao input');
        var viabilidadeInput = document.querySelectorAll('#viabilidade input');
        var prazoInput = document.querySelectorAll('#prazo input');

        // Add event listeners to each input field
        exigenciaInput.forEach(function (input) {
            input.addEventListener('input', function () {
                showAlert(input, 'exigencia');
            });
        });

        recomendacaoInput.forEach(function (input) {
            input.addEventListener('input', function () {
                showAlert(input, 'recomendacao');
            });
        });

        viabilidadeInput.forEach(function (input) {
            input.addEventListener('input', function () {
                showAlert(input, 'viabilidade');
            });
        });

        prazoInput.forEach(function (input) {
            input.addEventListener('input', function () {
                showAlert(input, 'prazo');
            });
        });

        // Function to show an alert with the id attribute and field value
        function showAlert(input, fieldName) {
            // Get the closest <tr> element (parent of the input)
            var closestTr = input.closest('tr');

            // Get the value of the "id" cell in the same row
            var planoId = closestTr.querySelector('#id').textContent;

            // Get the value of the input field
            var fieldValue = input.value;

            // Show an alert with the planoId and fieldValue
           // alert('Plano ID: ' + planoId + '\n' + fieldName + ': ' + fieldValue);
                 axios.post('/alteracao/plano', { id: planoId, valor: fieldValue, campo: fieldName, _token: '{{ csrf_token() }}', })
                .then(function (response) {
                    console.log( response);
                })
                .catch(function (error) {
                    console.error('Erro ao enviar a solicitação', error);
                });
            
        }
    });
</script>

     @if (session()->get('message') == 'erro_planilha_plano')
       <!-- BEGIN: Notification With Buttons Below -->
                        <div class="intro-y box mt-5">

                            <div id="notification-with-buttons-below" class="p-5">
                                <div class="preview">
                                    <div class="text-center">
                                        <!-- BEGIN: Notification Content -->
                                        <div id="notification-with-buttons-below-content" class="toastify-content hidden flex">
                                            <i data-feather="file-text"></i> 
                                            <div class="ml-4 mr-5 sm:mr-20">
                                                <div class="font-medium">Upload de Planilha Incorreto</div>
                                                <div class="text-slate-500 mt-1">Lembre de seguir o modelo, e fazer o upload em .CSV</div>
                                                <div class="mt-2.5"> <a class="btn btn-primary py-1 px-2 mr-2" href="">Ver Planilha Modelo</a></div>
                                            </div>
                                        </div>

                                        <button id="notification-with-buttons-below-toggle" class="btn btn-primary" style="display: none">Abrir Notificação</button>

                                        <script>
                                            // Use JavaScript para encontrar o botão pelo ID e disparar um evento de clique
                                            document.addEventListener("DOMContentLoaded", function () {
                                                var botao = document.getElementById("notification-with-buttons-below-toggle");
                                                if (botao) {
                                                    botao.click(); // Clique no botão automaticamente
                                                }
                                            });
                                        </script>
                                                                            
                                    </div>
                                </div>
                              
                            </div>
                        </div>
            @endif

  @if (session()->get('message') == 'erro_planilha_mapeamento')
       <!-- BEGIN: Notification With Buttons Below -->
                        <div class="intro-y box mt-5">

                            <div id="notification-with-buttons-below" class="p-5">
                                <div class="preview">
                                    <div class="text-center">
                                        <!-- BEGIN: Notification Content -->
                                        <div id="notification-with-buttons-below-content" class="toastify-content hidden flex">
                                            <i data-feather="file-text"></i> 
                                            <div class="ml-4 mr-5 sm:mr-20">
                                                <div class="font-medium">Upload de Planilha Incorreto</div>
                                                <div class="text-slate-500 mt-1">Lembre de seguir o modelo, e fazer o upload em .CSV</div>
                                                <div class="mt-2.5"> <a class="btn btn-primary py-1 px-2 mr-2" href="">Ver Planilha Modelo</a></div>
                                            </div>
                                        </div>

                                        <button id="notification-with-buttons-below-toggle" class="btn btn-primary" style="display: none">Abrir Notificação</button>

                                        <script>
                                            // Use JavaScript para encontrar o botão pelo ID e disparar um evento de clique
                                            document.addEventListener("DOMContentLoaded", function () {
                                                var botao = document.getElementById("notification-with-buttons-below-toggle");
                                                if (botao) {
                                                    botao.click(); // Clique no botão automaticamente
                                                }
                                            });
                                        </script>
                                                                            
                                    </div>
                                </div>
                              
                            </div>
                        </div>
            @endif

@endsection
@push('custom-scripts')

    <script>
        $(document).ready(function() {

            $("#cpf").bind('paste', function(e) {
                e.preventDefault();
            });

        });
    </script>
    <script>
        (function(cash) {
            document.getElementById('file').onchange = function() {
                var arquivo = document.getElementById('file').value;
                var nomearquivo = arquivo.substring(12);
                var modeloArquivo =
                    '<div class="file box rounded-md px-5 sm:px-5 relative zoom-in">' +
                    '<p class="w-1/5 file__icon file__icon--file mx-auto">' +
                    '</p>' +
                    '<p class="block font-medium mt-4 text-center truncate">' + nomearquivo + '</p>' +
                    '</div>';
                cash('#areaArquivo').html(modeloArquivo);
            }
        })(cash);
    </script>

    <!-- Adicionando Javascript -->
    <script>

    function exportToExcel() {
    const table = document.querySelector('#plano_de_acao_exportacao');
    console.log(table); // Verifique se a tabela está sendo selecionada corretamente

    const wb = XLSX.utils.book_new();
    const ws = XLSX.utils.table_to_sheet(table);

    XLSX.utils.book_append_sheet(wb, ws, 'Planilha1');
    XLSX.writeFile(wb, 'planodeacao.xlsx');
}
        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('uf').value = ("");
            document.getElementById('ibge').value = ("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('uf').value = (conteudo.uf);
                document.getElementById('ibge').value = (conteudo.ibge);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('uf').value = "...";
 

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
    </script>

         <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>  <!--Script do iconify-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
     
        
        <!-- END: JS Assets-->
    </body>
</html>
@php 
$secao = session('secao');
@endphp
@if (isset($secao))
   
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Encontrar o elemento com o ID 'caracteristicas-section'
        var caracteristicasSection = document.getElementById("{{$secao}}");
 
        // Rolagem suave até a seção de características
        if (caracteristicasSection) {
            caracteristicasSection.scrollIntoView({ behavior: 'smooth' });
        } 
    });


  
</script>
@endif


@endpush