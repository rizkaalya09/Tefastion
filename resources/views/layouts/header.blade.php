 <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="{{route('home')}}" class="logo d-flex align-items-center  me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 style="color: rgb(1, 145, 1);">TeFasTion</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul style="justify-content: center;">
          <li><a href="{{route('home')}}" class="active">Home</a></li>
          <li><a href="{{route('about')}}">About Us</a></li>
          <li><a href="{{route('products')}}">Products</a></li>
          </li>
          
        </ul>
      </nav><!-- .navbar -->

      <!-- Notifications -->
      <div class="d-flex align-items-center">
        @if (Auth::user())
        <a href="">
          <button data-mdb-ripple-init type="button" class="btn px-3 me-2" style="color:green;">
            <i class="bi bi-cart"></i>
          </button>
        </a>
        <a href="{{route('profiles.index')}}">
          <button data-mdb-ripple-init type="button" id="perubahwarna" class="hilangu btn  px-3 me-2" style="color:green;">
            {{Auth::user()->name}}
          </button>
        </a>
        <form action="{{route('logout')}}" method="POST">
          @csrf 
          <input type="submit" value="Logout" class="kotak btn me-3" style="background-color: green; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; transition-duration: 0.4s;">
        </form>
          
        @else

        <a href="{{route('login')}}">
          <button data-mdb-ripple-init type="button" id="perubahwarna" class="hilangu btn  px-3 me-2" style="color:green;">
            Login
          </button>
        </a>
        <a href="{{route('register')}}">
          <button data-mdb-ripple-init type="button" class="kotak btn me-3" style="background-color: green;">
            Sign up for free
          </button>
        </a>
        <a
          data-mdb-ripple-init
          
          href="https://github.com/mdbootstrap/mdb-ui-kit"
          role="button"
          
        ></a>
        @endif
      </div>
     

    </div>
  </header><!-- End Header -->