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
      <hr>
        @if (session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
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
            <!-- Carrito-->
            <div class="tab-pane active" id="dashboard-1">
                <hr>   
                <p> Tu carrito de compras tiene {{ auth()->user()->cart->details->count() }} productos </p> 
               <!------------------------>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ref</th>
                            <th class="col-md-4 ">Nombre</th>
                            <th class="col-md-2 ">Precio</th>
                            <th class="col-md-2 ">Cantidad</th>
                            <th class="col-md-2 ">Subtotal</th>
                            <th class="text-rigth">Acciones</th>
                        </tr>
                  </thead>
                  <tbody>
                      <!-- recorriendo cada item del carrito -->
                    @foreach(auth()->user()->cart->details as $detail)
                    <tr>
                        <td class=""><img src="{{ $detail->product->featured_image_url }}" alt="thumb" height="50"></td>
                        <td> <a href="{{ url('/products/'.$detail->product->id) }}"></a>{{ $detail->product->name }}</td>
                        <td class="td-actions ">&dollar; {{ $detail->product->price }} </td>
                        <td> {{ $detail->quantity }}</td>
                        <td> &dollar;{{ $detail->quantity* $detail->product->price }}</td>
                        <td class="td-actions col-md-4">
                              <form method="POST" action="{{ url('/cart') }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                                <a href="{{ url('products/'.$detail->product->id) }}" target="_blank" rel="tooltip" title="Ver producto" class="btn btn-info btn-fab btn-fab-mini btn-round">
                                    <i class="material-icons">info</i>
                                </a>
                                
                                <button type="submit" rel="tooltip" title="Quitar del carrito" class="btn btn-danger btn-fab btn-fab-mini btn-round">
                                    <i class="fa fa-times"></i>
                                </button>
                              </form>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
            <!-- End carrito -->




            <!-- content 2 -->
            <div class="tab-pane" id="schedule-1">
                Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                <br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
            </div>
        </div>
        <!-- end nav pills -->


    </div>
  </div>
  <!--end principal content-->

@endsection

