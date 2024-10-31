<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Trash Factory Solution</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/tefastion-high-resolution-logo.png') }}" rel="icon">
  <link href="{{ asset('assets/img/tefastion-high-resolution-logo.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <style>
    .page-header {
      height: 100vh;
    }
    .profile-container {
      max-width: 500px;
      margin: auto;
      text-align: center;
    }
    .profile-image {
      max-width: 150px;
      height: auto;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.header')

  <main class="main" data-aos="fade" data-aos-delay="1500">
    <div class="page-header align-items-center d-flex justify-content-center">
      <div class="container">
        <div class="profile-container">
          <h2>User Profile</h2>
          @if (Auth::user()->image != null)
            <img src="{{ asset('storage/' . Auth::user()->image) }}" class="profile-image rounded-circle" alt="{{ Auth::user()->name }}">
          @else
            <img src="{{ asset('assets/img/default.png') }}" alt="Profile Image" class="profile-image rounded-circle my-3">
          @endif
          <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
          <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
          <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
          <p><strong>Address:</strong> {{ Auth::user()->address }}</p>
          <p><strong>Joined:</strong> {{ Auth::user()->created_at->format('d M Y') }}</p>
          @if (Auth::user()->customer->wallet != null)
          <hr>
            <h3>Wallet</h3>
            <p><strong>Balance:</strong> ${{ Auth::user()->customer->wallet->balance }}</p>
            {{-- <p><strong>Last Transaction:</strong> {{ Auth::user()->wallet->last_transaction_at->format('d M Y H:i') }}</p> --}}
            <div class="d-flex justify-content-evenly">
              <a href="{{ route('wallets.index') }}" class="btn btn-primary">View Wallet</a>
              <a href="{{ route('profiles.edit', Auth::user()) }}" class="btn btn-info">Edit Profile</a>

            </div>
          @else
          <div class="d-flex justify-content-center">
            <a href="{{ route('profiles.edit', Auth::user()) }}" class="btn btn-info mx-3">Edit Profile</a>
            <a href="{{ route('wallets.create') }}" class="btn btn-primary mx-3">Create Wallet</a>
          </div>
          @endif

        </div>
      </div>
    </div><!-- End Page Header -->
  </main><!-- End #main -->

  @include('layouts.footer')

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader">
    <div class="line"></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
