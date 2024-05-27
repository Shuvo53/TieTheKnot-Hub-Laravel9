 {{-- {{-- <nav class="navbar navbar-expand-lg navbar-default navbar-dark fixed-top">

    <style>
        .navbar-brand,
        .nav-link {
            color: black !important;
        }
    </style>

    <div class="container-fluid navbar-default">
      <a class="navbar-brand" href="{{ url('/') }}">BLISS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link px-3 active" aria-current="page" href="/">Home</a>
          <a class="nav-link px-3 " href="{{ url('category') }}">Categories</a>
          <a class="nav-link px-3" href="{{ url('contact') }}">Contact</a>
          <a class="nav-link px-3" href="{{ url('about') }}">About Us</a>
        </div>
        <div class="navbar-nav ms-auto justify-content-center">
          @if(session('user'))
            <div class="input-group hello">
              <form class="d-flex bg-transparent w-100" action="{{ url('searchProduct') }}" method="POST">
                @csrf
                <div class="input-group">
                  <input name="product_name" required type="search" id="search_product" class="form-control bg-dark rounded-pill outline-none shadow-none border-0" placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">
                  <button class="btn" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
              </form>
            </div>
            <a class="cartblack nav-link" href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp" class="rounded-circle" height="22" alt="User Avatar" loading="lazy" />
              </a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item">{{ App\Models\User::find(session('user'))->name }}</a>
                <a class="dropdown-item" href="{{ route('logout') }}">
                  {{ __('Logout') }}
                </a>
              </div>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link cartblack" id="loginblack" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link cartblack" id="loginblack" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
        </div>
      </div>
    </div>
  </nav>

--}}

<nav class="navbar navbar-expand-lg navbar-default navbar-dark fixed-top">
    <style>
        .navbar .navbar-brand.active,
        .navbar .nav-link {
            color: rgb(242, 22, 22)!important;
        }
        .navbar .nav-link.active {
            color: rgb(248, 14, 14) !important;
        }
        .navbar .nav-link:hover {
            color: rgb(9, 22, 9)!important;
        }
        .form-control::placeholder {
            color: rgb(28, 35, 236);
        }
        .navbar.navbar-expand-lg.navbar-default.navbar-dark.fixed-top.container-fluid.navbar-default{
    color: black!important;
}
        .form-control::-webkit-input-placeholder {
            color: rgb(221, 58, 175);
        }

        .form-control:-ms-input-placeholder {
            color: rgb(25, 207, 216);
        }

        .form-control::-ms-input-placeholder {
            color: white;
        }

        .form-control::-moz-placeholder {
            color: rgb(208, 127, 127);
        }

        .form-control:-moz-placeholder {
            color: white;
        }


    </style>
    <div class="container-fluid navbar-default">
        <a class="navbar-brand active" href="{{ url('/') }}">BLISS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link px-3 active" aria-current="page" href="/">Home</a>
                <a class="nav-link px-3 active" href="{{ url('/work') }}">How It Works</a>
                <a class="nav-link px-3 active" href="{{ route('frontend.projects.index') }}">Projects</a>
                <a class="nav-link px-3 active" href="{{ url('contact') }}">Contact</a>
                <a class="nav-link px-3 active" href="{{ url('about') }}">About Us</a>
            </div>
            <div class="navbar-nav ms-auto justify-content-center">
                @if(session('user'))
                <div class="input-group hello">
                    <form class="d-flex bg-transparent w-100" action="{{ url('searchProduct') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input name="product_name" required type="search" id="search_product" class="form-control bg-dark rounded-pill outline-none shadow-none border-0" placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">
                            <button class="btn" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
                <a class="cartblack nav-link" href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp" class="rounded-circle" height="22" alt="User Avatar" loading="lazy" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item">{{ App\Models\User::find(session('user'))->name }}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            {{ __('Logout') }}
                        </a>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link cartblack" id="loginblack" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link cartblack" id="loginblack" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif

            </div>
        </div>
    </div>
</nav>

