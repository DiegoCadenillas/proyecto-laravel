@extends('layouts')

@section('content')
  <section class="auth-container">
    <div class="container mt-5">
      <h2 class="text-center mb-4">Carrito de Compras</h2>
      <div class="row">
        <!-- Shopping Cart Items -->
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header">
              <h4>Productos</h4>
            </div>
            @php
              $subtotal = 0.0;
            @endphp
            <div class="card-body" id="cart-content">
              @if ($cartItems != null && count($cartItems) > 0)
                @foreach ($cartItems as $product)
                  <div class="row mb-3">
                    <div class="col-md-3">
                      <img src="{{ asset('/productImages/' . $product->images->first()->imgURL) }}" class="img-fluid"
                        alt="{{ $product->name }}">
                    </div>
                    <div class="col-md-6">
                      <h5>{{ $product->name }}</h5>
                    </div>
                    <div class="col-md-3 text-md-right">
                      <p class="mb-1"><strong>${{ $product->price }}</strong></p>
                      <button class="btn btn-danger btn-sm">Remove</button>
                    </div>
                  </div>
                  @php
                      $subtotal += $product->price;
                  @endphp
                @endforeach
              @else
                <div class="row mb-3">
                  <h5>Parece que su carrito está vacío... Anímese a explorar nuestra tienda!</h5>
                </div>
              @endif
            </div>
          </div>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>Resumen</h4>
            </div>
            <div class="card-body">
              <p class="d-flex justify-content-between">
                <span>Subtotal</span>
                <span>&euro;{{ $subtotal }}</span>
              </p>
              <button class="btn btn-primary btn-block mt-3">Hacer Pedido</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <style>
    .card-header {
      background-color: #f8f9fa;
    }

    .btn-danger {
      background-color: #dc3545;
      border: none;
    }
  </style>
@endsection

@section('scripts')
  <script src="{{ asset('/js/cart.js') }}"></script>
@endsection
