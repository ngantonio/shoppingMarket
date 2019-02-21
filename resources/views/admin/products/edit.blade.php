@extends('layouts.app')

@section('title','Edicion de Producto')
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
      <h2 class="title text-center">Editando {{ $foundProduct->name }} </h2>

        <form class="form" method="POST" action="{{ url('/admin/products'.$foundProduct->id.'/edit') }}">
          {{ csrf_field() }}

        <!-- Nombre -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Nombre del producto" value="{{ $foundProduct->name }}">
              <small id="name" class="form-text text-muted">Debes especificar un nombre</small>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <input type="number" step="0.01" aria-describedby="price" class="form-control" name="price" placeholder="Precio" value="{{ $foundProduct->price }}">
              <small id="price" class="form-text text-muted">El Precio es obligatorio</small>
            </div>
          </div>     
        </div>

      
        <div class="form-group">
          <input type="text" class="form-control" name="description" aria-describedby="description" placeholder="Descripcion breve" value="{{ $foundProduct->description }}">
        </div>

        <div class="form-group">
            <label for="desc">Descripcion detallada</label>
            <textarea class="form-control" name="desc" rows="3"> {{ $foundProduct->name }} </textarea>
        </div>

          <button type="submit" class="btn btn-primary">Actualizar</button>
          <a href="/admin/products" class="btn btn-danger">Cancerlar edición</a>
        </form>
    </div>
    <!--End Registro de producto -->
  
  </div>
  <!--end principal content-->
@endsection