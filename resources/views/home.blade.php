@extends('layouts.app')

@section('title','Shopping Market | Home')
@section('body-class', 'profile-page sidebar-collapse')
@section('content')
  
  <!--jumbotron-->
  <div class="page-header header-filter" data-parallax="true" style="background-image: url({{ asset('img/profile_city.jpg') }})">
  </div>
  <!-- end jumbotron-->


  <!-- Registro de producto -->
  <div class="main main-raised">
    <div class="section container">
      <h2 class="title text-center"> ¡Bienvenido, {{ Auth::user()->name }}! </h2>
      <h3 class="title text-center"> Dashboard </h2>
      <hr>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- start nav pills -->
        <ul class="nav nav-pills nav-pills-icons" role="tablist">
            <!--
                color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
            -->
            <li class="nav-item">
                <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                    <i class="material-icons">dashboard</i>
                    Carrito
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#schedule-1" role="tab" data-toggle="tab">
                    <i class="material-icons">schedule</i>
                    Pedidos
                </a>
            </li>

        </ul>

        <div class="tab-content tab-space">
            
            <!-- content 1-->
            <div class="tab-pane active" id="dashboard-1">
            Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
            <br><br>
            Dramatically visualize customer directed convergence without revolutionary ROI.
            </div>

            <!-- content 2 -->
            <div class="tab-pane" id="tasks-1">
                Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                <br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
            </div>
        </div>
        <!-- end nav pills -->


    </div>
  </div>
  <!--end principal content-->

@endsection

