@extends('layouts')

@section('content')
  <div class="auth-container">
    <div class="card">
      <div class="card-header">
        <div class="float-start">
          Información del Producto
        </div>
        <div class="float-end">
          <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Atras</a>
        </div>
      </div>
      <div class="card-body">

        <div class="row">
          <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre:</strong></label>
          <div class="col-md-6" style="line-height: 35px;">
            {{ $product->name }}
          </div>
        </div>

        <div class="row">
          <label for="apellidos"
            class="col-md-4 col-form-label text-md-end text-start"><strong>Descripción:</strong></label>
          <div class="col-md-6" style="line-height: 35px;">
            {{ $product->description }}
          </div>
        </div>

        <div class="row">
          <label for="edad" class="col-md-4 col-form-label text-md-end text-start"><strong>Categoría:</strong></label>
          <div class="col-md-6" style="line-height: 35px;">
            {{ $product->category }}
          </div>
        </div>

        <div class="row">
          <label for="nota" class="col-md-4 col-form-label text-md-end text-start"><strong>Precio:</strong></label>
          <div class="col-md-6" style="line-height: 35px;">
            {{ $product->price }}
          </div>
        </div>

        <div class="row">
          <label for="descripcion" class="col-md-4 col-form-label text-md-end text-start"><strong>Stock:</strong></label>
          <div class="col-md-6" style="line-height: 35px;">
            {{ $product->stock }}
          </div>
        </div>

        <div class="row">
          <label for="images" class="col-md-4 col-form-label text-md-end text-start"><strong>Imágenes:</strong></label>
          <div class="col-md-6" style="line-height: 35px;">
            @if (sizeof($images) == 0)
              <div class="col-md-6" style="line-height: 35px;">
                <p>Ninguna.</p>
              </div>
            @else
              @foreach ($images as $image)
                <img src="/productImages/{{ $image->imgURL }}" alt="{{ $image->altText }}">
                <p>Texto Alternativo: {{ $image->altText }}</p>
              @endforeach
            @endif
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
