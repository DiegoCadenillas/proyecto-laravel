@extends('layouts')

@section('content')
  <div class="auth-container">
    <div class="card">
      <div class="row">
        <div class="col-md-8 cart">
          <div class="title">
            <div class="row">
              <div class="col">
                <h4><b>Carrito</b></h4>
              </div>
              <div class="col align-self-center text-right text-muted">Cantidad: {{ $cartItems != null ? count($cartItems) : 0 }}
              </div>
            </div>
          </div>
          @php
              $totalPrice = 0.0;
          @endphp
          @if ($error != null && $error != '')
            <div class="row border-top border-bottom">
              {{ $error }}
            </div>
          @else
          @foreach ($cartItems as $product)
          <div class="row border-top border-bottom">
            <div class="row main align-items-center">
              <div class="col-2"><img class="img-fluid" src="{{ $product->images->first()->imgURL }}"></div>
              <div class="col">
                <div class="row text-muted">Shirt</div>
                <div class="row">Cotton T-shirt</div>
              </div>
              <div class="col">
                <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
              </div>
              <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
            </div>
          </div>
          @endforeach
          <div class="row border-top border-bottom">
            <div class="row main align-items-center">
              <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
              <div class="col">
                <div class="row text-muted">Shirt</div>
                <div class="row">Cotton T-shirt</div>
              </div>
              <div class="col">
                <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
              </div>
              <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
            </div>
          </div>
            <div class="row">
              <div class="row main align-items-center">
                <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/ba3tvGm.jpg"></div>
                <div class="col">
                  <div class="row text-muted">Shirt</div>
                  <div class="row">Cotton T-shirt</div>
                </div>
                <div class="col">
                  <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
                </div>
                <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
              </div>
            </div>
            <div class="row border-top border-bottom">
              <div class="row main align-items-center">
                <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/pHQ3xT3.jpg"></div>
                <div class="col">
                  <div class="row text-muted">Shirt</div>
                  <div class="row">Cotton T-shirt</div>
                </div>
                <div class="col">
                  <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
                </div>
                <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
              </div>
            </div>
          @endif
          <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
        </div>
        <div class="col-md-4 summary">
          <div>
            <h5><b>Summary</b></h5>
          </div>
          <hr>
          <div class="row">
            <div class="col" style="padding-left:0;">Cantidad: {{ ($cartItems != null) ? count($cartItems) : 0 }}</div>
            <div class="col text-right">&euro; {{ $totalPrice }}</div>
          </div>
          <form>
            <p>SHIPPING</p>
            <select>
              <option class="text-muted">Standard-Delivery- &euro;5.00</option>
            </select>
          </form>
          <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
            <div class="col">TOTAL PRICE</div>
            <div class="col text-right">&euro; 137.00</div>
          </div>
          <button class="btn">CHECKOUT</button>
        </div>
      </div>
    </div>
  </div>
@endsection
