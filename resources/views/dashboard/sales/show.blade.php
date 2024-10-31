<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard Seller</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
</head>
<body>

  <div class="container-fluid">
    <!-- Sidebar -->
    @include('layouts.sidebar')
    <div class="main">
      <div class="main-content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>
        <div class="card mt-3">
          <div class="card-body">
            <h5 class="card-title">Product Information</h5>
            <p class="card-text"><strong>Product Name: </strong> {{ $sale->product->name }}</p>
            <p class="card-text"><strong>Description: </strong> {{ $sale->product->description }}</p>
            <p class="card-text"><strong>Price: </strong> ${{ $sale->product->price }}</p>
            <p class="card-text"><strong>Category: </strong> {{ $sale->product->category->name }}</p>
            <hr>
            <h5 class="card-title">Customer Information</h5>
            <p class="card-text"><strong>Name: </strong> {{ $sale->wallet->customer->user->name }}</p>
            <p class="card-text"><strong>Email: </strong> {{ $sale->wallet->customer->user->email }}</p>
            <p class="card-text"><strong>Phone: </strong> {{ $sale->phone }}</p>
            <p class="card-text"><strong>Address: </strong> {{ $sale->address }}</p>
            <hr>
            <h5 class="card-title">Sales Information</h5>
            <p class="card-text"><strong>Date: </strong> {{ $sale->created_at->format('Y-m-d') }}</p>
            <p class="card-text"><strong>Total Quantity: </strong> {{ $sale->quantity }}</p>
            <p class="card-text"><strong>Total Price: </strong>{{$sale->total}}</p>
          </div>
        </div>
        <a href="{{ route('sales.index') }}" class="btn btn-dark mt-3">Back</a>
      </div>
        </div>
      </div>
    </div>
  </div><!-- End Container Fluid -->

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
