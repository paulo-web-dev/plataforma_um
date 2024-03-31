@include('layouts.header-institucional')
<script src="https://sdk.mercadopago.com/js/v2"></script>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{route('index')}}">Plataforma Um</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets_institucional/img/logo.png" alt="" class="img-fluid"></a>-->


    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row"> 
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>PLataforma Geradora de AET e Análise Ergonômica</h1>
          <h2>Uma plataforma completa para fisioterapeutas e empresas do ramo de ergonômia</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
         <a href="#pricing" class="btn-get-started">Comece Já</a>


            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Introdução</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{url('assets_institucional/img/hero-img.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
  <main id="main">

  <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">

      <div class="container" data-aos="fade-up">
<center>
       
@if($plano == 'Basic')
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100" id="plano">
            <div class="box">
              <h3>Basic</h3>
              <h4><sup>$</sup>399<span>/Mês</span></h4>
              <ul>
                <li><i class="bx bx-check"></i>AETS Ilimitadas</li>
                <li><i class="bx bx-check"></i>Suporte e Treinamento no Sistema</li>
                <li><i class="bx bx-check"></i> 1 Usuário</li>
                <li class="na"><i class="bx bx-x"></i> <span>Ferramentas Personalizadas</span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Armazenamento Ilimitado de Arquivos e AETS no sistema</span></li>
              </ul>
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalpgto" class="btn-get-started">Contratar</a>
            </div>
          </div>


@elseif($plano == 'Plus')
  <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200" id="plano">
            <div class="box featured">
              <h3>Performance Fisio Pro</h3>
              <h4><sup>$</sup>499<span>/Mês</span></h4>
              <ul>
             <li><i class="bx bx-check"></i>AETS Ilimitadas</li>
                <li><i class="bx bx-check"></i>Suporte e Treinamento no Sistema</li>
                <li><i class="bx bx-check"></i> 5 Usuários</li>
                <li><i class="bx bx-check"></i> Ferramentas Personalizadas</li>
                <li><i class="bx bx-check"></i>Armazenamento Ilimitado de Arquivos e AETS no sistema</li>
              </ul>
               <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalpgto" class="btn-get-started">Contratar</a>
            </div>
          </div>
@elseif($plano == 'Premium')
 <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300" id="plano">
            <div class="box">
              <h3>Fisio Total Care</h3>
              <h4><sup>$</sup>999<span>/Mês</span></h4>
              <ul>
              <li><i class="bx bx-check"></i>AETS Ilimitadas</li>
                <li><i class="bx bx-check"></i>Suporte e Treinamento no Sistema</li>
                <li><i class="bx bx-check"></i>Usuários Ilimitados</li>
                <li><i class="bx bx-check"></i> Ferramentas Personalizadas</li>
                <li><i class="bx bx-check"></i> Armazenamento Ilimitado de Arquivos e AETS no sistema</li>
              </ul>
               
                  <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalpgto" class="btn-get-started">Contratar</a>
            </div>
          </div>
@endif
      </center>
    </section><!-- End Pricing Section -->

{{-- Modal Checkout --}}
<div class="modal fade" id="modalpgto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="background-color: #36517e; color: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Finalização de compra</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- Informações do comprador -->
          <div class="col-md-6">
            <label for="nome" style="color: #fff;">Nome</label>
            <input type="text" id="nome" class="form-control" style="background-color: #fff; color: #000;">
            
            <label for="cpfcpnjp" style="color: #fff;">CPF/CNPJ</label>
            <input type="number" id="cpfcpnjp" class="form-control" style="background-color: #fff; color: #000;">

           
          </div>
          
          <!-- Informações do cartão -->
          <div class="col-md-6">

           
            <label for="celular" style="color: #fff;">Celular</label>
            <input type="number" id="celular" class="form-control" style="background-color: #fff; color: #000;">
            
            <label for="email_titular" style="color: #fff;">Email</label>
            <input type="email" id="email_titular" class="form-control" style="background-color: #fff; color: #000;">
            
            <input type="hidden" id="linkpgto" value="{{$link}}">

            <!-- Campos genéricos do cartão -->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="confirmModal()">Confirmar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

  {{-- Modal Loading --}}
<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <img src="https://i.gifer.com/ZKZg.gif" alt="Carregando...">
      </div>
    </div>
  </div>
</div>
  {{-- Modal erro --}}
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Erro Na Finalização Confira Seus Dados</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="https://media0.giphy.com/media/8L0Pky6C83SzkzU55a/200w.gif?cid=6c09b952orr5our88zymwdgx7lpi6l92pkljjlhmvx0u1fek&ep=v1_gifs_search&rid=200w.gif&ct=g" alt="Carregando...">
      </div>
    </div>
  </div>
</div>
{{-- Modal Sucesso --}}
<div class="modal fade" id="sucssesModal" tabindex="-1" role="dialog" aria-labelledby="sucssesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <div class="modal-header">
        <h5 class="modal-title" id="sucssesModalLabel">Cadastro Realizado com sucesso, iremos te redirecionar ao link de pagamento </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="https://i.pinimg.com/originals/90/13/f7/9013f7b5eb6db0f41f4fd51d989491e7.gif" alt="Carregando..." style="width: 80%">
      </div>
    </div>
  </div>
</div>
<script>
 function confirmModal(){


      $('#loadingModal').modal('show');
  // Aqui você colocaria a lógica para confirmar algo ou realizar alguma ação
  // Por exemplo, enviar uma requisição AJAX

  // Depois que a ação for concluída, você pode ocultar o modal
 


    var nome = $("#nome").val();
    var cpfcpnjp = $("#cpfcpnjp").val();
    var celular = $("#celular").val();
    var email_titular = $("#email_titular").val();
    var linkpgto = $("#linkpgto").val();
    
    $.ajax({
        url: "/api/asaas/cartao",
        type: "POST",
        contentType: "application/json",
           data: JSON.stringify({ 
        nome: nome,
        cpfcpnjp: cpfcpnjp,
        celular: celular,
        email_titular: email_titular,
        
       
    }),
        success: function(response) {
           
            $('#loadingModal').modal('hide');
            $('#sucssesModal').modal('show');
             setTimeout(function() {
              window.location.href = linkpgto;
          }, 3000); 
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseJSON.message);
             $('#loadingModal').modal('hide');
             $('#errorModal').modal('show');
        }
    });

 }
</script>


  </main><!-- End #main -->
@include('layouts.footer-institucional')