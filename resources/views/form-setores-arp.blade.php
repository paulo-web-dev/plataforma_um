@include('layouts.header-arp')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card shadow-sm">
                    <div class="card-body">
                        
                        {{-- Cabeçalho --}}
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h4 class="card-title mb-0 text-primary">Cadastro de Setor</h4>
                                <p class="card-description mb-0">Preencha os campos abaixo para registrar um novo setor na empresa</p>
                            </div>
                            <a href="{{ route('infoempresa', ['id' => $id_empresa]) }}" class="btn btn-light btn-icon-text">
                                <i class="mdi mdi-arrow-left me-1"></i> Voltar
                            </a>
                        </div>

                        <hr class="mb-4">

                        {{-- Exibição de Erros --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Formulário --}}
                        <form class="forms-sample" action="{{ route('cad-setor-arp') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_empresa" value="{{$id_empresa}}">

                            <div class="row">
                                {{-- Campo Áreas --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="area"><strong>Áreas</strong></label>
                                        <select class="form-control border-primary" name="area" id="area">
                                            @foreach ($areas as $area) 
                                                <option value="{{$area->id}}">{{$area->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Campo Setor --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nome"><strong>Setor</strong></label>
                                        <input type="text" class="form-control" id="nome" name="nome" 
                                               placeholder="Nome do Setor" value="" required>
                                    </div>
                                </div>
                            </div>

                            {{-- Botões de Ação --}}
                            <div class="mt-4 d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary btn-lg px-5 shadow mr-2">
                                    Cadastrar Setor
                                </button>
                                <a href="{{ route('infoempresaarp', ['id' => $id_empresa]) }}" class="btn btn-light btn-lg px-5">
                                    Cancelar
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer-arp')

@push('custom-scripts')
{{-- Seus scripts aqui --}}
@endpush