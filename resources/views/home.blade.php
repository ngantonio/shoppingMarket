@extends('layouts.app')

@section('title','Shopping Market | Home')
@section('body-class', 'profile-page sidebar-collapse')
@include("dashboard.order")
@include("dashboard.cart")
@include("dashboard.messages")

@section('content')

  <!--jumbotron-->
  <div class="page-header header-filter" data-parallax="true" style="background-image: url({{ asset('img/profile_city.jpg') }})">
  </div>
  <!-- end jumbotron-->


  <!-- Registro de producto -->
  <div class="main main-raised">
    <div class="section container">
      <h2 class="title text-center"> ¡Hola, {{ Auth::user()->name }}! </h2>
      <hr>
        @if (session('notification'))
            <div class="alert alert-success text-center">
                {{ session('notification') }}
            </div>
        @endif

        <!-- start nav pills -->
        <ul class="nav nav-pills nav-pills-icons" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#cart" role="tab" data-toggle="tab">
                    <i class="material-icons">add_shopping_cart</i>
                    Carrito
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#orders" role="tab" data-toggle="tab">
                    <i class="material-icons">schedule</i>
                    Pedidos
                </a>
            </li>

            @if(auth()->user()->admin)
            <li class="nav-item">
                <a class="nav-link" href="#messages" role="tab" data-toggle="tab">
                    <i class="material-icons">message</i>
                    Mensajes
                </a>
            </li>
            @endif
        </ul>


        <div class="tab-content tab-space">                  
            <!--Carrito -->
            <div class="tab-pane active" id="cart">
                @yield("content_dashboard_cart")
            </div>
            <!--End Carrito -->

            <!-- Pedidos -->
            <div class="tab-pane" id="orders">
                @yield("content_dashboard_orders")
            </div>
            <!-- End Pedidos -->

            <!-- Mensajes -->
            @if(auth()->user()->admin)
            <div class="tab-pane" id="messages">
                @yield("content_dashboard_messages")
            </div>
            @endif
            <!-- End mensajes -->

        </div>
    </div>
  </div>
  <!--end principal content-->


@endsection

