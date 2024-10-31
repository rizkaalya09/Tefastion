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

  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }
    #main {
      flex: 1;
    }
    #sidebar {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .nav-link {
      font-size: 1.25rem;
      padding: 1rem;

    }
    .nav-link, p, h5 {
      color: #fff;
    }
    .nav-link i {
      margin-right: 0.5rem;
    }
    .card {
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      @include('layouts.sidebar')
      
      <!-- Main Content -->
      <div id="main" class="col-md-9 mt-4 ms-sm-auto col-lg-10 px-md-4">
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
              <form action="{{ route('users.update', ['user' => $user]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" hidden value="seller" name="role">
                <div class="mb-3">
                  <label for="name" class="form-label">* Nama:</label>
                  <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Masukkan nama">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">* Email:</label>
                  <input type="text" class="form-control" name="email" value="{{$user->email}}" placeholder="Masukkan email">
                </div>
                <div class="mb-3">
                  <label class="form-label" for="phone">No. Handphone :</label>
                  <input type="text" class="form-control" name="phone" value="{{$user->phone}}" placeholder="Masukkan nomor handphone">
                </div>

                <div class="mb-3">
                  <label class="form-label" for="address">* Alamat:</label>
                  <input type="text" class="form-control" name="address" value="{{$user->address}}" placeholder="Masukkan alamat">
                </div>

                {{-- <div class="mb-3">
                  <label class="form-label" for="password">* Password:</label>
                  <input type="password" class="form-control" name="password" placeholder="******">
                </div>
                <div class="mb-3">
                  <label class="form-label" for="password_confirmation">* Password:</label>
                  <input type="password" class="form-control" name="password_confirmation" placeholder="******">
                </div> --}}

              <div class="mb-3">
                <label for="image" class="form-label">* Gambar:</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/png, image/jpeg, image/jpg" onchange="previewImage(event)">
                @if(isset($user->image))
                <p class="mt-2">Gambar saat ini: {{ $user->image }}</p>
                @endif
                <img id="preview" src="" alt="Gambar akan ditampilkan di sini" style="display: none; margin-top: 10px; max-width: 200px;">
              </div>

              <div class="d-flex justify-content-center">
                <button type="submit" name="Save" id="submit" class="btn  btn-success me-3">Save</button>
                <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
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

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

