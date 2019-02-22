@extends('layouts.app')

@section('title','Productos | Imagenes')
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
      <hr>

      <!-- Form botones-->
      <form enctype="multipart/form-data" method="post" action="">
        {{ csrf_field() }}
        <input type="file" name="photo" required>
        <button type="submit" class="btn btn-primary">Añadir Imagen</button> 
        <a href="{{ url('/admin/products') }}" class="btn btn-default">Volver</a>
      </form>
      
     
    <!-- contenedor de imagenes -->
      <div class="row">
        @foreach($images as $image)
        <div class="col-md-4">
          <div class="card" style="width: 20rem;">

            <!-- Procesar imagenes locales -->
            @if(substr($image->url, 0, 4) === "http")
              <img class="card-img-top" src="{{ $image->url }}" alt="{{ $image->url }}" width="250" heigth="250">
            @else
              <img class="card-img-top" src="{{ url('/images/products/'.$image->url) }}" alt="thumb-image" width="250" heigth="250">
            @endif

            <div class="card-body">

              <form method="post" action="">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="image_id" value="{{ $image->id }}">
                @if($image->featured)
                <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Destacada">
                  <i class="material-icons">favorite</i>
                </button>
                  
                @else
                  <a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-success">Destacar</a>
                @endif
                <button type="submit" class="btn btn-danger ">Eliminar</button>
              </form>
              

            </div>
          </div>   
        </div>
        @endforeach 
      </div>
      <!--row-->
    </div>
  </div>
@endsection