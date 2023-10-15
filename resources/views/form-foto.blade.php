@extends('layouts.header')
@section('content')


<!-- BEGIN: Personal Information -->
    <div class="intro-y box mt-5">
        <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
               Upload de Fotos de atividade
            </h2>
            <a href="{{ route('info-subsetor',  ['id' => $id_subsetor]) }}" class="btn btn-primary shadow-md mr-2"><i data-feather="skip-back" class="w-4 h-4 mr-2"></i>Voltar</a>
        </div>

        <form action="{{route('upload-foto')}}" enctype="multipart/form-data"  method="post">
       
            <div class="p-5"> 
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">
                        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i data-feather="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                @endforeach 

                <div class="grid grid-cols-6 gap-x-5">

                    @csrf

                    </div>

 
                   
                <div class="col-span-12 xl:col-span-6">
                    <input type="hidden" name="id_subsetor" value="{{$id_subsetor}}"> 
                        <label class="form-label"><strong>Upload de fotos</strong></label>
                        <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">
                            <div class="px-4 pt-24 pb-24 flex items-center justify-center cursor-pointer relative">
                                <div id="areaArquivo">
                                    <img id="previewImage" src="" alt="Adicionar Fotos">
                                </div>
                                <input type="file" id="file" name="file[]"
                                    class="w-full h-full top-0 left-0 absolute opacity-0" multiple >
                            </div>
                        </div>
                    </div>
                </div>
                       
                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn btn-primary w-40 mr-auto">Cadastrar Fotos</button>  
                    
                </div>
            </div>
        </form>
    </div> 

    <!-- END: Personal Information -->
    <!-- END: Users Layout -->
    </div>

@endsection
@push('custom-scripts')
    
   
         <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>  <!--Script do iconify-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
     
        
        <!-- END: JS Assets-->
    </body>
</html>

@push('custom-scripts')





@endpush
