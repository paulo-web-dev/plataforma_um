@include('layouts.header-arp')

<div class="main-panel">
    <div class="content-wrapper">
        
        {{-- CARD 1: FORMULÁRIO DE ATUALIZAÇÃO --}}
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Atualização de Área</h4>
                            <a href="{{ route('infoempresaarp', ['id' => $area->id_empresa]) }}" class="btn btn-light btn-sm">
                                <i class="mdi mdi-arrow-left me-1"></i> Voltar
                            </a>
                        </div>

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

                        <form class="forms-sample" action="{{ route('upd-areas-arp') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$area->id}}">
                            
                            <div class="form-group">
                                <label for="area"><strong>Nome da Área</strong></label>
                                <input type="text" class="form-control" id="area" name="area" 
                                       placeholder="Nome da Área" value="{{$area->nome}}" required>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary me-2">Atualizar Área</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- CARD 2: LISTA DE SETORES --}}
        <div class="row mt-4">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Lista de Setores</h4>
                            <a href="{{ route('form-setores-arp', ['idempresa' => $area->id_empresa]) }}" class="btn btn-primary btn-sm">
                                <i class="mdi mdi-plus me-1"></i> Cadastrar Setor
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Setor</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($area->setores as $setores) 
                                        <tr>
                                            <td>{{$setores->id}}</td>
                                            <td>{{$setores->nome}}</td>
                                            <td class="text-center">
                                                <a href="{{ route('info-setor-arp', ['id' => $setores->id]) }}" 
                                                   class="btn btn-outline-primary btn-sm">
                                                    <i class="mdi mdi-lead-pencil me-1"></i> Editar
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach 
                                    @if($area->setores->isEmpty())
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">Nenhum setor cadastrado para esta área.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('layouts.footer-arp')