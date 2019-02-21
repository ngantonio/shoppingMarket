@extends('layouts.app')

@section('title','Productos | Imagenes')
<!-- si se quiere agregar una clase que esta en el tag body: -->
@section('body-class', 'profile-page sidebar-collapse')
@section('content')
  
  <!--jumbotron-->
  <div class="page-header header-filter" data-parallax="true" style="background-image: url({{ asset('img/profile_city.jpg') }})">
  </div>
  <!-- end jumbotron-->


  <!-- Registro de producto -->
  <div class="main main-raised">
    <div class="section container">
      <h2 class="title text-center">Imagenes de {{ $product->name }}</h2>

      <!-- Form botones-->
      <form method="POST" action="{{ url('/admin/products/'.$product->id.'') }}">
        {{ csrf_field() }}
        <input type="file" name="photo" required>
        <button type="submit" class="btn btn-primary align-content-center">Añadir Imagen</button>
        <a href="{{ url('/admin/products/') }}" type="submit" class="btn btn-default align-content-center">Volver</a>
      </form>
     
    <!-- contenedor de imagenes -->
      <div class="row">
        @foreach($images as $image)
        <div class="col-md-4">
          <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="{{ $image->url }}" alt="Card image cap">
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-primary align-content-center">Hacer principal</button>
            <button type="button" class="btn btn-danger align-content-center">Eliminar</button>
          </div>
        </div>
        @endforeach 
        </div>
      </div>

    </div>
  </div>
@endsection