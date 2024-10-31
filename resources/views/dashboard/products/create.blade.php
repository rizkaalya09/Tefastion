<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>PHP CRUD Application</title>
   <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">
</head>

<body>

  <div class="container-fluid">
    @include('layouts.sidebar')
    <div class="main">
        <div class="container">
      <div class="text-center mb-4">
         <h3>Add New Barang</h3>
         <p class="text-muted">Complete the form below to edit a new product</p>
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
         <form action="{{ route('products.store') }}" method="post" style="width:50vw; min-width:300px;" enctype="multipart/form-data">
          @csrf
            <div class="mb-3">
               <label for="name" class="form-label">Nama Barang:</label>
               <input type="text" class="form-control" name="name" placeholder="Masukkan nama barang">
            </div>
            <div class="mb-3">
               <label for="category_id" class="form-label">Kategori:</label>
               <select class="form-select" name="category_id">
                  <option value="">Pilih Kategori</option>
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
               </select>
            </div>
            <div class="mb-3">
               <label class="form-label" for="description">Deskripsi:</label>
               <textarea class="form-control" name="description" rows="4" placeholder="Masukkan deskripsi produk..."></textarea>
            </div>
            <div class="mb-3">
               <label class="form-label" for="price">Harga :</label>
               <input type="text" class="form-control" name="price" placeholder="Masukkan harga barang">
            </div>
            <div class="mb-3">
               <label class="form-label" for="stock">Stok :</label>
               <input type="text" class="form-control" name="stock" placeholder="Masukkan stok barang">
            </div>
            <div class="mb-3">
               <label for="image" class="form-label">Gambar:</label>
               <input type="file" class="form-control" name="image[]" accept="image/png, image/jpeg, image/jpg" multiple onchange="previewImage(event)">
               <div id="preview"></div>
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
   var imageField = document.getElementById("preview");
   imageField.innerHTML = ""; // clear previous preview
   for (var i = 0; i < event.target.files.length; i++) {
      var reader = new FileReader();
      reader.onload = function(e) {
         var img = document.createElement("img");
         img.src = e.target.result;
         img.classList.add("img-fluid");
         img.style.maxHeight = "200px";
         img.style.marginTop = "3rem";
         imageField.appendChild(img);
      }
      reader.readAsDataURL(event.target.files[i]);
   }
}
   </script>
      </div>
    </div>
  </div>
   

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
