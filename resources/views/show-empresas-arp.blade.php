@include('layouts.header-arp')

<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Lista de Empresas Cadastradas
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
   
        <a href="{{ route('formempresaarp') }}" class="btn btn-primary shadow-md">
            <i data-feather="plus" class="w-4 h-4 mr-2"></i> Adicionar Empresa
        </a>
    </div>
</div>

<br>

{{-- GRID FIXO: 3 colunas sempre --}}
<div class="grid grid-cols-3 gap-6 mt-5">
    @foreach ($empresas as $empresa)
        <div class="intro-y">
            <div class="box bg-gray-100 rounded-lg shadow-lg border border-gray-300 relative">

                {{-- TOPO --}}
                <div class="flex items-start px-5 pt-5 pb-5">
                    <div class="w-full flex items-center">
                        <div class="w-14 h-14 image-fit relative">
                            <img
                                alt="{{ $empresa->nome }}"
                                class="rounded-full border-2 border-white shadow-sm"
                                src="https://ui-avatars.com/api/?name={{ urlencode($empresa->nome) }}&color=7F9CF5&background=EBF4FF"
                            >
                        </div>

                        <div class="ml-4 mr-auto overflow-hidden">
                            <a
                                href="{{ route('infoempresaarp', ['id' => $empresa->id]) }}"
                                class="font-bold text-base text-gray-800 hover:text-blue-700 truncate block"
                            >
                                {{ $empresa->nome }}
                            </a>
                            <div class="text-gray-500 text-xs mt-0.5">
                                CNPJ: {{ $empresa->cnpj }}
                            </div>
                        </div>
                    </div>

                    {{-- AÇÕES --}}
                    <div class="flex flex-col items-center ml-2 gap-2">
                        <a href="#" class="text-blue-600 hover:text-blue-800" title="Editar">
                            <i data-feather="edit-3" class="w-5 h-5"></i>
                        </a>
                        <a
                            href="javascript:;"
                            data-toggle="modal"
                            data-target="#excluirEmpresa{{ $empresa->id }}"
                            class="text-red-500 hover:text-red-700"
                            title="Excluir"
                        >
                            <i data-feather="trash-2" class="w-5 h-5"></i>
                        </a>
                    </div>
                </div>

                <div class="border-t border-gray-300/50 mx-5"></div>

                {{-- DADOS --}}
                <div class="p-5">
                    <div class="flex items-center text-gray-600 mb-2">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i>
                        <span class="truncate font-medium">{{ $empresa->responsavel }}</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <i data-feather="phone" class="w-4 h-4 mr-2"></i>
                        {{ $empresa->telefone }}
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL EXCLUIR --}}
        <div id="excluirEmpresa{{ $empresa->id }}" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="modal-body p-0">
                            <div class="p-5 text-center">
                                <i data-feather="x-circle" class="w-16 h-16 text-red-500 mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Tem certeza?</div>
                                <div class="text-slate-500 mt-2">
                                    Você realmente quer excluir a empresa
                                    <b>{{ $empresa->nome }}</b>?<br>
                                    Esse processo não poderá ser desfeito.
                                </div>
                            </div>

                            <div class="px-5 pb-8 text-center">
                                <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">
                                    Cancelar
                                </button>
                                <button type="submit" class="btn btn-danger w-24">
                                    Excluir
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
  
    @endforeach
</div>
</div>

@include('layouts.footer-arp')