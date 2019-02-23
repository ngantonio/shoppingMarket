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
               <!------------------------>
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
            <!-- End carrito -->


            <!-- Pedidos -->
            <div class="tab-pane" id="schedule-1">

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
                                <form method="POST" action="#">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                    <input type="hidden" name="cart_detail_id" value="{{ $order->id }}">
                                    
                                    <button rel="tooltip" title="Detalles" class="btn btn-info btn-fab btn-fab-mini btn-round" data-toggle="modal" data-target="#productsModal">
                                        <i class="material-icons">info</i>
                                    </button>
                                    <button type="submit" rel="tooltip" title="Cancelar pedido" class="btn btn-danger btn-fab btn-fab-mini btn-round">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
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
        </div>
        <!-- end nav pills -->
    </div>
  </div>
  <!--end principal content-->

<!-- Modal Products -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="productsModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo officiis voluptas dolorum itaque accusantium sequi, dignissimos exercitationem cumque rem expedita ipsa sit deleniti odit nesciunt eum ipsum voluptates nisi sed?
        Doloremque placeat eaque ullam inventore adipisci ut officiis. Laborum, provident, nostrum aspernatur hic numquam quam neque, ut atque itaque cupiditate quod sapiente nam similique accusamus earum. Neque sapiente atque consectetur!
        Facere, beatae ut. Aut deserunt natus quae laboriosam! Qui illum molestiae, iure illo repellat ullam quia laudantium architecto error natus corrupti facere, numquam enim. Harum commodi voluptates in distinctio eum.
        Eum doloribus accusantium natus nemo earum, numquam reiciendis saepe a ipsam distinctio recusandae aliquam repellendus sunt quisquam delectus, esse illum perspiciatis reprehenderit architecto atque. Accusamus cupiditate autem architecto eaque neque!
        Error voluptatem repellat expedita recusandae, modi omnis quos itaque neque dolores repudiandae iusto aperiam odit eum veniam aspernatur tempore qui voluptatibus at sunt ut iure sint similique. Qui, natus temporibus.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection

