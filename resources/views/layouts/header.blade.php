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
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
    <script src="{{url('/dist/js/calculo_ferramentas.js')}}"></script> 
    <title>PlataformaUm</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ url('dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
</head>
 
{{-- Inici do CSS do Menu  WEB --}}
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
        <ul class="border-t border-white/[0.08] py-5 hidden">
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="user-check"></i> </div>
                    <div class="menu__title"> Biometria <i data-feather="chevron-down"
                            class="menu__sub-icon "></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="#" class="menu">
                            <div class="menu__icon"> </div>
                            <div class="menu__title"> Registrar Biometria </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="menu">
                            <div class="menu__icon"></div>
                            <div class="menu__title"> Homologação </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="phone-forwarded"></i> </div>
                    <div class="menu__title"> Atividades <i data-feather="chevron-down"
                            class="menu__sub-icon "></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="#" class="menu">
                            <div class="menu__icon"></i> </div>
                            <div class="menu__title"> Adicionar Atividades </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="menu">
                            <div class="menu__icon"></i> </div>
                            <div class="menu__title"> Pesquisar Atividades</div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="menu">
                            <div class="menu__icon"></i> </div>
                            <div class="menu__title"> Atividades Geral</div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="users"></i> </div>
                    <div class="menu__title"> Alunos <i data-feather="chevron-down" class="menu__sub-icon "></i>
                    </div>
                </a>
                <ul class="">
                    <li>
                        <a href="#" class="menu">
                            <div class="menu__icon"> </div>
                            <div class="menu__title"> Todos os Alunos </div>
                        </a>
                    </li>
                    <!-- Other menu items... -->
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"><i data-feather="dollar-sign"></i></div>
                    <div class="menu__title"> Financeiro <i data-feather="chevron-down"
                            class="menu__sub-icon "></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="#" class="menu">
                            <div class="menu__icon"> </div>
                            <div class="menu__title"> Caixa </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="menu">
                            <div class="menu__icon"> </div>
                            <div class="menu__title"> Faturamento X Despesas </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="menu">
                            <div class="menu__icon"> </div>
                            <div class="menu__title"> Relatório Cancelamento </div>
                        </a>
                    </li>
                
                       <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="user-check"></i> </div>
                    <div class="menu__title"> Biometria <i data-feather="chevron-down"
                            class="menu__sub-icon "></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="#" class="menu">
                            <div class="menu__icon"> </div>
                            <div class="menu__title"> Registrar Biometria </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="menu">
                            <div class="menu__icon"></div>
                            <div class="menu__title"> Homologação </div>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Other menu items... -->
            <li>
                
                       
                
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
                <a class="notification notification--light sm:hidden" href=""> <i data-feather="search"
                        class="notification__icon dark:text-gray-300"></i> </a>
          
            <!-- END: Search -->
          
            <!-- END: Notifications -->
            <!-- BEGIN: Account Menu -->
            <div class="intro-x dropdown w-8 h-8">
                <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110"
                    role="button" aria-expanded="false">
                   
                        <img class="rounded-full"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtMMQfcoo0WJoDcZowrVhrmhuL9Kguv_hkVNaPYmq-kDpHiW1P9lpvESWKjfGjNpCdkMM&usqp=CAU">
                    
                </div>
                <div class="dropdown-menu w-56">
                    <div class="dropdown-menu__content box bg-theme-26 dark:bg-dark-6 text-white">
                        <div class="p-4 border-b border-theme-27 dark:border-dark-3">
                            <div class="font-medium">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-theme-28 mt-0.5 dark:text-gray-600">{{ Auth::user()->funcao }}
                            </div>
                        </div>
                        <div class="p-2 border-t border-theme-27 dark:border-dark-3">
                            <a href="">
                                Sair
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
    </div>
    <!-- END: Top Bar -->
    <!-- END: Mobile Menu -->
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
           
         
                <a href="{{route('show-empresas')}}" target="_blank"
                        class="side-menu side-menu-active">
                        <div class="side-menu__icon"> <span class="iconify"
                                data-icon="material-symbols:drive-folder-upload" style="font-size:30px"></span>
                        </div>
                        <div class="side-menu__title"> Empresas </div>
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

        //Função calcular moore e gar

        function mooregarg(fit, fde, ffe, fpmp, fri, fdt){
            var resultado = fit * fde * ffe * fpmp * fri * fdt;
            alert(resultado);
        }
        </script>

        <style>
            .rotated {
                transform: rotate(180deg);
            }
        </style>

</body>

</html>
