@include('layouts.header-arp')

<style>
    .empresas-grid {
        display: grid !important;
        grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
        gap: 1.5rem !important;
        width: 100%;
        margin: 30px;
    }

    .empresa-card {
        width: 100% !important;
        max-width: 100% !important;
    }

    @media (max-width: 1024px) {
        .empresas-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
        }
    }

    @media (max-width: 640px) {
        .empresas-grid {
            grid-template-columns: 1fr !important;
        }
    }
</style>

{{-- BLOCO SEPARADO: TÍTULO + BOTÃO --}}


{{-- GRID DE EMPRESAS --}}
<div class="empresas-grid mt-5">
@foreach ($empresas as $empresa)

    <div class="empresa-card">
        <div class="intro-y box bg-gray-100 rounded-lg shadow-lg border border-gray-300 relative">

            {{-- TOPO --}}
            <div class="flex items-start px-5 pt-5 pb-5">
                <div class="flex items-center w-full">
                    <div class="w-14 h-14 image-fit relative">
                        <img
                            alt="{{ $empresa->nome }}"
                            class="rounded-full border-2 border-white shadow-sm"
                            src="https://ui-avatars.com/api/?name={{ urlencode($empresa->nome) }}"
                        >
                    </div>

                    <div class="ml-4 mr-auto overflow-hidden">
                        <a href="{{ route('infoempresaarp', ['id' => $empresa->id]) }}"
                           class="font-bold text-base hover:text-blue-700 truncate block">
                            {{ $empresa->nome }}
                        </a>
                        <div class="text-gray-500 text-xs">
                            CNPJ: {{ $empresa->cnpj }}
                        </div>
                    </div>
                </div>

                {{-- AÇÕES --}}
                <div class="flex flex-col items-center ml-2 gap-2">
                    <a class="text-blue-600 hover:text-blue-800">
                        <i data-feather="edit-3"></i>
                    </a>
                    <a data-toggle="modal"
                       data-target="#excluirEmpresa{{ $empresa->id }}"
                       class="text-red-500 hover:text-red-700">
                        <i data-feather="trash-2"></i>
                    </a>
                </div>
            </div>

            <div class="border-t mx-5"></div>

            {{-- DADOS --}}
            <div class="p-5 space-y-2">
                <div class="flex items-center text-gray-600">
                    <i data-feather="user" class="w-4 h-4 mr-2"></i>
                    {{ $empresa->responsavel }}
                </div>
                <div class="flex items-center text-gray-600">
                    <i data-feather="phone" class="w-4 h-4 mr-2"></i>
                    {{ $empresa->telefone }}
                </div>
            </div>

        </div>
    </div>

@endforeach
</div>

@include('layouts.footer-arp')
