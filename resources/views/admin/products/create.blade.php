@extends('layouts.app')

@section('title','Amacenar Producto')
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
      <h2 class="title text-center">Registrar nuevo producto</h2>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form class="form" method="POST" action="{{ url('/admin/products') }}">
          {{ csrf_field() }}

        <!-- Nombre -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Nombre del producto">
              <small id="name" class="form-text text-muted">Debes especificar un nombre</small>
            </div>
          </div>

          <!-- Precio -->
          <div class="col-md-6">
            <div class="form-group">
              <input type="number" aria-describedby="price" class="form-control" name="price" placeholder="Precio">
              <small id="price" class="form-text text-muted">El Precio es obligatorio</small>
            </div>
          </div>
              
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" name="description" aria-describedby="description" placeholder="Descripcion breve">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group"
            <label for="inputState" class="control-label">Seleccionar Categoria</label>
              <select id="inputState" class="form-control" name="category_id">
                
                <option value="0" selected>General</option>
                @foreach($categories as $category)
                  <option value="{{$category->id }}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <!-- -->
        <div class="form-group">
            <label for="desc">Descripcion detallada</label>
            <textarea class="form-control" name="desc" rows="3"></textarea>
        </div>

          <button type="submit" class="btn btn-primary align-content-center">Resgistrar</button>
        </form>
    </div>
    <!--End Registro de producto -->
  
  </div>
  <!--end principal content-->
@endsection