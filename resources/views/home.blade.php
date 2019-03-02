@extends('layouts.app')

@section('title','Shopping Market | Home')
@section('body-class', 'profile-page sidebar-collapse')
@include("dashboard.cart")
@include("dashboard.order")
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
                <!--@yield("content_dashboard_cart")-->
                @if(auth()->user()->cart->details->count() > 0)
                <hr>   
                <p> Tu carrito de compras tiene {{ auth()->user()->cart->details->count() }} productos </p> 
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
                            <!--/cart va hacia CartController-->
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

                <div class="text-center">
                    <form method="post" action="{{ url('/order') }}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success btn-round">
                            <i class="material-icons">done</i>Realizar Pedido
                        </button>
                    </form>
                </div>

                @else
                <div class="row">
                    <div class="col-md-12">  
                        <div class="info">
                            <div class="icon icon-info text-center">
                                <i class="material-icons">info</i>
                            </div>
                            <div class="text-center"><h2>Vaya! parece que tu carrito está vacio</h2></div>
                        </div> 
                    </div>
                </div>
                @endif
            </div>
            <!--End Carrito -->

            <!-- Pedidos -->
            <div class="tab-pane" id="orders">    
                @yield("content_dashboard_orders")

                @if(auth()->user()->order->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-md-2">Codigo</th>
                            <th>Status</th>
                            <th>Orden</th>
                            <th>Recibido</th>
                            <th class="col-md-2">Total</th>
                            <th class="text-rigth">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- recorriendo cada item del pedido-->
                        @foreach(auth()->user()->order as $order)
                        <tr>
                            <td>{{ $order->code }}</td>
                            <th>{{ $order->status }}</th>
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->arrived_date }}</td>
                            <td class="td-actions ">&dollar; {{ $order->total }} </td>
                            <td class="td-actions">
                                <button type="button" rel="tooltip" title="Detalles" class="btn btn-info btn-fab btn-fab-mini btn-round" data-toggle="modal" data-target="#productsModal">
                                    <i class="material-icons">list</i>
                                </button>   
                    
                                @if(auth()->user()->admin)
                                    <button type="button" rel="tooltip" title="Cambiar status" class="btn btn-success btn-fab btn-fab-mini btn-round" data-toggle="modal" data-target="#statusModal">
                                            <i class="material-icons">assignment</i>
                                    </button>
                                    <button type="button" rel="tooltip" title="Enviar mensaje" class="btn btn-light btn-fab btn-fab-mini btn-round" data-toggle="modal" data-target="#messageModal">
                                            <i class="material-icons">reply</i>
                                    </button>
                                @endif  
                                <button type="submit" rel="tooltip" title="Cancelar pedido" class="btn btn-danger btn-fab btn-fab-mini btn-round"data-toggle="modal" data-target="#confirmModal">
                                    <i class="fa fa-times"></i>
                                </button> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="row">
                    <div class="col-md-12">  
                        <div class="info">
                            <div class="icon icon-info text-center">
                                <i class="material-icons">info</i>
                            </div>
                            <div class="text-center"><h2>No hay pedidos aqui por ahora</h2></div>
                        </div> 
                    </div>
                </div>
                @endif
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



<!-- Modal Products -->
<div class="modal fade" id="productsModal" tabindex="-1" role="dialog" aria-labelledby="productsModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="text-center modal-title " id="exampleModalLongTitle">Mostrando productos del pedido</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <table class="table">
                  <thead>
                      <tr>
                          <th>Producto</th>
                          <th>Precio</th>
                          <th>Cantidad</th>   
                      </tr>
                  </thead>
                  <tbody>
                      @if(auth()->user()->orderDetails)
                          @foreach(auth()->user()->orderDetails->details as $detail)
                          <tr>
                              <td>{{ $detail->product->name }}</td>
                              <td>&dollar;{{ $detail->product->price }}</td>
                              <td>{{ $detail->quantity }}</td>
                          </tr>
                          @endforeach
                      @endif

                  </tbody>
              </table>
          </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<!-- Modal Menssage -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Enviar mensaje </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="contact-form" method="post" action="#">

                <div class="form-group">
                    <label class="bmd-label-floating">Asunto</label>
                    <input type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label class="bmd-label-floating" value="">Correo Electronico</label>
                    <input type="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="exampleMessage" class="bmd-label-floating">Mensaje</label>
                    <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
                </div>

                <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                    <button class="btn btn-primary btn-raised">
                    Enviar
                    </button>
                </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal Status -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Actualizar estado del pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ url('/order/status') }}">
            {{ csrf_field() }}
            <label for="inputState">Status</label>
            <select id="inputState" name="status" class="form-control">
                <option selected>Pendiente</option>
                <option>Aprobado</option>
                <option>Finalizado</option>
                <option>Cancelado</option>
            </select>
            <button type="submit" class="btn btn-primary ml-auto mr-auto text-center">Actualizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Confirm delete -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">¿Esta seguro que desea eliminar este pedido?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <form method="post" action="{{ url('/order') }}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-primary ml-auto mr-auto text-center">Confirmar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>





@endsection

