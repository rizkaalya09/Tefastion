<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Trash Factory Solution</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="{{ asset('assets/img/tefastion-high-resolution-logo.png') }}" rel="icon">
  <link href="{{ asset('assets/img/tefastion-high-resolution-logo.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!-- Custom CSS for Placeholder Image -->
  <style>
    .placeholder-image {
      width: 150px; /* Ganti ukuran sesuai kebutuhan */
      height: auto;
    }
  </style>
</head>
<body>
  @include('layouts.header')
  <main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= Page Header ======= -->
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2 style="margin-bottom: 20px;">{{$product->name}}</h2>
            <a class="cta-btn" href="{{ route('contact') }}">Available for hire</a>
          </div>
        </div>
      </div>
    </div><!-- End Page Header -->

    <!-- ======= Gallery Single Section ======= -->
    <section id="gallery-single" class="gallery-single">
      <div class="container">
        <div class="position-relative h-100">
          <div class="slides-1 portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
              @if ($product->images->count() == 0)
              <div class="swiper-slide">
                  <img src="{{ asset('assets/img/tefastion-high-resolution-logo.png')}}" alt="Gambar Default">
              </div>
              @else
              @foreach ($product->images as $image)  
              <div class="swiper-slide">
                  <img src="{{ asset('assets/img/' . $image->image) }}" alt="{{ $image->image }}">
              </div>
              @endforeach
            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          @endif
        </div>

        <div class="row justify-content-between gy-4 mt-4">
          <div class="col-lg-8">
            <div class="portfolio-description">
              <h2>{{ $product->name }}</h2>
              <p>
                <i class="bi bi-quote quote-icon-left"></i>
                {{ $product->description }}
                <i class="bi bi-quote quote-icon-right"></i>
              </p>

              <div class="testimonial-item">
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
                <div>
                  @if ($product->seller->user->image != null)
                    <img src="{{ asset('assets/img/'.$product->seller->user->image) }}" class="testimonial-img" alt="Testimonial Image">
                  @else
                    <img src="{{ asset('assets/img/default.png') }}" class="testimonial-img" alt="Testimonial Image">
                  @endif
                  <h3>{{$product->seller->user->name}}</h3>
                  <h4>{{$product->seller->user->email}}</h4>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 d-flex justify-content-center align-items-center">
            <div class="portfolio-info">
              <h3 style="text-align:center">{{ $product->price }}</h3>
              <ul>
                <li><a href="{{route('checkout', $product->id)}}" class="btn-visit align-self-start">CHECKOUT</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Gallery Single Section -->

  </main><!-- End #main -->
  @include('layouts.footer')

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
