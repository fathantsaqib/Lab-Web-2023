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
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('homepage') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
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
    <!-- Core theme JS-->
    <script src="{{ asset('FE/js/bootstrap.js') }}"></script>
  </body>
</html>
