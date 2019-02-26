@extends('layouts.app')

@section('title','Bienvenido a Shopping Market')
<!-- si se quiere agregar una clase que esta en el tag body: -->
@section('body-class', 'landing-page sidebar-collapse')
<!-- estilos solo para esta pagina que no se aplicaron-->
@section('styless')
  <style>
    .row{
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      flex-wrap: wrap;
    }

    .row > [class*='col-']{
      display: flex;
      flex-direction: column;
    }
  </style>
@endsection

@section('content')
  
<!--jumbotron-->
  <div class="page-header header-filter" data-parallax="true" style="background-image: url({{ asset('img/profile_city.jpg') }})">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="title">Bienvenido a Shopping Market! tu e-commerce desarrollado en laravel.</h1>
          <h4>Realiza pedidos en linea y te contactaremos para coordinar la entrega</h4>
          <br>
          <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i> ¿Cómo funciona?
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- end jumbotron-->


  <!--principal content, similar al landing page-->
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            @if (session('notification'))
              <div class="alert alert-success text-center">
                  {{ session('notification') }}
              </div>
            @endif
            <h2 class="title">¿Qué es Shopping Market?</h2>
            <h5 class="description">Somos una nueva tienda de comercio electronico que ofrece productos 
                de distintas categorias a precios accesibles. Puedes comparar precios y realizar tus pedidos 
                cuando lo desees! </h5>
          </div>
        </div>

        <div class="features">
          <div class="row">

            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-info">
                  <i class="material-icons">chat</i>
                </div>
                <h4 class="info-title">Atendemos tus dudas</h4>
                <p>Nuestro equipo atenderá rapidamente cualquier consulta que tengas via chat. ¡Estamos para servirte!</p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-success">
                  <i class="material-icons">verified_user</i>
                </div>
                <h4 class="info-title">Pago Seguro</h4>
                <p>Todo pedido que realices será confirmado a traves de tu correo electronico.</p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-danger">
                  <i class="material-icons">fingerprint</i>
                </div>
                <h4 class="info-title">Protegemos tus datos</h4>
                <p>¡Tu privacidad y seguridad son importantes para nosotros!. Los pedidos que realices solo los podras conocer tú mediante tu panel de usuario.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- Products section -->
    <div class="section text-center">
        <h2 class="title">Productos Disponibles </h2>
        <div class="team">
            <div class="row">

                @foreach($allProducts as $product)
                <div class="col-md-4">
                    <div class=" card team-player">
                        <div class="card card-plain">
                            <div class="col-md-6 ml-auto mr-auto">
                                
                                <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                            
                            </div>
                            <h4 class="card-title"> <a href=" {{ url('/products/'. $product->id) }}"> {{ $product->name }}  </a>
                                <br>
                                <small class="card-description text-muted"> {{ $product->getCategory }}</small>
                            </h4>
                            <div class="card-body">
                                <p class="card-description">{{ $product->description }} </p>
                            </div>
                            <div class="card-footer justify-content-center">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="text-center">
          {{ $allProducts->links("pagination::bootstrap-4") }}
        </div>
    </div>

  
    <!--End Section text center -->
    <!--<a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                                <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>-->


      <div class="section section-contacts">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">Trabajamos para ti</h2>
            <h4 class="text-center description">Si aún no te registras, puedes enviarnos tus dudas y te responderemos a la brevedad.</h4>
            <form class="contact-form" method="post" action="{{ url('/message/new') }}">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">¿Cuál es tu nombre?</label>
                        <input type="text" name="name_user" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tu Correo Electronico</label>
                    <input type="email" name="email" class="form-control">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleMessage" class="bmd-label-floating">Plantea tus dudas</label>
                <textarea type="text" name="message" class="form-control" rows="4" id="exampleMessage"></textarea>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                  <button class="btn btn-primary btn-raised">
                    Enviar Consulta
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end principal content-->
@endsection