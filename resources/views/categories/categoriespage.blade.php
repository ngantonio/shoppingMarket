@extends('layouts.app')
@section('content')

<div class="page-header header-filter" data-parallax="true" style="background-image: url({{ asset('img/profile_city.jpg') }})">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand text-center">
            <h1>Nuestros Productos</h1>
            <h3 class="title text-center">Tenemos los mejores productos para ti</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
        <div class="section text-center">
        @if (session('notification'))
          <div class="alert alert-success text-center">
              { session('notification') }}
          </div>
        @endif
        <h2 class="title"></h2>
        <div class="team">
            <div class="row">

                @foreach($allProducts as $product)
                <div class="col-md-4">
                    <div class=" card team-player">
                        <div class="card card-plain">
                            <div class="col-md-6 ml-auto mr-auto">
                                
                                <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                            
                            </div>
                            <h4 class="card-title"> <a href=" {{ url('/products/'. $product->id) }}"> {{ $product->name }}  </a>
                                <br>
                                <small class="card-description text-muted"> {{ $product->category->name }}</small>
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
          {{ $allProducts->links("pagination::bootstrap-4") }}
        </div>
    </div>

    </div>
  </div>

@endsection