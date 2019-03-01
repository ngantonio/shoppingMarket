<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title','Shopping Market')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  
  <!-- CSS Files --> 
  <link href="{{ asset('css/material-kit.css?v=2.0.5') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('demo/demo.css') }}" rel="stylesheet" />
  
  @yield('styles')

</head>

<body class="@yield('body-class')">

  <!---Menu de navegacion-->
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">

        <a class="navbar-brand" href="{{ url('/')}}">
          Shopping Market </a>

        <!-- Boton desplegable para responsive-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      
      <!-- opciones navegacion -->
      <div class="collapse navbar-collapse">
         <ul class="navbar-nav ml-auto">

          <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/products') }}">Nuestros Productos</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/categories') }}">Categorias </a></li>
          <!-- Authentication Links -->
          @guest
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrate</a></li>
          @else
            <li class="dropdown nav-item">
              <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                  {{ Auth::user()->name }} 
                  <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                
                @if(auth()->user()->admin)
                <li class="dropdown nav-item">
                  <a class="nav-link" href="{{ url('/admin/products') }}">
                          Administar Productos
                  </a>
                </li>
                <li class="dropdown nav-item">
                  <a class="nav-link" href="{{ url('/admin/categories') }}">
                          Administrar Categorias
                  </a>
                </li>
                @endif
                <li class="dropdown nav-item">
                  <a class="nav-link" href="{{ url('/home') }}">
                      Dashboard
                  </a>
                </li>     

                <li class="dropdown nav-item">
                      <a class="nav-link" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                          Cerrar Sesión
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
            </li>
          @endguest
        <!-- END Authentication Links -->

        </ul>
      </div>
    </div>
  </nav>
  <!---End Menu de navegacion-->

    <!-- Seccion padre para CONTENIDO DE LA PLANTILLA-->
    <div class="wrapper">
      @yield("content")   
    </div>   

  <!--Start Footer-->
  <footer class="footer">
      <div class="container">
        <nav class="float-left">
          <ul>
              <a href="#">
                Sobre nosotros
              </a>
            </li>
            <li>
              <a href="#">
                Preguntas Frecuentes
              </a>
            </li>
          </ul>
        </nav>

        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, Desarrollado por Gabriel Antonio con plantilla <i class="material-icons">favorite</i> by
          <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
        </div>
        
      </div>
  </footer>
  <!--end footer-->
  
  
    <!--   Core JS Files   -->
  
    <!-- {{ asset('js/app.js') }}-->
  <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material-kit.js?v=2.0.5') }}" type="text/javascript"></script>

  <!-- Cargando solamente libreria de JS typehead para el buscador de welcome.php-->
  @yield('scripts')
</body>

</html>
