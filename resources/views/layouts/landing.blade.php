<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
    shrink-to-fit=no">
    <title>Kembar Relaxation</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" href="{{asset('landing/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/aos.css')}}">
  </head>
  <body data-spy="scroll" data-target="#navbarNav" data-offset="200">

    <!-- NAVBAR -->
    <nav id="main-navbar" class="navbar navbar-expand-md navbar-light bg-light
    fixed-top py-2 py-md-0 shadow">
      <div class="container">
        <a class="navbar-brand" href="index.html">Kembar Relaxation</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
          data-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link p-3" href="{{ Request::path() == '/' ? '#showcase' : '/'}}">Home</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link p-3" href="{{ Request::path() == '/' ? '#blog' : '/'}}">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-3" href="{{ Request::path() == '/' ? '#product' : '/'}}">About</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link p-3 {{ Request::path() == 'lamaran' ? ' active' : ''}}" href="{{route('lamaran')}}">Lamar Pekerjaan</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link p-3 {{ Request::path() == 'seleksi' ? ' active' : ''}}" href="{{ route('seleksi') }}">Hasil Seleksi</a>
            </li>
          </ul>
          @if(\Auth::user() == false)
          <a class="btn btn-primary login" href="{{route('login')}}">Login</a>
          @else
          <form method="POST" action="{{route('logout')}}">
                @csrf
                <button class="btn btn-danger login">
                  Logout
                </button>
                </form>
          @endif
        </div>
      </div>
    </nav>

    @yield('content')

    <!-- FOOTER -->
    <footer id="main-footer" class="text-white text-center bg-dark py-5">
      <div class="container">
        <div class="row">
          <div class="text-md-left col-md-4 mr-auto">
            <h5>Kembar Relaxation</h5>
            <p>Mal Season City, LT GF 2 Blok A 11 No 2
            </p>
            <small>&copy; Kembar Relaxation 2019</small>
          </div>
          <div class="text-md-left col-md-4 mt-4 mt-md-0">
            <h5>Hubungi Kami</h5>
            <div><i class="fas fa-envelope fa-fw mr-3"></i>kembarrelaxation@admin.com</div>
            <div><i class="fab fa-whatsapp fa-fw mr-3"></i>081218695474</div>
            <div><i class="fas fa-globe fa-fw mr-3"></i>kembarrelaxation</div>
            <div class="pt-3">
              <a href="#" class="text-white mr-2">
                <i class="fab fa-facebook fa-lg"></i>
              </a>
              <a href="#" class="text-white mr-2">
                <i class="fab fa-twitter fa-lg"></i>
              </a>
              <a href="#" class="text-white mr-2">
                <i class="fab fa-instagram fa-lg"></i>
              </a>
              <a href="#" class="text-white mr-2">
                <i class="fab fa-google-plus fa-lg"></i>
              </a>
              <a href="#" class="text-white mr-2">
                <i class="fab fa-github fa-lg"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="{{asset('landing/js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('landing/js/aos.js')}}"></script>
    <script src="{{asset('landing/js/popper.js')}}"></script>
    
    
    
    

    @yield('script')
  </body>
</html>
