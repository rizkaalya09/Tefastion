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
  <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">
</head>
<body>

  <div class="container-fluid">
    <!-- Sidebar -->
    @include('layouts.sidebar')
    <div class="main">
      <div class="main-content">
        <div class="text-center mb-4">
          <h3>Add New Seller</h3>
          <p class="text-muted">Complete the form below to add a new seller</p>
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

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <form action="{{route('users.store')}}" method="post" style="min-width:300px;" enctype="multipart/form-data">
                @csrf

                <input type="text" hidden value="seller" name="role">
                <div class="mb-3">
                  <label for="name" class="form-label">* Nama:</label>
                  <input type="text" class="form-control" name="name" placeholder="Masukkan nama">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">* Email:</label>
                  <input type="text" class="form-control" name="email" placeholder="Masukkan email">
                </div>
                <div class="mb-3">
                  <label class="form-label" for="phone">No. Handphone :</label>
                  <input type="text" class="form-control" name="phone" placeholder="Masukkan nomor handphone">
                </div>

                <div class="mb-3">
                  <label class="form-label" for="address">* Alamat:</label>
                  <input type="text" class="form-control" name="address" placeholder="Masukkan alamat">
                </div>

                <div class="mb-3">
                  <label class="form-label" for="password">* Password:</label>
                  <input type="password" class="form-control"name="password" placeholder="******">
                </div>
                <div class="mb-3">
                  <label class="form-label" for="password_confirmation">* Password:</label>
                  <input type="password" class="form-control"name="password_confirmation" placeholder="******">
                </div>

                <div class="mb-3">
                  <label for="image" class="form-label">* Gambar:</label>
                  <input type="file" class="form-control" id="image" name="image" accept="image/png, image/jpeg, image/jpg" onchange="previewImage(event)">
                  <img id="preview" src="" alt="Gambar akan ditampilkan di sini" style="display: none; margin-top: 10px; max-width: 200px;">
                </div>

                <script>
                  function previewImage(event) {
                    var reader = new FileReader();
                    reader.onload = function(){
                      var output = document.getElementById('preview');
                      output.src = reader.result;
                      output.style.display = 'block';
                    };
                    reader.readAsDataURL(event.target.files[0]);
                  }
                </script>

                <div class="d-flex justify-content-center">
                  <button type="submit" name="Save" id="submit" class="btn  btn-success me-3">Save</button>
                  <a href="{{route('users.index')}}" class="btn btn-danger">Cancel</a>
                </div>
              </form>
            </div>
          </div>
        
      </div>
       

    </div>
  </div><!-- End Container Fluid -->

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

