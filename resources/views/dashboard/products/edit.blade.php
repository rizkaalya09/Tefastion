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
         <div class="container">
            <div class="text-center mb-4">
               <h3>Edit Product</h3>
               <p class="text-muted">Complete the form below to edit the product</p>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            @endif

            <div class="container d-flex justify-content-center">
               <form action="{{ route('products.update', ['product' => $product]) }}" method="post" style="width:50vw; min-width:300px;" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                     <label for="name" class="form-label">Nama Barang:</label>
                     <input type="text" class="form-control" name="name" value="{{ old('name', $product->name ?? '') }}" placeholder="Masukkan nama barang">
                  </div>
                  <div class="mb-3">
                     <label for="category_id" class="form-label">Kategori:</label>
                     <select class="form-select" name="category_id">
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="mb-3">
                     <label class="form-label" for="description">Deskripsi:</label>
                     <textarea class="form-control" name="description" rows="4" placeholder="Masukkan deskripsi produk...">{{ old('description', $product->description ?? '') }}</textarea>
                  </div>
                  <div class="mb-3">
                     <label class="form-label" for="price">Harga :</label>
                     <input type="text" class="form-control" name="price" value="{{ old('price', $product->price ?? '') }}" placeholder="Masukkan harga barang">
                  </div>
                  <div class="mb-3">
                     <label class="form-label" for="stock">Stok :</label>
                     <input type="text" class="form-control" name="stock" value="{{ old('quantity', $product->quantity ?? '') }}" placeholder="Masukkan stok barang">
                  </div>
                  <div class="mb-3">
                     <label for="image" class="form-label">Gambar:</label>
                     <input type="file" class="form-control" name="image" accept="image/png, image/jpeg, image/jpg" onchange="previewImage(event)">
                     <small id="imageName" class="form-text text-muted">{{ $product->image ?? 'No file chosen' }}</small>
                     @if ($product->image != null)                        
                        <img id="preview" src="{{ asset('assets/img/'.$product->image) }}" alt="Preview Gambar" class="img-fluid mt-3" style="display: block; max-height: 200px;">
                     @else
                        <img id="preview" src="" alt="Preview Gambar" class="img-fluid mt-3" style="display: none; max-height: 200px;">
                     @endif
                  </div>
                  <div>
                     <input type="submit" name="Save" id="submit" class="btn btn-success">
                     <a href="{{ route('products.index') }}" class="btn btn-danger">Cancel</a>
                  </div>
               </form>
            </div>
         </div>

         <script>
            function previewImage(event) {
               var reader = new FileReader();
               var imageField = document.getElementById("preview");
               reader.onload = function() {
                  if (reader.readyState === 2) {
                     imageField.style.display = "block";
                     imageField.src = reader.result;
                  }
               }
               reader.readAsDataURL(event.target.files[0]);

               // Update the text to the file name
               var imageName = document.getElementById("imageName");
               imageName.textContent = event.target.files[0].name;
            }
         </script>
      </div>
    </div>
  </div><!-- End Container Fluid -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
