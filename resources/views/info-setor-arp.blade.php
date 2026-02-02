@include('layouts.header-arp')

<div class="main-panel">
    <div class="content-wrapper">
        
        {{-- SEÇÃO 1: ATUALIZAÇÃO DO SETOR --}}
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h4 class="card-title mb-0 text-primary">Editar Setor</h4>
                                <p class="card-description mb-0">Atualize as informações principais do setor</p>
                            </div>
                            <a href="{{ route('infoempresaarp', ['id' => $setor->id_empresa]) }}" class="btn btn-light btn-icon-text">
                                <i class="mdi mdi-arrow-left me-1"></i> Voltar
                            </a>
                        </div>

                        <hr class="mb-4">

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

                        <form class="forms-sample" action="{{ route('upd-setor-arp') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$setor->id}}">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="area"><strong>Área</strong></label>
                                        <select class="form-control border-primary" name="area" id="area">
                                            {{-- Opção Atual --}}
                                            <option value="{{$setor->area->id ?? ''}}">{{$setor->area->nome ?? 'Selecione a Área'}}</option>
                                            {{-- Demais Opções --}}
                                            @foreach ($areas as $area) 
                                                @if(isset($setor->area) && $area->id != $setor->area->id)
                                                    <option value="{{$area->id}}">{{$area->nome}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nome"><strong>Nome do Setor</strong></label>
                                        <input type="text" class="form-control" name="nome" value="{{$setor->nome}}" placeholder="Nome do Setor" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-icon-text shadow-sm">
                                    <i class="mdi mdi-content-save me-1"></i> Atualizar Setor
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- SEÇÃO 2: LISTAGEM DE POSTOS DE TRABALHO --}}
        <div class="row mt-4">
            <div class="col-12 grid-margin stretch-card">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="card-title mb-0">Postos de Trabalho Vinculados</h4>
                            <a href="{{route('form-subsetores-arp', ['idsetor' => $setor->id])}}" class="btn btn-success btn-sm btn-icon-text shadow-sm text-white">
                                <i class="mdi mdi-plus-circle me-1"></i> Novo Posto de Trabalho
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        <th style="width: 50px;">#</th>
                                        <th>Posto de Trabalho</th>
                                        <th class="text-center" style="width: 120px;">Duplicar</th>
                                        <th class="text-center" style="width: 120px;">Editar</th>
                                        <th class="text-center" style="width: 120px;">Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($setor->subsetores as $subsetor) 
                                    <tr>
                                        <td class="font-weight-bold text-muted">{{$subsetor->id}}</td>
                                        <td>{{$subsetor->nome}}</td>
                                        <td class="text-center">
                                            <a href="{{route('duplicar-subsetor-arp', ['id' => $subsetor->id])}}" class="btn btn-outline-info btn-sm btn-icon-text">
                                                <i class="mdi mdi-content-copy me-1"></i> Duplicar
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('info-subsetor-arp', ['id' => $subsetor->id])}}" class="btn btn-outline-primary btn-sm btn-icon-text">
                                                <i class="mdi mdi-pencil me-1"></i> Editar
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('delete-subsetor-arp', ['id' => $subsetor->id])}}" 
                                               onclick="return confirm('Tem certeza que deseja excluir este posto?')"
                                               class="btn btn-outline-danger btn-sm btn-icon-text">
                                                <i class="mdi mdi-trash-can me-1"></i> Excluir
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach 
                                    @if($setor->subsetores->isEmpty())
                                        <tr>
                                            <td colspan="5" class="text-center py-4 text-muted italic">Nenhum posto de trabalho cadastrado para este setor.</td>
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