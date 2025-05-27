
  <!-- ======= Footer ======= -->
  <footer id="footer">
{{-- 
    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Joi Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Plataforma Um</h3>
            <p>
              Rua Carlos Gomes 749 <br>
              Ponte São João, Jundiaí - SP<br>
             <br>
              {{-- <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br> --}}
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Links Úteis</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">Sobre</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#why-us">Porque Nós?</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#pricing">Preços</a></li>
              <li><a class="getstarted scrollto" href="{{route('show-inscricao')}}">Teste Grátis</a></li>
            </ul>
          </div>

        

        

        </div>
      </div>
    </div>

  </footer><!-- End Footer -->

  <div id="preloader"></div>
  {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}

  <!-- Vendor JS Files -->
<script src="{{url('assets_institucional/vendor/aos/aos.js')}}"></script>
<script src="{{url('assets_institucional/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('assets_institucional/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{url('assets_institucional/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{url('assets_institucional/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{url('assets_institucional/vendor/waypoints/noframework.waypoints.js')}}"></script>
<script src="{{url('assets_institucional/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{url('assets_institucional/js/main.js')}}"></script>
<style>
  .whatsapp-float {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 20px;
    right: 20px;
    background-color: #25d366;
    color: white;
    border-radius: 50%;
    text-align: center;
    box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .whatsapp-float img {
    width: 35px;
    height: 35px;
  }

  .whatsapp-float:hover {
    background-color: #1ebe5d;
  }
</style>

<a href="https://wa.me/5511963379494" class="whatsapp-float" target="_blank" title="Fale conosco no WhatsApp">
  <i class="bi bi-whatsapp"></i>
</a>

</body>

</html> 