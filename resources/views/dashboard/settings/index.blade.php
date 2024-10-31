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
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/dashboard.css')}}">

  <style>
    .profile-details p {
      text-align: center;
      font-size: 1.2rem; /* Adjust this value as needed for larger text */
    }
  </style>
</head>
<body>
  <!-- Navbar -->

  <div class="container-fluid">
    <!-- Sidebar -->
    @include('layouts.sidebar')
      
    <div class="main">
      <div class="main-content">
        <div class="container mt-4">
          <div class="row">
            <div class="col-md-12">
              <h2>Settings</h2>
              <ul class="nav nav-tabs" id="settingsTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="view-profile-tab" data-bs-toggle="tab" data-bs-target="#view-profile" type="button" role="tab" aria-controls="view-profile" aria-selected="true">View Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="edit-profile-tab" data-bs-toggle="tab" data-bs-target="#edit-profile" type="button" role="tab" aria-controls="edit-profile" aria-selected="false">Edit Profile</button>
                </li>
              </ul>
              <div class="tab-content" id="settingsTabContent">
                <div class="tab-pane fade show active" id="view-profile" role="tabpanel" aria-labelledby="view-profile-tab">
                  <div class="card mt-3">
                    <div class="card-body profile-details">
                      <h5 class="card-title text-center">Profile Details</h5>
                      <div class="text-center mb-4">
                        <img src="{{ Auth::user()->image ? asset('assets/img/users/' . Auth::user()->image) : asset('assets/img/default.png') }}" alt="Profile Picture" class="rounded-circle" width="150">
                      </div>
                      <p class="text-black"><strong>Name:</strong> {{ Auth::user()->name }}</p>
                      <p class="text-black"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                      <p class="text-black"><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
                      <p class="text-black"><strong>Address:</strong> {{ Auth::user()->address }}</p>
                      <!-- Tambahkan detail profil lainnya jika diperlukan -->
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
                  <div class="card mt-3">
                    <div class="card-body">
                      <h5 class="card-title">Edit Profile</h5>
                      <form action="{{ route('settings.update', ['setting' => Auth::user()]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="text-center mb-4">
                          <img id="profileImagePreview" src="{{ Auth::user()->image ? asset('assets/img/users/' . Auth::user()->image) : asset('assets/img/default.png') }}" alt="Profile Picture" class="rounded-circle" width="150">
                        </div>
                        <div class="mb-3">
                          <label for="image" class="form-label">Profile Picture</label>
                          <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
                        </div>
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="mb-3">
                          <label for="phone" class="form-label">Phone</label>
                          <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                        </div>
                        <div class="mb-3">
                          <label for="address" class="form-label">Address</label>
                          <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Main Content -->
    </div>
  </div><!-- End Container Fluid -->

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <script>
    function previewImage(event) {
      const reader = new FileReader();
      reader.onload = function(){
        const output = document.getElementById('profileImagePreview');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
</body>
</html>
