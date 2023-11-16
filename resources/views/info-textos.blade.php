@extends('layouts.header')

@section('content')
<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Informação de Textos Padrão
            </h2>
        <a href="{{ route('home') }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{ route('upd-textos') }}" enctype="multipart/form-data" data-single="true" method="post">
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
                    <input type="hidden" name="id" value="{{$texto->id}}">
                    <div class="col-span-12 xl:col-span-6">
                     
                   
                         <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong><a href="javascript:;" data-theme="light" class="tooltip"  title="Este Texto será o padrão, para assim que cadastrar uma noa empresa para a AET, ele será cadastrado junto para economizar tempo :)">Introdução </a> </label>
                            <textarea class="form-control editor" name="introducao" id="editor" cols="30" rows="15" required>
                                {{$texto->introducao}}
                            </textarea>
                        </div>

                        
                         <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong><a href="javascript:;" data-theme="light" class="tooltip"  title="Este Texto será o padrão, para assim que cadastrar uma noa empresa para a AET, ele será cadastrado junto para economizar tempo :)">Equipe </a> </strong></label>
                            <textarea class="form-control editor" name="equipe" id="equipe" cols="30" rows="15" required>
                               {{$texto->equipe}}
                            </textarea>
                        </div>

                       <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong><a href="javascript:;" data-theme="light" class="tooltip"  title="Este Texto será o padrão, para assim que cadastrar uma noa empresa para a AET, ele será cadastrado junto para economizar tempo :)">Disposições Finais </a> </strong></label>
                            <textarea class="form-control editor" name="disposicao" id="disposicao" cols="30" rows="15" required>
                               {{$texto->disposicao}}
                            </textarea>
                        </div>

                        <div class="mt-3"  id="link">
                            <label for="update-profile-form-7" class="form-label"><strong><a href="javascript:;" data-theme="light" class="tooltip"  title="Este Texto será o padrão, para assim que cadastrar uma noa empresa para a AET, ele será cadastrado junto para economizar tempo :)">Metodologia </a> </strong></label>
                            <textarea class="form-control editor" name="metodologia" id="metodologia" cols="30" rows="15" required>
                              {{$texto->metodologia}}
                            </textarea>
                        </div>
                    
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Atualizar Textos Padrões</button>
                </div>
            </div>
        </form>
    </div>
    <!-- END: Personal Information -->
    <!-- END: Users Layout -->
    </div>

    
<script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );

                                
                        ClassicEditor
                                .create( document.querySelector( '#equipe' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );

                        ClassicEditor
                                .create( document.querySelector( '#disposicao' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );

                            ClassicEditor
                                .create( document.querySelector( '#metodologia' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script> 
@endsection

@push('custom-scripts')





@endpush
