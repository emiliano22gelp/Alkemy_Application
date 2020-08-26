<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{asset('css/favicon.jpg')}}" />

  <title>CHALLENGE PHP - ALKEMY LABS</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/scrolling-nav.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <style>
    
    body{
      background-image: url({{asset('css/programacion.jpg')}});
      background-size: 100% 100%;
      background-attachment: fixed;
    }

  </style>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      @guest
      <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">CHALLENGE PHP</a>
      @endguest
      @auth
      <a class="navbar-brand js-scroll-trigger" href="{{ route('index') }}">CHALLENGE PHP</a>
      @endauth
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          @guest
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Iniciar Sesion</a>
          </li>
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Registrarse</a>
          </li>
          @endif
          @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                          Cerrar Sesion
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
              </div>
              </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Bienvenido</h1>
      <p class="lead">Aplicacion web desarrollada con Laravel solicitada por ALKEMY LABS</p>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="container">
            @yield('content')
          </div>
          <!--<h2>Acerca de este Sitio</h2>
          <p class="lead">A traves de Gestion de VC usted podra solicitar diversas VideoConferencias para los Internos alojados en las distintas Unidades Penitenciarias de todo el pais.</p>-->
        </div>
      </div>
    </div>
  </section>

  <!--<div class="container">
      @yield('content')
    </div>-->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; CHALLENGE PHP - ALKEMY LABS - WebSite 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
 <!-- <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>-->
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <!--<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>-->

  <!-- Custom JavaScript for this theme -->
  <script src="{{asset('js/scrolling-nav.js')}}"></script>

</body>

</html>