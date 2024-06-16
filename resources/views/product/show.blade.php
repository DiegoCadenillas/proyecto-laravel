@extends('layouts')

@section('content')
  <section class="py-5">
    <div class="container px-4 px-lg-5 my-5" style="padding-top: 5.5%">
      <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
            src="{{ asset('/productImages/' . $product->images->first()->imgURL) }}" alt="{{ $product->name }}" /></div>
        <div class="col-md-6">
          <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
          <div class="fs-5 mb-5">
            <p>&euro;{{ $product->price }}</p>
          </div>
          <p class="lead">{{ $product->description }}</p>
          <div class="d-flex">
            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" min="-99"
              max="99" style="max-width: 3rem" />
            <button id="addToCartBtn" class="btn btn-outline-dark flex-shrink-0" type="button">
              <i class="bi-cart-fill me-1"></i>
              Add to cart
            </button>
          </div>
          <p id="successfullyAdded"></p>
          <p id="inputError"></p>
        </div>
      </div>
    </div>
  </section>
@endsection
