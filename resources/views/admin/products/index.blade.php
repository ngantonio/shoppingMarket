@extends('layouts.app')

@section('title','Nuestros Productos')
@section('body-class', 'profile-page sidebar-collapse')
@section('content')
  
<!--jumbotron-->
  <div class="page-header header-filter" data-parallax="true" style="background-image: url({{ asset('img/profile_city.jpg') }})">
  </div>
  <!-- end jumbotron-->


  <!--principal content, similar al landing page-->
  <div class="main main-raised">
    <div class="container">

      <!-- Products section -->
      <div class="section text-center">
        <h2 class="title">Listado de productos </h2>
        <div class="team">
            <div class="row">
              <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-round">Agregar Producto</a>              
              <table class="table">
                  <thead>
                      <tr>
                          <th class="text-center">#</th>
                          <th> Nombre</th>
                          <th> Descripción</th>
                          <th> Categoría</th>
                          <th class="text-right">Precio</th>
                          <th class="text-rigth">Acciones</th>
                          </tr>
                  </thead>
                  <tbody>
                      @foreach($allProducts as $product)
                      <tr>
                          <td class="text-right">{{ $product->id }}</td>
                          <td>{{ $product->name }}</td>
                          <td class="col-md-4">{{ $product->description }}</td>
                          <td>{{ $product->getCategory }}</td>
                          <td class="td-actions text-right">&dollar; {{ $product->price }} </td>
                          <td class="td-actions text-right col-md-4">
                              <button type="button" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                                <i class="material-icons">info</i>
                              </button>
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-success
                              btn-simple btn-xs">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Eliminar" class="btn btn-danger
                              btn-simple btn-xs">
                                  <i class="fa fa-times"></i>
                              </button>
                          </td>
                      </tr>
                      @endforeach
                      <!-- Otro Tr-->
                  </tbody>
              </table>

              <!-- pagination-->
              <div class="text-center">
                {{ $allProducts->links("pagination::bootstrap-4") }}
              </div>
             
              <!-- End pagination -->
            </div>
        </div>
    </div>
    <!--End Section text center -->

    </div>
  </div>
  <!--end principal content-->
@endsection