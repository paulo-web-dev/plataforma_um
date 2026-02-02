@include('layouts.header-arp')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        
                        {{-- Cabeçalho do Card --}}
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Cadastro de Área</h4>
                            <a href="{{ route('infoempresaarp', ['id' => $id_empresa]) }}" class="btn btn-light btn-sm">
                                <i class="mdi mdi-arrow-left me-1"></i> Voltar
                            </a>
                        </div>
                        
                        <p class="card-description"> Defina o nome da área ou setor da empresa </p>

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
                        <form class="forms-sample" action="{{ route('cad-areas-arp') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_empresa" value="{{ $id_empresa }}">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="area"><strong>Nome da Área</strong></label>
                                        <input type="text" 
                                               class="form-control" 
                                               id="area" 
                                               name="area" 
                                               placeholder="Ex: Produção, Almoxarifado, Financeiro..." 
                                               required>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary me-2">Cadastrar Área</button>
                                <a href="{{ route('infoempresa', ['id' => $id_empresa]) }}" class="btn btn-light">Cancelar</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer-arp')