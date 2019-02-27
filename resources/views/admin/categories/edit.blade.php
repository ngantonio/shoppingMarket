@extends('layouts.app')

@section('title','Edicion de Categoria')
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
      <h2 class="title text-center">Editando {{ $category->name }} </h2>

          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        
        <form class="form" method="POST" action="{{ url('/admin/categories'.$category->id.'/edit') }}">
          {{ csrf_field() }}

        <!-- Nombre -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Nuevo nombre" value="{{ $category->name }}">
            </div>
          </div>
        </div>

      
        <div class="form-group">
          <input type="text" class="form-control" name="description" aria-describedby="description" placeholder="Actualizar descripcion " value="{{ $category->description }}">
        </div>


        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="/admin/categories" class="btn btn-danger">Cancerlar edición</a>
        </form>
    </div>
    <!--End Registro de producto -->
  
  </div>
  <!--end principal content-->
@endsection