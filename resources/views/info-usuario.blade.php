@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
              Dados de Usuário
            </h2>
        <a href="{{ route('show-usuario')}}"  class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('upd-usuario') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type = "hidden" name="id" value="{{$usuario->id}}">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Nome</strong></label>
                            <input id="update-profile-form-7" type="text" name="nome" class="form-control" required
                                placeholder="Nome" value="{{$usuario->name}}">
                        </div>

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Email</strong></label>
                            <input id="update-profile-form-7" type="email" name="email" class="form-control" required
                                placeholder="Email" value="{{$usuario->email}}" >
                        </div>

                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Preencha apenas se for alterar a senha do usuário</strong></label>
                            <input id="update-profile-form-7" type="password" name="senha" class="form-control" 
                                placeholder="Preencha somente se for alterar a senha" value="">
                        </div>
                        
            
                    
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Atualizar Usuário</button>
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
