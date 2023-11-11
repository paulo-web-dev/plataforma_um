@extends('layouts.header')



@section('content')


    <h2 class="intro-y text-lg font-medium mt-10">

        Lista de Empresas cadastrados
           </h2> 
        <a href="{{ route('home') }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        
     <a href="{{ route('formempresa') }}" data-theme="light" class="tooltip btn btn-primary"  title="Clique aqui para cadastrar uma empresa, e os dados de sua AET"><i data-feather="plus" class="w-4 h-4 mr-2"></i> Adicionar Empresa</a>
       

 

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
@endsection

@push('custom-scripts')





@endpush
