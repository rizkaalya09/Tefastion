<!-- resources/views/dashboard/index.blade.php -->
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
    @include('layouts.sidebar')
    <div class="main">
      <div class="main-content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>
        @if (Auth::user()->role == 'seller')
        <a href="{{ route('products.create') }}" class="btn btn-dark mb-3">Add New Product</a>
        <table class="table table-hover text-center">
          <thead class="table-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Gambar</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Stok</th>
              <th scope="col">Kategori</th>
              <th scope="col">Harga</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
            <tr>
              <td>{{ $product->id }}</td>
              @if ($product->images->count() == 0)
                <td>No Image</td>
              @else
              <td><img src="{{ asset('assets/img/'.$product->images->first()->image) }}" alt="gambar" width="100px"></td>
              @endif
              <td>{{ $product->name }}</td>
              <td>{{ $product->stock }}</td>
              <td>{{ $product->category->name }}</td>
              <td>{{ $product->price }}</td>
              <td>
                <a href="{{ route('products.edit', ['product' => $product]) }}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{ route('products.show', ['product' => $product]) }}" class="btn btn-info btn-sm">View</a>
                <form action="{{ route('products.destroy', ['product' => $product]) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
        <table class="table table-hover text-center">
          <thead class="table-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Gambar</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Nama Penjual</th>
              <th scope="col">Stok</th>
              <th scope="col">Kategori</th>
              <th scope="col">Harga</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($products as $product)
          <tr>
            <td>{{ $product->id }}</td>
            @if ($product->images->count() == 0)
              <td>No Image</td>
            @else
            <td><img src="{{ asset('assets/img/'.$product->images->first()->image) }}" alt="gambar" width="100px"></td>
            @endif
            <td>{{ $product->name }}</td>
            <td>{{ $product->seller->user->name }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->price }}</td>
            <td>
              <a href="{{ route('products.show', ['product' => $product]) }}" class="btn btn-info btn-sm">View</a>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
        @endif
        <div class="d-flex justify-content-center">
          {{ $products->links('pagination::bootstrap-5') }}
        </div>
      </div>
    </div>
  </div><!-- End Container Fluid -->

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
