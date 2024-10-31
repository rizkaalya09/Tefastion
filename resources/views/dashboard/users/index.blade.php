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
        <a href="{{ route('users.create') }}" class="btn btn-dark mb-3">Add New Seller</a>
        <div class="table-responsive">
          <table class="table table-hover text-center">
            <thead class="table-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col" class="limited">Email</th>
                <th scope="col" class="limited">Phone</th>
                <th scope="col" class="limited">Address</th>
                <th scope="col" class="limited">Role</th>
                <th scope="col" class="limited">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td class="limited">{{ $user->name }}</td>
                <td class="limited">{{ $user->email }}</td>
                <td class="limited">{{ $user->phone }}</td>
                <td class="limited">{{ $user->address }}</td>
                <td>{{ $user->role }}</td>
                <td>
                  <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-primary btn-sm">Edit</a>
                  <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {{ $users->links('pagination::bootstrap-5') }}
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Container Fluid -->

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
