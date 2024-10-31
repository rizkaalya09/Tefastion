<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Shopping Cart - Trash Factory Solution</title>
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

  <style>
  .cart-item {
    margin-bottom: 20px;
    background-color: black; /* Add this line to change the background color to black */
    color: white;
    border: 1px solid #333; /* Add a border */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a shadow */
  }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.header')

  <main class="main" data-aos="fade" data-aos-delay="1500">
    <div class="page-header align-items-center d-flex justify-content-center">


      <div class="container mt-5">
          <div class="row">
            <div class="col-md-10 offset-md-1">
              <h3>Shopping Cart</h3>
              <div class="cart-items">
                <div class="card cart-item">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                        
                      @endif
                      @if ($product->images()->count() == 0)
                        <img src="https://via.placeholder.com/300" class="card-img" alt="{{ $product->name }}" style="height: 100%">
                      @else  
                      <img src="{{ asset('assets/img/' . $product->images->first()->image) }}" class="card-img" alt="{{ $product->name }}">
                      @endif
                    </div>
                    <div class="col-md-8">
                      <form action="{{route('sales.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="wallet_id" value="{{Auth::user()->customer->wallet->id}}">
                        <div class="card-body">
                          <h5 class="card-title">{{ $product->name }}</h5>
                          <p class="card-text">{{ $product->description }}</p>
                          <p class="card-text"><strong>Price:</strong> $<span class="price" data-price="{{ $product->price }}">{{ number_format($product->price * $quantity, 2) }}</span></p>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text mr-3">Quantity</span>
                            </div>
                            <input type="number" name="quantity" class="form-control quantity-input" min="1" value="{{ $quantity }}" data-id="{{ $id }}">
                            
                          </div>
                          <input type="hidden" name="total" value="{{ $product->price * $quantity }}"> <!-- Input hidden untuk total harga -->
  
                          <!-- Add user information here -->
                          <h5>User Information</h5>
                          <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" class="form-control" value="{{ Auth::user()->name }}">
                          </div>
                          <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" class="form-control" value="{{ Auth::user()->email }}">
                          </div>
                          <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="tel" id="phone" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                          </div>
                          <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{ Auth::user()->address }}">
                          </div>
                        </div>
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Buy Now</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </div>
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

<script>
    document.querySelectorAll('.quantity-input').forEach(input => {
      input.addEventListener('change', function() {
        const itemId = this.getAttribute('data-id');
        const newQuantity = this.value;
        const priceElement = this.closest('.card-body').querySelector('.price'); // Change the selector to '.price'
        const unitPrice = priceElement.getAttribute('data-price');
        const newPrice = (unitPrice * newQuantity).toFixed(2);

        priceElement.textContent = newPrice;

        // Update the total price input field
        const totalPriceInput = document.querySelector('input[name="total"]');
        totalPriceInput.value = newPrice;

        fetch(`/carts/${itemId}`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({ quantity: newQuantity })
        })
        .then(response => response.json())
        .then(data => {
          if (!data.success) {
            alert('Failed to update cart item');
          }
        });
      });
    });
  </script>

</body>

</html>
