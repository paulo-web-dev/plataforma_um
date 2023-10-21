@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Cadastro de Dados de Saúde.
            </h2>
             <a href="{{ route('info-subsetor',  ['id' => $dado->id_subsetor]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('upd-dados-de-saude') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="id" value="{{$dado->id}}">
                    <div class="col-span-12 xl:col-span-6">
                        <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Possuem Dores Lombares (SIM)</strong></label>
                            <input id="update-profile-form-7" type="number" name="sim" class="form-control"
                                placeholder="Possuem Dores Lombares (SIM)" value="{{$dado->sim}}" required>
                        </div>

                         <div class="mt-3">
                            <label for="update-profile-form-7" class="form-label"><strong>Não Possuem Dores Lombares (NÂO)</strong></label>
                            <input id="update-profile-form-7" type="number" name="nao" class="form-control"
                                placeholder="Não Possuem Dores Lombares (NÂO)" value="{{$dado->nao}}" required>
                        </div>


                         {{-- <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong>Descrição do SubSetor</strong></label>
                            <textarea class="form-control editor" name="descricao" id="descricao" cols="30" rows="15"></textarea>
                        </div>
                     --}}
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Atualizar Dado de Saúde</button>
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
