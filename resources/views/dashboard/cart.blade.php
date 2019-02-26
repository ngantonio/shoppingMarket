@section('content_dashboard_cart')

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

@endsection