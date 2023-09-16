@extends('layouts.header')



@section('content')

 <!-- END: Top Bar -->
                <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                       Meu Perfil  <i data-feather="archive" class="w-4 h-4 mr-2" style="color:red"></i>
                    </h2>
                </div> 
                <!-- BEGIN: Profile Info -->
                <div class="intro-y box px-5 pt-5 mt-5">
                    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
                        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                     
              
                    <img  class="rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtMMQfcoo0WJoDcZowrVhrmhuL9Kguv_hkVNaPYmq-kDpHiW1P9lpvESWKjfGjNpCdkMM&usqp=CAU">
                
                <div class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-primary rounded-full p-2"> <i class="w-4 h-4 text-white" data-feather="camera"></i> </div>
                            </div>
                            <div class="ml-5">
                                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{Auth::user()->name}} </div>
                               
                            </div>
                        </div>
                        
                        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                            <div class="font-medium text-center lg:text-left lg:mt-3">Detalhes de Contato</div>
                            <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                                <div class="truncate sm:whitespace-normal flex items-center"> <i data-feather="mail" class="w-4 h-4 mr-2"></i> {{Auth::user()->email}} </div>
                                <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-feather="instagram" class="w-4 h-4 mr-2"></i> {{Auth::user()->name}}</div>
                               
                               
                            </div>
                        </div> 
                        
                        <div class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                            <div class="font-medium text-center lg:text-left lg:mt-5">Informações</div>
                            <div class="truncate sm:whitespace-normal flex items-center">  </div>
                        </div>
                        
                        <div class="absolute right-0 top-0 mr-5 mt-3 dropdown">

                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"><i data-feather="settings"></i>

                            </a>

                            <div class="dropdown-menu w-40">

                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2"> 

                                    <a href=""

                                        class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">

                                        <i data-feather="archive" class="w-4 h-4 mr-2"></i> Editar </a>
                                    

                                </div>

                            </div>

                        </div>
                    </div>
                    
                </div>
            
            <!-- END: Content -->
        </div>
        <!-- BEGIN: Dark Mode Switcher-->
       
        <!-- END: Dark Mode Switcher-->
        
        <!-- BEGIN: JS Assets-->
         <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>  <!--Script do iconify-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
     
        
        <!-- END: JS Assets-->
    </body>
</html>
@endsection

@push('custom-scripts')





@endpush

