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
                            <label for="update-profile-form-7" class="form-label"><strong>Posto de Trabalho</strong></label>
                            <input id="update-profile-form-7" type="text" name="nome" class="form-control"
                                placeholder="Nome do SubSetor" value="{{$subsetor->nome}}">
                        </div>

                         <div class="mt-6">
                            <label for="conteudo" class="form-label">Descrição da Tarefa</label>
                            <div class="mt-2">
                                <textarea class="form-control editor" name="descricao" id="editor" cols="30" rows="15">{{$subsetor->descricao}}</textarea>
                            </div>
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


  <!-- Lista de Função -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                <a href="javascript:;" data-theme="light" class="tooltip"  title="Função que o trabalhador exerce. Ex: Retificador C">Função<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Função</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             
                                @if (isset($subsetor->funcao))
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$subsetor->funcao->id}}</td>
                                        <td class="border">{{$subsetor->funcao->funcao}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-funcao', ['id' => $subsetor->funcao->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>

                                               <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                   href="{{route('delete-funcao', ['id' => $subsetor->funcao->id])}}">
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
                <a href="{{route('form-funcao', ['id_subsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Função</a>
            </div>    
        </div>
    </div>
    
     <!-- Lista de Tarefa -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
              <a href="javascript:;" data-theme="light" class="tooltip"  title="Tarefa Exercida pelo Funcionario">Lista de Tarefa<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Tarefa</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             
                                @if (isset($subsetor->tarefa))
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$subsetor->tarefa->id}}</td>
                                        <td class="border">{{$subsetor->tarefa->tarefa}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-tarefa', ['id' => $subsetor->tarefa->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                           <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                     href="{{route('delete-tarefa', ['id' => $subsetor->tarefa->id])}}">
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
                <a href="{{route('form-tarefa', ['id_subsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Tarefa</a>
            </div>    
        </div>
    </div>

     <!-- Lista de Ánalise de Atividade -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                <a href="javascript:;" data-theme="light" class="tooltip"  title="Texto da Ánalise da Atividade">Lista de Ánalise de Atividade<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a> 
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             
                                @if (isset($subsetor->analiseAtividade))
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$subsetor->analiseAtividade->id}}</td>
                                        <td class="border"><?= $subsetor->analiseAtividade->analise ?></td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-analise-de-atividade', ['id' => $subsetor->analiseAtividade->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                         <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                      href="{{route('delete-analise-de-atividade', ['id' => $subsetor->analiseAtividade->id])}}">
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
                <a href="{{route('form-analise-de-atividade', ['id_subsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Ánalise de Atividade</a>
            </div>    
        </div>
    </div>

    <!-- Lista de Fotos -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                <a href="javascript:;" data-theme="light" class="tooltip"  title="Faça o Upload das fotos da atividade">Lista de Fotos da Atividade<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a> 
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
                <a href="{{route('form-foto', ['id_subsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Fotos</a>
            </div>    
        </div>
    </div>

    <!-- Lista de Descrição de Fotos -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                <a href="javascript:;" data-theme="light" class="tooltip"  title="Descrição que fica embaixo das fotos">Lista de Descricação de Fotos<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a> 
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Descrição</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                             
                                @if (isset($subsetor->descricaoFotos))
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$subsetor->descricaoFotos->id}}</td>
                                        <td class="border">{{$subsetor->descricaoFotos->descricao}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-descricao-foto', ['id' => $subsetor->descricaoFotos->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>

                                               <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                   href="{{route('delete-descricao-foto', ['id' => $subsetor->descricaoFotos->id])}}">
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
                <a href="{{route('form-descricao-foto', ['id_subsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Descrição de Fotos</a>
            </div>    
        </div>
    </div>
    

     <!-- Lista de Dados Organizacionais -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                 <a href="javascript:;" data-theme="light" class="tooltip"  title="Adicione as Características da Organização do Trabalho">Lista de Características da Organização do Trabalho<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a> 
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Editar</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
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

                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-dadosorganizacionais', ['id' => $dados->id])}}">
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
                <a href="{{route('form-dadosorganizacionais', ['idsubsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Características do Trabalho</a>
            </div>    
        </div>
    </div>
 <!-- Lista de População -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                 <a href="javascript:;" data-theme="light" class="tooltip"  title="Lista de dados da População">Lista de População<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a> 
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Editar</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                         
                                   
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
                                               <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-populacao-subsetor', ['id' => $populacao->id])}}">
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
                <a href="{{route('form-populacao-subsetor', ['id_subsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Adicionar População Via Planilha</a> 
                <a href="{{route('form-populacao-subsetor-campos', ['id_subsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Adicionar População Campo a Campo</a>
            </div>    
        </div>
    </div>
    <!-- Lista de Dados de Saúde -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
               <a href="javascript:;" data-theme="light" class="tooltip"  title="Lista de dados de Dados de Saúde">Lista de Dados de Saúde<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a> 
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Título</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Sim</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Não</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody> 

                                  @if(isset($subsetor->dadossaude)) 
                                  
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$subsetor->dadossaude->id}}</td>
                                        <td class="border">{{$subsetor->dadossaude->titulo}}</td>
                                        <td class="border">{{$subsetor->dadossaude->sim}}</td>
                                        <td class="border">{{$subsetor->dadossaude->nao}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-dados-de-saude', ['dado' => $subsetor->dadossaude->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                           <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-dados-de-saude', ['id' => $subsetor->dadossaude->id])}}">
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
           @if(!isset($subsetor->dadossaude))
            <div class="flex justify-end mt-4">
                <a href="{{route('form-dados-de-saude', ['idsubsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2 simplificado">Cadastrar Dados de Saúde</a>
            </div>   
            @endif 
        </div>
    </div>

    
      
     <!-- Lista de Caracteristicas -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                 <a href="javascript:;" data-theme="light" class="tooltip"  title="Lista de Caracteristicas do Ambiente de trabalho">Lista de Caracteristicas do Ambiente de trabalho<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a> 
                
            </h2>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12 xl:col-span-12">
                    <div class="overflow-x-auto">
                        <table class="table" id="sortable-table-ambiente">
                            <thead>
                                <tr>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Titulo</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Descrição</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody  id="sortable-tbody-ambiente">
                             
                                @foreach ($subsetor->caracteristicas as $caracteristica) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$caracteristica->id}}</td>
                                        <td class="border">{{$caracteristica->titulo}}</td>
                                        <td class="border" style="display: none">{{$loop->index}}</td>
                                         <td class="border">{{$caracteristica->descricao}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-caracteristicas', ['id' => $caracteristica->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>

                                               <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                      href="{{route('delete-caracteristicas', ['id' => $caracteristica->id])}}">
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
                <a href="{{route('form-caracteristicas', ['idsubsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Caracteristicas</a>
            </div>    
        </div>
    </div>

<!-- Inclua a biblioteca Sortable -->


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<!-- Inicialize a ordenação -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obtenha a tabela e o tbody usando os IDs
        var table = document.getElementById('sortable-table-ambiente');
        var tbody = document.getElementById('sortable-tbody-ambiente');

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
        

            axios.post('/alteracao/ordem/ambiente', { data: data,  _token: '{{ csrf_token() }}', })
                .then(function (response) {
                    console.log( response);
                })
                .catch(function (error) {
                    console.error('Erro ao enviar a solicitação', error);
                });
                
        }

        
    });
