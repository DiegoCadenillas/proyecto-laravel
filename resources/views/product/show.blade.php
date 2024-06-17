@extends('layouts')

@section('content')
  <section class="py-5">
    <div class="container px-4 px-lg-5 my-5" style="padding-top: 5.5%">
      <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-6">
          @if (count($product->images) > 0)
            <div id="carouselExample" class="carousel slide" data-ride="carousel">
              @php
                $isActive = true;
              @endphp
              <div class="carousel-inner">
                @foreach ($product->images as $image)
                  <div class="carousel-item {{ $isActive ? 'active' : '' }}">
                    <img src="{{ asset('/productImages/' . $image->imgURL) }}" class="d-block w-100"
                      alt="Imagen de {{ $product->name }}">
                  </div>
                  @php
                    $isActive = false;
                  @endphp
                @endforeach
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
              </button>
            </div>
          @else
            <img class="card-img-top mb-5 mb-md-0" src="" alt="{{ $product->name }}" />
            {{-- <img class="card-img-top mb-5 mb-md-0" --}}
            {{-- src="{{ count($product->images) > 0 ? asset('/productImages/' . $product->images->first()->imgURL) : '' }}" --}}
            {{-- alt="{{ $product->name }}" /> --}}
          @endif
        </div>
        <div class="col-md-6">
          <div class="small mb-1">{{ $product->category }}</div>
          <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
          <div class="fs-5 mb-5">
            <p>&euro;{{ $product->price }}</p>
          </div>
          <p class="lead">{{ $product->description }}</p>
          <div class="d-flex">
            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" min="-99"
              max="99" style="max-width: 3rem" />
            <button id="addToCartBtn" class="btn btn-outline-dark flex-shrink-0" type="button"
              value="{{ $product->id }}">
              <i class="bi-cart-fill me-1"></i>
              Añadir al carrito
            </button>
          </div>
          <p id="successfullyAdded"></p>
          <p id="inputError"></p>
        </div>
      </div>
    </div>
  </section>
  <section class="py-5 bg.light">
    <form action="{{ route('reviews.store', ['id' => $product->id]) }}">
      <input type="hidden">
    </form>
  </section>
  <section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
      <h2 class="fw-bolder mb-4">Productos relacionados</h2>
      <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        @foreach ($relatedProducts as $relatedProduct)
          <div style="padding: 2rem;display: flex;justify-content:center;">
            <div class="card" style="width: 100% !important;">
              <!-- Product image-->
              <img class="card-img-top"
                src="{{ count($relatedProduct->images) > 0 ? asset('/productImages/' . $relatedProduct->images->first()->imgURL) : '' }}"
                alt="{{ $relatedProduct->name }}" />
              <!-- Product details-->
              <div class="card-body p-4">
                <div class="text-center">
                  <!-- Product name-->
                  <h5 class="fw-bolder">{{ $relatedProduct->name }}</h5>
                  <!-- Product price-->
                  &euro;{{ $relatedProduct->price }}
                </div>
              </div>
              <!-- Product actions-->
              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                    href="{{ route('store.getProduct', ['id' => $relatedProduct->id]) }}">Ver detalles</a></div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script src="{{ asset('/js/productShow.js') }}"></script>
@endsection
