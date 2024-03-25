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
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalpgto" class="btn-get-started">Contratar</a>
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
               <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalpgto" class="btn-get-started">Contratar</a>
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
               
                  <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalpgto" class="btn-get-started">Contratar</a>
            </div>
          </div>
@endif
      </center>
    </section><!-- End Pricing Section -->
       
<div class="modal fade" id="modalpgto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Nome -->
        <label for="nome">Nome</label>
        <input type="text" id="nome" class="form-control"  >
        
        <!-- CPF -->
        <label for="cpf">CPF</label>
        <input type="number" id="cpf" class="form-control" >
{{--         
        <!-- Credit Card Holder Info -->
        <label for="holderName">Holder Name</label>
        <input type="text" id="holderName" class="form-control" value="Paulo Sérgio Cardeliquio Orfanelli" >
        
        <label for="number">Card Number</label>
        <input type="text" id="number" class="form-control" value="5226260068461430" >
        
        <label for="expiryMonth">Expiry Month</label>
        <input type="text" id="expiryMonth" class="form-control" value="12" >
        
        <label for="expiryYear">Expiry Year</label>
        <input type="text" id="expiryYear" class="form-control" value="2031" >
        
        <label for="ccv">CCV</label>
        <input type="text" id="ccv" class="form-control" value="550" >
        
        <!-- Credit Card Holder Info -->
        <label for="name">Name</label>
        <input type="text" id="name" class="form-control" value="Paulo Sérgio Cardeliquio Orfanelli" >
        
        <label for="cpfCnpj">CPF/CNPJ</label>
        <input type="text" id="cpfCnpj" class="form-control" value="41743114800" >
        
        <label for="email">Email</label>
        <input type="text" id="email" class="form-control" value="paulosergioorfanelli@gmail.com" >
        
        <label for="postalCode">Postal Code</label>
        <input type="text" id="postalCode" class="form-control" value="13224230" >
        
        <label for="addressNumber">Address Number</label>
        <input type="text" id="addressNumber" class="form-control" value="Rua Mercúrio, 452" >
        
        <label for="phone">Phone</label>
        <input type="text" id="phone" class="form-control" value="11941766319" >
        
        <!-- Customer -->
        <label for="customer">Customer</label>
        <input type="text" id="customer" class="form-control" value="cus_000005938273" >
        
        <!-- Value -->
        <label for="value">Value</label>
        <input type="text" id="value" class="form-control" value="5" >
        
        <!-- Due Date -->
        <label for="dueDate">Due Date</label>
        <input type="text" id="dueDate" class="form-control" value="2024-05-05" >
        
        <!-- Remote IP -->
        <label for="remoteIp">Remote IP</label>
        <input type="text" id="remoteIp" class="form-control" value="179.48.51.27" > --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="confirmModal()">Confirmar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>         

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
const options = {
  method: 'POST',
  headers: {
    accept: 'application/json',
    'content-type': 'application/json',
    access_token: '$aact_YTU5YTE0M2M2N2I4MTliNzk0YTI5N2U5MzdjNWZmNDQ6OjAwMDAwMDAwMDAwMDAwNzY5OTg6OiRhYWNoXzY2YTg2MWY5LWUyMDUtNGJlMS05MmMxLTA3NTBmYTIxY2I0Yg=='
  },
  body: JSON.stringify({name: 'paulo', cpfCnpj: '24971563792'})
};

fetch('https://sandbox.asaas.com/api/v3/customers', options)
  .then(response => response.json())
  .then(response => console.log(response))
  .catch(err => console.error(err));
</script>
  </main><!-- End #main -->
@include('layouts.footer-institucional')