</script>
  <!-- Lista de Pré Diasgnosticos -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                <a href="javascript:;" data-theme="light" class="tooltip"  title="Adicionar Pré Diagnosticos do Posto de Trabalho">Lista de Pré Diagnosticos<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
                 
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
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
                                               <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-pre-diagnosticos', ['id' => $prediagnostico->id])}}">
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
                <a href="{{route('form-pre-diagnosticos', ['idsubsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Pré Diagnostico</a>
            </div>    
        </div>
    </div>

    

   
  <!-- Lista de Dados Moore e garg -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
            <a href="javascript:;" data-theme="light" class="tooltip"  title="Adicionar Avaliação Moore e Garg">Lista de Moore e Garg<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
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

                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-moore', ['id' => $moore->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
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

                                         <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-conclusao', ['conclusao' => $conclusao->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
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
            <a href="javascript:;" data-theme="light" class="tooltip"  title="Adicionar Avaliação Rula">Lista de Rula<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
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

                                           <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-rula', ['id' => $rula->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
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
                                               <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                     href="{{route('delete-conclusao', ['conclusao' => $conclusao->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
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
             <a href="javascript:;" data-theme="light" class="tooltip"  title="Adicionar Avaliação OWAS">Lista de OWAS<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
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
                                           <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-owas', ['id' => $owas->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
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
                                           <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-conclusao', ['conclusao' => $conclusao->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
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
             <a href="javascript:;" data-theme="light" class="tooltip"  title="Adicionar Avaliação Sue Rodgers">Lista de Sue Rodgers<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
         
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Membro</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
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
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-sue', ['id' => $sue->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
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
                                        <td class="border">{{$conclusao->membro}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-conclusao', ['conclusao' => $conclusao->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>
                                           <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-conclusao', ['conclusao' => $conclusao->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
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
               <a href="javascript:;" data-theme="light" class="tooltip"  title="Adicionar Avaliação NIOSH">Lista de NIOSH<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
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
                                           <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                     href="{{route('delete-niosh', ['id' => $niosh->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
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
                                               <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                     href="{{route('delete-conclusao', ['conclusao' => $conclusao->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
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
                <a href="javascript:;" data-theme="light" class="tooltip"  title="Adicionar Avaliação OCRA">Lista de OCRA<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
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
                                           <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-conclusao', ['conclusao' => $conclusao->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
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
    
       <!-- Lista de Rosa -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                <a href="javascript:;" data-theme="light" class="tooltip"  title="Adicionar Avaliação ROSA">Lista de ROSA<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody> 

                                  @foreach ($subsetor->conclusoes as $conclusao) 
                                     @if($conclusao->ferramenta == 'ROSA')
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
                                           <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-conclusao', ['conclusao' => $conclusao->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
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
                <a href="{{route('form-conclusao', ['idsubsetor' => $subsetor->id, 'ferramenta' => 'ROSA'])}}" class="btn btn-primary mr-auto mb-2 simplificado">Cadastrar Dados ROSA Simplificado</a>
            </div>    
        </div>
    </div>

    
       <!-- Lista de Reba -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                <a href="javascript:;" data-theme="light" class="tooltip"  title="Adicionar Avaliação REBA">Lista de REBA<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody> 

                                  @foreach ($subsetor->conclusoes as $conclusao) 
                                     @if($conclusao->ferramenta == 'REBA')
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
                                           <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-conclusao', ['conclusao' => $conclusao->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
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
                <a href="{{route('form-conclusao', ['idsubsetor' => $subsetor->id, 'ferramenta' => 'REBA'])}}" class="btn btn-primary mr-auto mb-2 simplificado">Cadastrar Dados REBA Simplificado</a>
            </div>    
        </div>
    </div>


       <!-- Lista de HAL -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                <a href="javascript:;" data-theme="light" class="tooltip"  title="Adicionar Avaliação HAL">Lista de HAL<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
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
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody> 

                                  @foreach ($subsetor->conclusoes as $conclusao) 
                                     @if($conclusao->ferramenta == 'HAL')
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
                                           <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-conclusao', ['conclusao' => $conclusao->id])}}">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Excluir
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
                <a href="{{route('form-conclusao', ['idsubsetor' => $subsetor->id, 'ferramenta' => 'HAL'])}}" class="btn btn-primary mr-auto mb-2 simplificado">Cadastrar Dados HAL Simplificado</a>
            </div>    
        </div>
    </div>


       <!-- Lista de Recomendações Técnicas -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
               <a href="javascript:;" data-theme="light" class="tooltip"  title="Adicionar Avaliação Recomendações Técnicas">Lista de Recomendações Técnicas<i data-feather="help-circle" class="w-4 h-4 mr-2"></i> </a>
            </h2>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-12 gap-x-5">
                <div class="col-span-12 xl:col-span-12">
                    <div class="overflow-x-auto">
                        <table class="table" id="sortable-table-recomendacoes">
                            <thead>
                                <tr>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">#</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap">Recomendacao</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Ações</th>
                                    <th class="border border-b-2 dark:border-dark-5 whitespace-nowrap text-center">Excluir</th>
                                   
                                </tr>
                            </thead>
                            <tbody id="sortable-tbody-recomendacoes"> 
                             
                                @foreach ($subsetor->recomendacao as $recomendacao) 
                                    <tr class="hover:bg-gray-200">
                                        <td class="border">{{$recomendacao->id}}</td>
                                        <td class="border">{{$recomendacao->recomendacao}}</td>
                                        <td class="border" style="display: none">{{$loop->index}}</td>
                                        <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('info-recomendacao', ['id' => $recomendacao->id])}}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                                </a>
                                              
                                            </div>
                                           
                                        </td>

                                           <td class="border">
                                            <div class="flex justify-center">
                                                <a class="flex text-theme-1 mr-3"
                                                    href="{{route('delete-recomendacao', ['id' => $recomendacao->id])}}">
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
                <a href="{{route('form-recomendacao', ['id_subsetor' => $subsetor->id])}}" class="btn btn-primary mr-auto mb-2">Cadastrar Recomendações Técnicas</a>
            </div>    
        </div>
    </div>
<!-- Inicialize a ordenação -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obtenha a tabela e o tbody usando os IDs
        var table = document.getElementById('sortable-table-recomendacoes');
        var tbody = document.getElementById('sortable-tbody-recomendacoes');

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
        

            axios.post('/alteracao/ordem/recomendacao', { data: data,  _token: '{{ csrf_token() }}', })
                .then(function (response) {
                    console.log( response);
                })
                .catch(function (error) {
                    console.error('Erro ao enviar a solicitação', error);
                });
                
        }

        
    });
</script>
@if (session()->get('message') == 'erro_planilha')
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
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>

@endpush
