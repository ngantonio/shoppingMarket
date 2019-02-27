@extends('layouts.app')

@section('title','Shopping Market | Resultados de la busqueda')
@section('body-class', 'profile-page sidebar-collapse')

@section('content')
  <!--jumbotron-->
  <div class="page-header header-filter" data-parallax="true" style="background-image: url({{ asset('img/profile_city.jpg') }})">
  </div>
  <!-- end jumbotron-->

  <!-- contenido del perfil -->
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">

              @if(session('notification'))
                <div class="alert alert-success text-center">
                  {{ session('notification') }}
                </div>
              @endif
              <br><br>

            </div>
            <!--End profile -->
          </div>
        </div>


        <div class="section text-center">
        <h3 class="title">Resultados para: {{ $query }}</h3>
          <div class="team">
            <div class="description text-center">
              <p> Se encontraron {{ $products->count() }} coincidencias</p>
            </div>
              <div class="row">
                  @foreach($products as $product)
                  <div class="col-md-4">
                      <div class=" card team-player">
                          <div class="card card-plain">
                              <div class="col-md-6 ml-auto mr-auto">    
                                  <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">  
                              </div>
                              <h4 class="card-title"> <a href=" {{ url('/products/'. $product->id) }}"> {{ $product->name }}  </a>
                                  <br>
                                  <small class="card-description text-muted">&dollar; {{ $product->price}}</small>
                              </h4>
                              <div class="card-body">
                                  <p class="card-description">{{ $product->description }} </p>
                              </div>
                              <div class="card-footer justify-content-center">
                              </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
                <div class="text-center">
                  {{ $products->links("pagination::bootstrap-4") }}
              </div>
              </div>
            </div>
            <!--End container -->
          </div>
        </div>
  <!--end contenido del perfil-->
@endsection