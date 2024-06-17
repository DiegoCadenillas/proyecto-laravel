<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>GlitterSpain</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />
  <link href="{{ asset('styles/index.css') }}" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  {{-- Google Fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
</head>

<body id="inicio">
  <div class="black-rectangle"></div>

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/#inicio') }}"><span class="great-vibes-regular">GlitterSpain</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        @php
            $host = request()->getHttpHost();
        @endphp
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
          <li class="nav-item"><a class="nav-link" href="{{ url('/tienda') }}">Todos los productos</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/#productos-calientes') }}">Productos Calientes</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/#acerca-de-nosotros') }}">Acerca de Nosotros</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/#contactenos') }}">Contáctenos</a></li>
          @guest
          <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Registrarse</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Iniciar Sesión</a></li>
          @else
          <li class="nav-item"><a class="nav-link" href="{{ url('/carrito') }}">Carrito</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/logout') }}">Cerrar Sesión</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/perfil') }}">Mi Perfil</a></li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  <!--
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ URL('/') }}">GlitterSpain</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Inicio</a>
          </li>
          @guest
                      <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">Iniciar
                          Sesión</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ request()->is('register') ? 'active' : '' }}"
                          href="{{ route('register') }}">Registrarse</a>
                      </li>
@else
  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{ route('user.profile') }}" role="button" aria-expanded="false">
                              Mi Perfil
                            </a></li>
                          <li><a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Cerrar
                              Sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                              @csrf
                            </form>
                          </li>
                        </ul>
                      </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
-->

  @yield('content')

  <!-- Footer-->
  <footer class="footer py-4">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 text-lg-start">Copyright &copy; GlitterSpain 2024</div>
        <div class="col-lg-4 my-3 my-lg-0">
          <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i
              class="fab fa-twitter"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i
              class="fab fa-facebook-f"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i
              class="fab fa-linkedin-in"></i></a>
        </div>
        <div class="col-lg-4 text-lg-end">
          <a class="link-dark text-decoration-none me-3" href="#!">Política de Privacidad</a>
          <a class="link-dark text-decoration-none" href="#!">Política de Cookies</a>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  @yield('scripts')
  <script src="{{ asset('/js/scripts.js') }}"></script>

  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
  <!-- * *                               SB Forms JS                               * *-->
  <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
  <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
