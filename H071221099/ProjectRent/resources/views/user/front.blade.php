<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Rental Mobil - Laravel</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('FE/css/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('FE/css/custom.css') }}" />

  </head>
  <body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light ">
      <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('homepage') }}">CaRenThann</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <!-- ... elemen-elemen navbar lainnya ... -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: rgb(6, 3, 3)">
                  {{ Auth::check() ? Auth::user()->name : 'Menu' }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('user.index') }}">Home</a>
                  <a class="dropdown-item" href="{{ route('user.car') }}">Daftar Mobil</a>
                  <a class="dropdown-item" href="{{ route('user.driver') }}">Daftar Driver</a>
                  <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
          
                  <div class="dropdown-divider"></div>
                  <a class="nav-link" onclick="document.getElementById('logout-form').submit()" href="#">
                      <i class="fas fa-fw fa-sign-out-alt"></i>
                      <span>Log Out</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                      @csrf
                  </form>
              </div>
          </li>
          
          </ul>
      </div>

      </div>
    </nav>
    <!-- Header-->
      @yield('content')
    <!-- Footer-->
    <footer class="py-5" style="background-color: #4F6F52">
      <div class="container">
        <p class="m-0 text-center text-white" style="background-color: #4F6F52">
          Copyright &copy; Your Website 2022
        </p>
      </div>
    </footer>
    <!-- Bootstrap core JS-->
<script src="{{ asset('FE/js/bootstrap.js') }}"></script>

    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
