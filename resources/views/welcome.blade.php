<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Trash Factory Solution</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
  <link href="assets/css/main.css" rel="stylesheet">

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

  <!-- ======= Header ======= -->
 @include('layouts.header')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" data-aos="fade" data-aos-delay="1500">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Welcome To Our Future Recylcling</h2>
          <p> Recylcling Make Future Better</p>
          <a href="about.html" class="btn-get-started">Click Here</a> 
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

   <!-- slider  -->
  
   <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div style="margin-left: 30%;" class="carousel-item active">
            <img style="width: 40%;" src="{{asset('assets/img/gallery/bersihsampah.jpeg')}}" class="d-block" alt="...">
        </div>
        <div style="margin-left: 30%;" class="carousel-item">
            <img style="width: 40%;" src="{{asset('assets/img/gallery/bersihsampah.jpeg')}}" class="d-block" alt="...">
        </div>
        <div style="margin-left: 30%;" class="carousel-item">
            <img style="width: 40%;" src="{{asset('assets/img/gallery/bersihsampah.jpeg')}}" class="d-block" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


   <!-- end slider  -->

  <main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container">

        <div style="margin-top: 5px;" class="row gy-4 justify-content-center">
            @foreach ($categories as $category)
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="gallery-item h-100">
                        <img src="{{ asset('assets/img/gallery/' . $category->image) }}" class="img-fluid" alt="">
                        <a class="gallery-links d-flex align-items-center justify-content-center" href="{{route('products')}}"></a>
                    </div>
                </div>
            @endforeach
        </div>

      </div>
    </section><!-- End Gallery Section -->

    
          


          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

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