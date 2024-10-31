<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Wallet Details - Trash Factory Solution</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/tefastion-high-resolution-logo.png') }}" rel="icon">
  <link href="{{ asset('assets/img/tefastion-high-resolution-logo.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.header')

  <main class="main" data-aos="fade" data-aos-delay="1500">
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              <h3>Wallet Details</h3>
            </div>
            <div class="card-body">
              <h5>Balance: ${{ number_format($wallet->balance, 2) }}</h5>
              @if ($last_transactions == null)
                <h5>No Transaction History</h5>
              @else
              <h5>Last Transaction: {{ $last_transactions->created_at->format('Y-m-d') }}</h5>
              @endif
              <h5>Transaction History:</h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>

              @foreach($transactions as $transaction)
                <tr>
                  <td>{{ $transaction->created_at->format('d M Y H:i') }}</td>
                  <td>{{ ucfirst($transaction->type) }}</td>
                  <td class="{{ $transaction->type == 'deposite' ? 'text-success' : 'text-danger' }}">
                    ${{ number_format($transaction->amount, 2) }}
                  </td> 
                </tr>
              @endforeach
              </tbody>
              </table>
              <div class="d-flex justify-content-around ">
                <a href="{{ route('wallets.deposite') }}" class="btn btn-primary mt-3">Deposite</a>
              
                <a href="{{ route('profiles.index') }}" class="btn btn-secondary mt-3">Back to Profile</a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
