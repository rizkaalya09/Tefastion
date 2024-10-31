<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Trash Factory Solution</title>
    <!-- Favicons -->
  <link href="{{asset('assets/img/tefastion-high-resolution-logo.png')}}" rel="icon">
  <link href="{{asset('assets/img/tefastion-high-resolution-logo.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: PhotoFolio
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Mendapatkan tombol login dan sign up
      var loginButton = document.getElementById("perubahwarna");
      var signUpButton = document.querySelector(".kotak");

      // Menambahkan event listener untuk tombol login
      loginButton.addEventListener("click", function() {
        // Mengarahkan pengguna ke halaman index2.html saat tombol login diklik
        window.location.href = "login.html";
      });

      // Menambahkan event listener untuk tombol sign up
      signUpButton.addEventListener("click", function() {
        // Mengarahkan pengguna ke halaman index2.html saat tombol sign up diklik
        window.location.href = "register.html";
      });
    });
  </script>
</head>
<body>
  @include('layouts.header')
   <main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>Categories</h2>
            <p>Barang Bekas Organik dan Non Organik</p>

            <a class="cta-btn" href="{{route('contact')}}">Available for hire</a>

          </div>
        </div>
      </div>
    </div><!-- End Page Header -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="row gy-4 justify-content-center">
          <div class="col-xl-2 col-lg-3 col-md-6">
            <div class="gallery-item h-100">
              <img src="assets/img/gallery/pakaian bekas.png" class="img-fluid" alt="">
              <a class="gallery-links d-flex align-items-center justify-content-center" href="/kategori/kategoribotolplastik.html"></a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-xl-2 col-lg-3 col-md-6">
            <div class="gallery-item h-100">
              <img src="assets/img/gallery/botol kaca bekas.png" class="img-fluid" alt="">
              <a class="gallery-links d-flex align-items-center justify-content-center" href="/kategori/kategoribotolplastik.html"></a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-xl-2 col-lg-3 col-md-6">
            <div class="gallery-item h-100">
              <img src="assets/img/gallery/TV BEKAS color 5.png" class="img-fluid" alt="">
              <a class="gallery-links d-flex align-items-center justify-content-center" href="/kategori/kategoribotolplastik.html"></a>
            </div>
          </div><!-- End Gallery Item -->

          <div class="col-xl-2 col-lg-3 col-md-6">
            <div class="gallery-item h-100">
              <img src="assets/img/gallery/buah bekas.png" class="img-fluid" alt="">
              <a class="gallery-links d-flex align-items-center justify-content-center" href="/kategori/kategoribotolplastik.html"></a>
            </div>
          </div><!-- End Gallery Item -->

          

        </div>

      </div>
    </section><!-- End Gallery Section -->

  </main><!-- End #main -->

  @include('layouts.footer')
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader">
    <div class="line"></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

  
</body>
</html>