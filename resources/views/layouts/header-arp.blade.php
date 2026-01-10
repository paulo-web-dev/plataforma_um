<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Avalia.One </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ url('assets_arp/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ url('assets_arp/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets_arp/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ url('assets_arp/vendors/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets_arp/vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ url('assets_arp/vendors/simple-line-icons/css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="{{ url('assets_arp/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ url('assets_arp/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">

  <!-- Plugin css -->
  <link rel="stylesheet" href="{{ url('assets_arp/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ url('assets_arp/js/select.dataTables.min.css') }}">

  <!-- Main css -->
  <link rel="stylesheet" href="{{ url('assets_arp/css/style.css') }}">

  <link rel="shortcut icon" href="{{ url('assets_arp/images/favicon.png') }}">
</head>

  <body class="with-welcome-text">
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        
        </div>
      </div>
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo" href="#">
              <img src="{{ url('assets_arp/images/logo.svg') }}" alt="logo">
            </a>
            <a class="navbar-brand brand-logo-mini" href="#">
              <img src="{{ url('assets_arp/images/logo-mini.svg') }}" alt="logo">
            </a>
          </div>
        </div>
        
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
              <h1 class="welcome-text">Olá, <span class="text-black fw-bold">{{ Auth::user()->name ?? 'Usuário' }}</span></h1>
              <h3 class="welcome-sub-text">Bem-vindo ao painel de gerenciamento.</h3>
            </li>
          </ul>
          
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      
      <div class="container-fluid page-body-wrapper">
        
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
      
            @if(Config::get('app.explode_path.2') == 'empresa')
            <li class="nav-item nav-category">Navegação Interna</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#menu-empresa" aria-expanded="false" aria-controls="menu-empresa">
                <i class="menu-icon mdi mdi-view-list"></i>
                <span class="menu-title">Opções da Empresa</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="menu-empresa">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#introducao">Introdução</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#objetivos">Objetivos</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#metodologia">Metodologia</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#demanda">Demanda</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#analise">Análise Global</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#areas">Áreas</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#setores">Setores</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#equipe">Equipe Técnica</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#responsaveis">Responsáveis</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#mapeamento">Map. Ergonômico</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#plano">Plano de Ação</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#disposicoes">Disposições Finais</a></li>
                </ul>
              </div>
            </li>
            @endif
      
            @if(Config::get('app.explode_path.2') == 'subsetor')
            <li class="nav-item nav-category">Navegação Interna</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#menu-subsetor" aria-expanded="false" aria-controls="menu-subsetor">
                <i class="menu-icon mdi mdi-view-list"></i>
                <span class="menu-title">Opções do Setor</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="menu-subsetor">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="#função">Função</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#tarefa">Tarefa</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#analise-atividade">Análise Atividade</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#legenda-fotos">Descrição Fotos</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#caracteristicas">Org. do Trabalho</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#caracteristicas-do-ambiente">Ambiente</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#saude">Dados de Saúde</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#pre-diagnosticos">Pré Diagnósticos</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#moore">Ferramentas</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#recomendacoes">Recomendações</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#disposicoes">Disposições Finais</a></li>
                </ul>
              </div>
            </li>
            @endif
      
            <li class="nav-item nav-category">Gerenciamento</li>
      
            <li class="nav-item">
              <a class="nav-link" href="{{ route('show-empresas') }}">
                <i class="menu-icon mdi mdi-folder-upload"></i>
                <span class="menu-title">Ver Empresas</span>
              </a>
            </li>
      
            <li class="nav-item">
              <a class="nav-link" href="{{ route('show-identidade') }}">
                <i class="menu-icon mdi mdi-palette-advanced"></i>
                <span class="menu-title">Identidade Visual</span>
              </a>
            </li>
      
            @if (Auth::user()->power == 1)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('show-usuario') }}">
                <i class="menu-icon mdi mdi-account-multiple-outline"></i>
                <span class="menu-title">Controle de Usuários</span>
              </a>
            </li>
            @endif
      
            <li class="nav-item">
              <a class="nav-link" href="{{ route('show-textos') }}">
                <i class="menu-icon mdi mdi-format-text"></i>
                <span class="menu-title">Textos Padrão</span>
              </a>
            </li>
      
            <li class="nav-item">
              <a class="nav-link" href="{{ route('show-lista-recomendacoes') }}">
                <i class="menu-icon mdi mdi-playlist-check"></i>
                <span class="menu-title">Listas</span>
              </a>
            </li>
      
            <li class="nav-item nav-category">Conta</li>
      
            <li class="nav-item">
              <a class="nav-link" href="/info/usuario/{{ Auth::user()->id }}">
                <i class="menu-icon mdi mdi-account-key-outline"></i>
                <span class="menu-title">Alterar Senha</span>
              </a>
            </li>
      
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">
                <i class="menu-icon mdi mdi-logout"></i>
                <span class="menu-title">Logout</span>
              </a>
            </li>
      
          </ul>
        </nav>