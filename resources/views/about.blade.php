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
            <h2>Cerita Kita</h2>
            <p>"Tefastion berawal dari ide dua pemuda yang merasa risih melihat banyaknya sampah di sekitar mereka. Dengan tekad untuk menciptakan perubahan, mereka memulai perjalanan menuju solusi inovatif yang menggabungkan kreativitas, keberlanjutan, dan teknologi dalam bentuk perusahaan berbasis platform digital yang menyatukan pengrajin lokal untuk mengelola limbah dengan lebih baik."</p>
            <br>

            <a class="cta-btn" href="{{route('contact')}}">Click For Looking for Founder</a>

          </div>
          
        </div>
      </div>
    </div><!-- End Page Header -->

    
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-header">
          <h2>Profile</h2>
          <p>What Is Tefastion</p>
        </div>

        
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4">
            <img src="{{asset('assets/img/tefastion-high-resolution-logo.png')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-5 content">
            <h2>Trash Factory Solution</h2>
            <p class="fst-italic py-3">
              Platform Digital untuk membantu mengatasi populasi sampah
            </p>
            
            <p class="py-1">
              Trash Factory Solution adalah sebuah perusahaan inovatif yang beroperasi di bidang pengelolaan limbah, dengan fokus utama pada solusi berbasis platform digital ecommerce. Dengan visi untuk menciptakan lingkungan yang lebih bersih dan berkelanjutan, Trash Factory Solution menjalin kemitraan yang erat dengan pengrajin lokal. Melalui platform digitalnya, perusahaan ini memberikan peluang kepada pengrajin lokal untuk menjual produk mereka secara online, dengan bahan baku yang didaur ulang dari limbah. </p>

              <p>
              Konsep ini tidak hanya membantu mengurangi jumlah limbah yang mencemari lingkungan, tetapi juga memberikan dukungan ekonomi kepada komunitas pengrajin lokal. Trash Factory Solution tidak hanya sekadar perusahaan, melainkan sebuah gerakan untuk mengubah paradigma pengelolaan limbah menjadi lebih berkelanjutan, menjembatani kebutuhan konsumen modern dengan dampak positif pada lingkungan dan perekonomian lokal.
            </p>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

  </main><!-- End #main -->
  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">
    <div class="container">

      <div class="section-header">
        <h2>Testimonials</h2>
        <p>What they are saying</p>
      </div>

      <div class="slides-3 swiper">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                "Platform ini sangat membantu dalam mengurangi populasi sampah yang tercemar"
              </p>
              <div class="profile mt-auto">
                <img src="{{asset('assets/img/testimonials/M NAUFAL 2.PNG')}}" class="testimonial-img" alt="">
                <h3>Naufal Rizky</h3>
                <h4>Founder</h4>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                "Sangat Efektif dalam mengurangi limbah sampah lingkungan"
              </p>
              <div class="profile mt-auto">
                <img src="{{asset('assets/img/testimonials/HANIF.png')}}" class="testimonial-img" alt="">
                <h3>HANIF</h3>
                <h4>Ceo</h4>
              </div>
            </div>
          </div><!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                "Dapat membantu keseharian dalam membersihkan sampah"
              </p>
              <div class="profile mt-auto">
                <img src="{{asset('assets/img/testimonials/KEVIN.png')}}" class="testimonial-img" alt="">
                <h3>Kevin</h3>
                <h4>Digital Teal</h4>
              </div>
            </div>
          </div><!-- End testimonial item -->

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