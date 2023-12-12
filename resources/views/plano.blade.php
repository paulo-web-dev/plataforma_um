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
            <a href="#pricing" class="btn-get-started scrollto">Comece Já</a>
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
  <script>
                
    const mp = new MercadoPago('APP_USR-b0820842-a6fb-44fe-b59b-ead639377144');
    const bricksBuilder = mp.bricks();

                </script>
  <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">
<center>
       
@if($plano == 'Fundamentos Fisio')
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="box">
              <h3>Fundamentos Fisio</h3>
              <h4><sup>$</sup>29<span>/Mês</span></h4>
              <ul>
                <li><i class="bx bx-check"></i>AETS Ilimitadas</li>
                <li><i class="bx bx-check"></i>Suporte e Treinamento no Sistema</li>
                <li><i class="bx bx-check"></i> 1 Usuário</li>
                <li class="na"><i class="bx bx-x"></i> <span>Ferramentas Personalizadas</span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Armazenamento Ilimitado de Arquivos e AETS no sistema</span></li>
              </ul>
             <div id="wallet_container"></div>
            </div>
          </div>


@elseif($plano == 'Performance Fisio Pro')
  <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box featured">
              <h3>Performance Fisio Pro</h3>
              <h4><sup>$</sup>49<span>/Mês</span></h4>
              <ul>
             <li><i class="bx bx-check"></i>AETS Ilimitadas</li>
                <li><i class="bx bx-check"></i>Suporte e Treinamento no Sistema</li>
                <li><i class="bx bx-check"></i> 5 Usuários</li>
                <li><i class="bx bx-check"></i> Ferramentas Personalizadas</li>
                <li><i class="bx bx-check"></i>Armazenamento Ilimitado de Arquivos e AETS no sistema</li>
              </ul>
               <div id="wallet_container"></div>
            </div>
          </div>
@elseif($plano == 'Fisio Total Care')
 <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box">
              <h3>Fisio Total Care</h3>
              <h4><sup>$</sup>79<span>/Mês</span></h4>
              <ul>
              <li><i class="bx bx-check"></i>AETS Ilimitadas</li>
                <li><i class="bx bx-check"></i>Suporte e Treinamento no Sistema</li>
                <li><i class="bx bx-check"></i>Usuários Ilimitados</li>
                <li><i class="bx bx-check"></i> Ferramentas Personalizadas</li>
                <li><i class="bx bx-check"></i> Armazenamento Ilimitado de Arquivos e AETS no sistema</li>
              </ul>
                 <div id="wallet_container"></div>
            </div>
          </div>
@endif
      </center>
    </section><!-- End Pricing Section -->
       
                 

<script>

mp.bricks().create("wallet", "wallet_container", {
   initialization: {
       preferenceId: "{{$preference->id}}",
   }, 
});

</script>
  
  </main><!-- End #main -->
@include('layouts.footer-institucional')