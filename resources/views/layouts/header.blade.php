<!DOCTYPE html>
<html lang="pt-br" class="light">

<head>
    <meta charset="utf-8">
    <link href="{{ url('dist/images/logo.svg') }}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Rubick admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Rubick Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
   <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

      <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://johnny.github.io/jquery-sortable/jquery-sortable.js"></script>

    <script src="{{url('/dist/js/calculo_ferramentas.js')}}"></script> 
    <title>PlataformaUm</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ url('dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

</head>


<style>
    .dropdown-content {
        display: none;
    }

    .show {
        display: block;
    }

    .legenda_rula{
        margin: 8px;
    }

       h2 .tooltip {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .mr-2{
            margin-left: 8px; /* Ajuste conforme necessário */
        }
  
    /* .side-menu--active {
        border: 1px solid white;
    } */
</style>
<!-- END: Head -->
<body class="py-5">
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                    class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-white/[0.08] py-5 ">
            <li>
                <a href="{{route('show-empresas')}}" class="menu">
                    <div class="menu__icon"> <i data-feather="user-check"></i> </div>
                    <div class="menu__title"> Empresas  </div>
                </a> 

                 <a href="{{route('show-identidade')}}" class="menu">
                    <div class="menu__icon"> <i data-feather="user"></i> </div>
                    <div class="menu__title"> Identidade Visual  </div>
                </a>     
                @if (Auth::user()->power == 1)
                    
               
                <a href="{{route('show-usuario')}}" class="menu">
                    <div class="menu__icon"> <i data-feather="user"></i> </div>
                    <div class="menu__title">Controle de Usuários  </div>
                </a>     

                 @endif  
                <a href="{{route('show-textos')}}" class="menu">
                    <div class="menu__icon"> <i data-feather="user"></i> </div>
                    <div class="menu__title">Textos Padrão </div>
                </a>  
        </ul>
    </div>
    <!-- BEGIN: Top Bar -->
    <div class="border-b border-theme-29 -mt-10 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 pt-3 md:pt-0 mb-10">
        <div class="top-bar-boxed flex items-center">
            <!-- BEGIN: Logo -->
            <a href="#" class="-intro-x hidden md:flex">
                <span class="text-white text-lg font-light ml-3"> Painel <span class="font-bold">PlataformaUm</span>
                </span>
            </a>
            <!-- END: Logo -->
            <!-- BEGIN: Breadcrumb -->
            <div class="-intro-x breadcrumb breadcrumb--light mr-auto"> </div>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <div class="intro-x relative mr-3 sm:mr-6">
          
            <!-- END: Search -->
          
            <!-- END: Notifications -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
           
     
            </div>
            <!-- END: Account Menu -->
        </div>
    </div>
    <!-- END: Top Bar -->
    <!-- END: Mobile Menu -->
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
           
         
                <a href="{{route('show-empresas')}}" 
                        class="side-menu side-menu-active">
                        <div class="side-menu__icon"> <span class="iconify"
                                data-icon="material-symbols:drive-folder-upload" style="font-size:30px"></span>
                        </div>
                        <div class="side-menu__title"> Empresas </div>
                    </a>

                    
                <a href="{{route('show-identidade')}}" 
                        class="side-menu side-menu-active">
                        <div class="side-menu__icon"> <span class="iconify"
                                data-icon="mdi:subscriber-identity-module-outline" style="font-size:30px"></span>
                        </div>
                        <div class="side-menu__title"> Identidade Visual </div>
                    </a>

                        @if (Auth::user()->power == 1)                
                <a href="{{route('show-usuario')}}" 
                        class="side-menu side-menu-active">
                        <div class="side-menu__icon"> <span class="iconify"
                                data-icon="ep:user" style="font-size:30px"></span>
                        </div>
                        <div class="side-menu__title"> Controle de Usuários </div>
                    </a>

                    @endif
                        <a href="{{route('show-textos')}}" 
                        class="side-menu side-menu-active">
                        <div class="side-menu__icon"> <span class="iconify"
                                data-icon="jam:text" style="font-size:30px"></span>
                        </div>
                        <div class="side-menu__title">Textos Padrão</div>
                    </a>

                     <a href="{{route('show-lista-recomendacoes')}}" 
                        class="side-menu side-menu-active">
                        <div class="side-menu__icon"> <span class="iconify"
                                data-icon="ph:list-fill" style="font-size:30px"></span>
                        </div>
                        <div class="side-menu__title">Listas</div>
                    </a>


                    <a href="{{route('logout')}}" 
                        class="side-menu side-menu-active">
                        <div class="side-menu__icon"> <span class="iconify"
                                data-icon="grommet-icons:logout" style="font-size:30px"></span>
                        </div>
                        <div class="side-menu__title">Logout</div>
                    </a>
           
          
           
        </nav>
        <!-- END: Top Menu -->
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content" style="width:2200px">
            @yield('content')
        </div>
        <!-- END: Content -->
        <!-- BEGIN: JS Assets-->
        <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
        <!--Script do iconify-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
        <script src="{{ url('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
        @stack('custom-scripts')


        <script>
            const dropdownBtns = document.querySelectorAll('.arrow_img');
            for (dropdownBtn of dropdownBtns) {
                dropdownBtn.onclick = dropDown;
            }

            function dropDown(e) {
                let alvo = e.target.parentNode.nextElementSibling;
                alvo.classList.toggle('show');
            }
        </script>
        <script>
            // Captura todos os elementos de menu desejados usando a classe
            var menuItems = document.querySelectorAll('.side-menu');

            // Adiciona um ouvinte de eventos de clique a cada elemento de menu
            menuItems.forEach(function(menuItem) {
                menuItem.addEventListener('click', function() {
                    // Obtém o ícone de seta dentro do menu clicado
                    var chevronIcon = this.querySelector('.side-menu__sub-icon');

                    // Alterna a classe do ícone de seta quando o menu é clicado
                    chevronIcon.classList.toggle('rotated');
                });
            });
        </script>

        <style>
            .rotated {
                transform: rotate(180deg);
            }
            .close-button{
                 position:absolute !important;
                 margin:5px;
            }
        </style>

</body>

</html>
