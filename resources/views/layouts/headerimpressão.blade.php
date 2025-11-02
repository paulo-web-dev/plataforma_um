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

          .closed {
        display: none;
    }
  
    /* .side-menu--active {
        border: 1px solid white;
    } */
</style>
<!-- END: Head -->
<body class="py-5">
    <!-- BEGIN: Mobile Menu -->
    
                           
           
        </nav>
        <!-- END: Top Menu -->
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
   
            @yield('content')
        </div>
        <!-- END: Content -->
        <!-- BEGIN: JS Assets-->
        <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
        <!--Script do iconify-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
        {{-- <script src="dist/js/app.js"></script> --}}
        <script src="{{ url('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
        @stack('custom-scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.side-menu__title').forEach(function (element) {
            element.addEventListener('click', function () {
                var submenu = this.nextElementSibling;
                submenu.classList.toggle('closed');
            });
        });
    });
</script>


</body>

</html>
