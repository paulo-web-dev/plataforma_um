@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Cadastro de Responsáveis Pela Elaboração
            </h2>
        </div>

        <form action="{{ route('cad-responsaveis') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="id_empresa" value="{{$id_empresa}}">
                    <div class="col-span-12 xl:col-span-6">

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Nome</strong></label>
                            <input id="update-profile-form-7" type="text" name="nome" class="form-control"
                                placeholder="Nome" value="">
                        </div>

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Cargo</strong></label>
                            <input id="update-profile-form-7" type="text" name="cargo" class="form-control"
                                placeholder="Cargo" value="">
                        </div>

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Identidade de Trabalho</strong></label>
                            <input id="update-profile-form-7" type="text" name="identidade_trabalho" class="form-control"
                                placeholder="Identidade de Trabalho. EX: CREFITO 3/131278 F" value="">
                        </div>
                   

                    
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Cadastrar Responsável</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END: Personal Information -->
    <!-- END: Users Layout -->
    </div>
@endsection

@push('custom-scripts')





@endpush
