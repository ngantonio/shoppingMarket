@extends('layouts.app')

@section('title','Nueva Categoria')
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
      <h2 class="title text-center">Registrar nueva categoria</h2>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        
        <form class="form" method="POST" action="{{ url('/admin/categories') }}" enctype="multipart/form-data">
          {{ csrf_field() }}

        <!-- Nombre -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Nombre de la categoria">
            </div> 
          </div>

          <div class="col-md-6">
              <label class="control-label">Selecciona una imagen</label>
              <input class="form-control" type="file" name="image" class="inputFileHidden">
          </div>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" name="description" aria-describedby="description" placeholder="Descripcion breve">
        </div>

        <button type="submit" class="btn btn-primary ">Resgistrar</button>
        <a href="{{ url('/admin/categories') }}" type="button" class="btn btn-default">Cancelar</a>
        </form>
  
    <!--End Registro de producto -->
  
  </div>
  <!--end principal content-->
@endsection