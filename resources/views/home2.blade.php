@extends('layouts.header2')

@section('content')

 <!-- END: Top Bar -->
                <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       Meu Perfil  <i data-feather="archive" class="w-4 h-4 mr-2" style="color:red"></i>
                    </h2>
                </div> 
                <!-- BEGIN: Profile Info -->
                <div class="intro-y box px-5 pt-5 mt-5">
                    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
                        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                     
              
                    <img  class="rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtMMQfcoo0WJoDcZowrVhrmhuL9Kguv_hkVNaPYmq-kDpHiW1P9lpvESWKjfGjNpCdkMM&usqp=CAU">
                
                <div class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-primary rounded-full p-2"> <i class="w-4 h-4 text-white" data-feather="camera"></i> </div>
                            </div>
                            <div class="ml-5">
                                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{Auth::user()->name}} </div>
                               
                            </div>
                        </div>
                        
                        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                            <div class="font-medium text-center lg:text-left lg:mt-3">Detalhes de Contato</div>
                            <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                                <div class="truncate sm:whitespace-normal flex items-center"> <i data-feather="mail" class="w-4 h-4 mr-2"></i> {{Auth::user()->email}} </div>
                                <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-feather="instagram" class="w-4 h-4 mr-2"></i> {{Auth::user()->name}}</div>
                               
                               
                            </div>
                        </div> 
                        
                        <div class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                            <div class="font-medium text-center lg:text-left lg:mt-5">Informações</div>
                            <div class="truncate sm:whitespace-normal flex items-center">Instituição: {{$user->instituicao->nome}}</div>
                            <div class="truncate sm:whitespace-normal flex items-center">Número de Colaboradores: {{$user->instituicao->num_usuarios}}</div>
                        </div>

                        
                        
                        <div class="absolute right-0 top-0 mr-5 mt-3 dropdown">

                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"><i data-feather="settings"></i>
                                
                            </a>

                            <div class="dropdown-menu w-40">

                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2"> 

                                    <a href=""

                                        class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">

                                        <i data-feather="archive" class="w-4 h-4 mr-2"></i> Editar </a>
                                    

                                </div>

                            </div>

                        </div>
                    </div>
                    
    <div class="grid grid-cols-12 gap-6 mt-5">

       
        <!-- BEGIN: Users Layout -->

        @foreach ($empresas as $empresa)

            <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">

                <div class="box h-72">

                    <div class="flex items-start px-5 pt-5">

                        <div class="w-full flex flex-col lg:flex-row items-center">

                            <div class="w-16 h-16 image-fit">
                                   
                                     <img  class="rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtMMQfcoo0WJoDcZowrVhrmhuL9Kguv_hkVNaPYmq-kDpHiW1P9lpvESWKjfGjNpCdkMM&usqp=CAU">
                                 
                            </div>

                            <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">

                                <a href="{{route('infoempresa', ['id' => $empresa->id])}}"

                                    class="font-medium">{{ $empresa->nome }}</a>

                                <div class="text-gray-600 text-xs mt-0.5">{{ $empresa->cnpj }}</div>

                            </div>

                        </div>

                        <div class="absolute right-0 top-0 mr-5 mt-3 dropdown">

                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"> <i

                                    data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i>

                            </a>
                            
                            <div class="dropdown-menu w-40">

                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">

                                    <a href=""

                                        class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">

                                        <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Editar </a>

                                    <a href="javascript:;" data-toggle="modal"

                                        data-target="#excluirProfessor{{ $empresa->id }}"

                                        class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">

                                        <i data-feather="trash" class="w-4 h-4 mr-2"></i> Excluir </a>
                                        
                       
                                        
                                </div>

                            </div>
 
                        </div>

                    </div>

                    <div class="text-center lg:text-left p-5">

                        <div></div>

                        <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5"> <i

                                data-feather="mail" class="w-3 h-3 mr-2"></i> {{ $empresa->responsavel }} </div>

                        <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1"> <i

                                data-feather="phone" class="w-3 h-3 mr-2"></i> {{ $empresa->telefone }} </div>

                    </div>

                </div>

            </div>

            <!-- BEGIN: Modal Content -->

            <div id="excluirProfessor{{ $empresa->id }}" class="modal" tabindex="-1" aria-hidden="true">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <form action="" method="POST">

                            <div class="modal-body p-0">

                                <div class="p-5 text-center"> <i data-feather="x-circle"

                                        class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>

                                    <div class="text-3xl mt-5">Você realmente quer excluir este professor?</div>

                                    <div class="text-gray-600 mt-2">

                                        Esse processo não poderá ser desfeito.

                                    </div>

                                </div>

                                <div class="px-5 pb-8 text-center">

                                    <button type="button" data-dismiss="modal"

                                        class="btn btn-outline-secondary w-24 dark:border-dark-5 dark:text-gray-300 mr-1">Cancelar</button>

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger w-24">Excluir</button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        @endforeach

        <!-- END: Users Layout -->

    </div>
                </div>


                

@endsection

@push('custom-scripts')





@endpush


