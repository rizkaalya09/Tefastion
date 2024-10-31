<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar bg-black">
  <div class="position-sticky">
    <div class="text-center">
      @if (Auth::user()->image == null)
        <img src="{{asset('assets/img/default.png')}}" alt="profil" class="rounded-circle mt-5" width="100">
      @else
        <img src="{{asset('assets/img/users/'.Auth::user()->image)}}" alt="profil" class="rounded-circle mt-5" width="100">        
      @endif
      <h5 class="mt-2">{{Auth::user()->name}}</h5>
      <p class="">{{Auth::user()->email}}</p>
    </div>
    <hr>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">
          <i class="fas fa-home"></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('products.index')}}">
          <i class="fas fa-box"></i>
          Products
        </a>
      </li>
      @if (Auth::user()->role == 'seller')
      <li class="nav-item">
        <a class="nav-link" href="{{route('sales.index')}}">
          <i class="fas fa-shopping-cart"></i>
          Sales
        </a> 
      </li>
      @endif
      @if (Auth::user()->role == 'admin')
        <li class="nav-item">
          <a class="nav-link" href="{{route('sales.index')}}">
            <i class="fas fa-shopping-cart"></i>
            Sales
          </a> 
        </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
          <i class="fas fa-users"></i>
          Users
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="{{route('settings.index')}}">
          <i class="fas fa-cogs"></i>
          Settings
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i>
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    </ul>
  </div>
</nav>
