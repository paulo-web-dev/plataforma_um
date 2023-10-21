@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Informação Posto de Trabalho
            </h2>
              <a href="{{ route('info-setor',  ['id' => $subsetor->id_setor]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('upd-subsetor') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                   <input type="hidden" name="id" value="{{$subsetor->id}}">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Nome</strong></label>
                            <input id="update-profile-form-7" type="text" name="nome" class="form-control"
                                placeholder="Nome do SubSetor" value="{{$subsetor->nome}}">
                        </div>

                        <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong>Descrição de Tarefa</strong></label>
                            <textarea class="form-control editor" name="descricao" id="descricao" cols="30" rows="15">{{$subsetor->descricao}}</textarea>
                        </div>
                   
                         {{-- <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong>Descrição do SubSetor</strong></label>
                            <textarea class="form-control editor" name="descricao" id="descricao" cols="30" rows="15">{{$subsetor->descricao}}</textarea>
                        </div> --}}
                    
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Atualizar Posto de Trabalho</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END: Personal Information -->
    <!-- END: Users Layout -->
    </div>


    <!-- Lista de Cargos -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Lista de Fotos da Atividade
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Foto</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             
                                @foreach ($subsetor->fotosatividade as $foto) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$foto->id}}</td>
                                        <td class="border" style="max-width: 100px; max-height: 40px;" ><img src="/fotos-atividades/{{$foto->photo}}" ></td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-foto', ['foto' => $foto->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Excluir
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
                <a href="{{route('form-foto', ['id_subsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Fotos</a>
            </div>    
        </div>
    </div>

     <!-- Lista de Dados Organizacionais -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Lista de Características do Trabalho
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Características do Trabalho</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             
                                @foreach ($subsetor->dadosOrganizacionais as $dados) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$dados->id}}</td>
                                        <td class="border">{{$dados->dado}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-dadosorganizacionais', ['id' => $dados->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
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
                <a href="{{route('form-dadosorganizacionais', ['idsubsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Características do Trabalho</a>
            </div>    
        </div>
    </div>

     <!-- Lista de Dados Organizacionais -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Lista de Recomendações Técnicas
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Recomendacao</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                   
                                </tr>
                            </thead>
                            <tbody> 
                             
                                @foreach ($subsetor->recomendacao as $recomendacao) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$recomendacao->id}}</td>
                                        <td class="border">{{$recomendacao->recomendacao}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-recomendacao', ['id' => $recomendacao->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
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
                <a href="{{route('form-recomendacao', ['id_subsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Recomendações Técnicas</a>
            </div>    
        </div>
    </div>

  <!-- Lista de Dados Moore e garg -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Lista de Moore e Garg
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Atividade</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Conclusão</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             
                                @foreach ($subsetor->moore as $moore) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$moore->id}}</td>
                                        <td class="border">{{$moore->atividade}}</td>
                                        <td class="border" id="conclusaomoore{{$loop->index}}"></td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-moore', ['id' => $moore->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                          <script>         
         
                            mooregarg({{$moore->fit}},{{$moore->fde}},{{$moore->ffe}},{{$moore->fpmp}},{{$moore->fri}},{{$moore->fdt}}, {{$loop->index}});
                                
                        </script>

                                    </tr>
                                @endforeach 
                                    @foreach ($subsetor->conclusoes as $conclusao) 
                                     @if($conclusao->ferramenta == 'Moore e Garg')
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$conclusao->id}}</td>
                                        <td class="border">{{$conclusao->atividade}}</td>
                                        <td class="border">{{$conclusao->conclusao}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-conclusao', ['conclusao' => $conclusao->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                    </tr>
                                 @endif
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
            <div class="flex justify-end mt-4">
                <a href="{{route('form-moore', ['idsubsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Dados Moore e Garg Completo</a>
                <a href="{{route('form-conclusao', ['idsubsetor' => $subsetor->id, 'ferramenta' => 'Moore e Garg'])}}" class="btn btn-primary mr-auto mb-2 simplificado">Cadastrar Dados Moore e Garg Simplificado</a>
            </div>    
        </div>
    </div>


    <!-- Lista de Dados Rula -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Lista de Rula
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Atividade</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Conclusão</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                   
                                </tr>
                            </thead>
                            <tbody> 
                             
                                @foreach ($subsetor->rula as $rula) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$rula->id}}</td>
                                        <td class="border">{{$rula->atividade}}</td>
                                        <td class="border" id="conclusaorula{{$loop->index}}"></td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-rula', ['id' => $rula->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                          <script>         
         
                           rula({{$rula->braco}},{{$rula->braco_desvio}},{{$rula->antebraco}},{{$rula->antebraco_desvio}}, {{$rula->punho}}, {{$rula->punho_desvio}}, {{$rula->pescoco}},{{$rula->pescoco_desvio}},{{$rula->tronco}},{{$rula->tronco_desvio}}, {{$rula->perna}}, {{$loop->index}});
                                
                        </script>

                                    </tr>
                                @endforeach
                                 @foreach ($subsetor->conclusoes as $conclusao) 
                                     @if($conclusao->ferramenta == 'Rula')
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$conclusao->id}}</td>
                                        <td class="border">{{$conclusao->atividade}}</td>
                                        <td class="border">{{$conclusao->conclusao}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-conclusao', ['conclusao' => $conclusao->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                    </tr>
                                 @endif
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
            <div class="flex justify-end mt-4">
                <a href="{{route('form-rula', ['idsubsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Dados Rula</a>
                <a href="{{route('form-conclusao', ['idsubsetor' => $subsetor->id, 'ferramenta' => 'Rula'])}}" class="btn btn-primary mr-auto mb-2 simplificado">Cadastrar Dados Rula Simplificado</a>
            </div>    
        </div>
    </div>



    <!-- Lista de OWAS -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Lista de OWAS
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Atividade</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Conclusão</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                   
                                </tr>
                            </thead>
                            <tbody> 
                             
                                @foreach ($subsetor->owas as $owas) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$owas->id}}</td>
                                        <td class="border">{{$owas->atividade}}</td>
                                        <td class="border" id="conclusaoowas{{$loop->index}}"></td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-owas', ['id' => $owas->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                      
                          <script>         

                          owas({{$owas->dorso}},{{$owas->braco}}, {{$owas->pernas}}, {{$owas->carga}}, {{$loop->index}});
                                
                        </script>

                                    </tr>
                                @endforeach 
                              @foreach ($subsetor->conclusoes as $conclusao) 
                                     @if($conclusao->ferramenta == 'OWAS')
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$conclusao->id}}</td>
                                        <td class="border">{{$conclusao->atividade}}</td>
                                        <td class="border">{{$conclusao->conclusao}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-conclusao', ['conclusao' => $conclusao->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                    </tr>
                                 @endif
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
            <div class="flex justify-end mt-4">
                <a href="{{route('form-owas', ['idsubsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Dados owas</a>
                <a href="{{route('form-conclusao', ['idsubsetor' => $subsetor->id, 'ferramenta' => 'OWAS'])}}" class="btn btn-primary mr-auto mb-2 simplificado">Cadastrar Dados OWAS Simplificado</a>
            </div>    
        </div>
    </div>


    
    <!-- Lista de Sue Rodgers -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Lista de Sue Rodgers
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Atividade</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Conclusão</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                   
                                </tr>
                            </thead>
                            <tbody> 
                             
                                @foreach ($subsetor->suerodgers as $sue) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$sue->id}}</td>
                                        <td class="border">{{$sue->atividade}}</td>
                                        <td class="border" id="conclusaosue{{$loop->index}}"></td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-suerodgers', ['id' => $sue->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                      
                          <script>         

                          suerodgers(['Pescoço -{{$sue->pescoco}}', 'Ombros -{{$sue->ombro}}', 'Tronco -{{$sue->tronco}}', 'Braco -{{$sue->braco}}', 'Mãos -{{$sue->mao_punho_dedo}}', 'Pernas -{{$sue->perna_pe_dedo}}' ], {{$loop->index}} );
                                
                        </script>

                                    </tr>
                                @endforeach 
                             @foreach ($subsetor->conclusoes as $conclusao) 
                                     @if($conclusao->ferramenta == 'Sue Rodgers')
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$conclusao->id}}</td>
                                        <td class="border">{{$conclusao->atividade}}</td>
                                        <td class="border">{{$conclusao->conclusao}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-conclusao', ['conclusao' => $conclusao->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                    </tr>
                                 @endif
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
            <div class="flex justify-end mt-4">
                <a href="{{route('form-suerodgers', ['idsubsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Sue Rodgers</a>
                <a href="{{route('form-conclusao', ['idsubsetor' => $subsetor->id, 'ferramenta' => 'Sue Rodgers'])}}" class="btn btn-primary mr-auto mb-2 simplificado">Cadastrar Dados Sue Rodgers Simplificado</a>
            </div>    
        </div>
    </div>


   <!-- Lista de NIOSH -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Lista de NIOSH
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Atividade</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Conclusão</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                   
                                </tr>
                            </thead>
                            <tbody> 
                             
                                @foreach ($subsetor->niosh as $niosh) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$niosh->id}}</td>
                                        <td class="border">{{$niosh->atividade}}</td>
                                        <td class="border" id="conclusaoniosh{{$loop->index}}"></td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-niosh', ['id' => $niosh->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                      
                          <script>         

                            niosh({{$niosh->fdh}}, {{$niosh->fav}}, {{$niosh->fdc}}, {{$niosh->frlt}}, {{$niosh->ffl}}, {{$niosh->fqpc}}, {{$niosh->peso}}, {{$loop->index}});
                                
                        </script>

                                    </tr>
                                @endforeach 
                                  @foreach ($subsetor->conclusoes as $conclusao) 
                                     @if($conclusao->ferramenta == 'NIOSH')
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$conclusao->id}}</td>
                                        <td class="border">{{$conclusao->atividade}}</td>
                                        <td class="border">{{$conclusao->conclusao}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-conclusao', ['conclusao' => $conclusao->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                    </tr>
                                 @endif
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
            <div class="flex justify-end mt-4">
                <a href="{{route('form-niosh', ['idsubsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Dados NIOSH</a>
                <a href="{{route('form-conclusao', ['idsubsetor' => $subsetor->id, 'ferramenta' => 'NIOSH'])}}" class="btn btn-primary mr-auto mb-2 simplificado">Cadastrar Dados Niosh Simplificado</a>
            </div>    
        </div>
    </div>


       <!-- Lista de OCRA -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Lista de OCRA
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Atividade</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Conclusão</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                   
                                </tr>
                            </thead>
                            <tbody> 

                                  @foreach ($subsetor->conclusoes as $conclusao) 
                                     @if($conclusao->ferramenta == 'OCRA')
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$conclusao->id}}</td>
                                        <td class="border">{{$conclusao->atividade}}</td>
                                        <td class="border">{{$conclusao->conclusao}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-conclusao', ['conclusao' => $conclusao->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                    </tr>
                                 @endif
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
            <div class="flex justify-end mt-4">
                <a href="{{route('form-conclusao', ['idsubsetor' => $subsetor->id, 'ferramenta' => 'OCRA'])}}" class="btn btn-primary mr-auto mb-2 simplificado">Cadastrar Dados OCRA Simplificado</a>
            </div>    
        </div>
    </div>
      <!-- Lista de OCRA -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Lista de Dados de Saúde
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Sim</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Não</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                   
                                </tr>
                            </thead>
                            <tbody> 

                                  @foreach ($subsetor->dadossaude as $dado) 
                                  
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$dado->id}}</td>
                                        <td class="border">{{$dado->sim}}</td>
                                        <td class="border">{{$dado->nao}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-dados-de-saude', ['dado' => $dado->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
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
                <a href="{{route('form-dados-de-saude', ['idsubsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2 simplificado">Cadastrar Dados de Saúde</a>
            </div>    
        </div>
    </div>
     <!-- Lista de Caracteristicas -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Lista de Caracteristicas do Ambiente de trabalho
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Titulo</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Descrição</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             
                                @foreach ($subsetor->caracteristicas as $caracteristica) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$caracteristica->id}}</td>
                                        <td class="border">{{$caracteristica->titulo}}</td>
                                         <td class="border">{{$caracteristica->descricao}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-caracteristicas', ['id' => $caracteristica->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
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
                <a href="{{route('form-caracteristicas', ['idsubsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Caracteristicas</a>
            </div>    
        </div>
    </div>


       <!-- Lista de Pré Diasgnosticos -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Lista de Pré Diagnosticos 
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Titulo</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Descrição</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             
                                @foreach ($subsetor->preDiagnostico as $prediagnostico) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$prediagnostico->id}}</td>
                                        <td class="border">{{$prediagnostico->titulo}}</td>
                                         <td class="border">{{$prediagnostico->descricao}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-pre-diagnosticos', ['id' => $prediagnostico->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
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
                <a href="{{route('form-pre-diagnosticos', ['idsubsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Pré Diagnostico</a>
            </div>    
        </div>
    </div>

     <!-- Lista de População -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Lista de População 
            </h2>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12 xl:col-span-12">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Nome</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Idade</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Sexo</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Escolaridade</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Tempo de Empresa</th>
                         
                                   
                                </tr>
                            </thead>
                            <tbody>
                             
                                @foreach ($subsetor->populacaosubsetor as $populacao) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$populacao->nome}}</td>
                                        <td class="border">{{$populacao->idade}}</td>
                                        <td class="border">{{$populacao->sexo}}</td>
                                        <td class="border">{{$populacao->escolaridade}}</td>
                                        <td class="border">{{$populacao->tempo_empresa}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-populacao-subsetor', ['id' => $populacao->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
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
                <a href="{{route('form-populacao-subsetor', ['id_subsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Adicionar População</a>
            </div>    
        </div>
    </div>



@endsection

@push('custom-scripts')





@endpush
