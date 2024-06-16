@extends('layouts')

@section('content')
  <div class="auth-container">
    <div class="card">
      <div class="card-header">
        <div class="float-start">
          Añadir Imagen
        </div>
        <div class="float-end">
          <a href="{{ route('images.index') }}" class="btn btn-primary btn-sm">&larr; Atras</a>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="mb-3 row">
            <label for="productId" class="col-md-4 col-form-label text-md-end text-start">ID de Producto
              Asociado</label>
            <div class="col-md-6">
              <input type="number" class="form-control @error('productId') is-invalid @enderror" id="productId"
                name="productId" value="{{ old('productId') }}">
              @if ($errors->has('productId'))
                <span class="text-danger">{{ $errors->first('productId') }}</span>
              @endif
            </div>
          </div>

          <div class="mb-3 row">
            <label for="image" class="col-md-4 col-form-label text-md-end text-start">Subir la
              Imagen</label>
            <div class="col-md-6">
              <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                name="image" value="{{ old('image') }}" accept="image/jpeg, image/png">
              @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
              @endif
            </div>
          </div>

          <div class="mb-3 row">
            <label for="altText" class="col-md-4 col-form-label text-md-end text-start">Texto
              Alternativo</label>
            <div class="col-md-6">
              <input type="textarea" class="form-control @error('altText') is-invalid @enderror" id="altText"
                name="altText" value="{{ old('altText') }}">
              @if ($errors->has('altText'))
                <span class="text-danger">{{ $errors->first('altText') }}</span>
              @endif
            </div>
          </div>

          <div class="mb-3 row">
            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Añadir Imagen">
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection
