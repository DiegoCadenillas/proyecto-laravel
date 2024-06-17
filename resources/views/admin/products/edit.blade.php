@extends('layouts')

@section('content')
  <div class="auth-container">
    @if ($message = Session::get('success'))
      <div class="alert alert-success" role="alert">
        {{ $message }}
      </div>
    @endif

    <div class="card">
      <div class="card-header">
        <div class="float-start">
          Modificar Producto
        </div>
        <div class="float-end">
          <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Atras</a>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="post">
          @csrf
          @method('PUT')


          <div class="mb-3 row">
            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Nombre</label>
            <div class="col-md-6">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ $product->name }}">
              @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('nombre') }}</span>
              @endif
            </div>
          </div>

          <div class="mb-3 row">
            <label for="description" class="col-md-4 col-form-label text-md-end text-start">Descripción</label>
            <div class="col-md-6">
              <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                name="description" value="{{ $product->description }}">
              @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
              @endif
            </div>
          </div>

          <div class="mb-3 row">
            <label for="category" class="col-md-4 col-form-label text-md-end text-start">Categoría</label>
            <div class="col-md-6">
              <select name="category" id="category" placeholder="Elija una..." class="form-select" required>
                <option value="" disabled>Elija una opción</option>
                <option value="Pendientes" {{ $product->category == 'Pendientes' ? 'selected' : '' }}>Pendientes</option>
                <option value="Cadenas" {{ $product->category == 'Cadenas' ? 'selected' : '' }}>Cadenas</option>
                <option value="Sortijas" {{ $product->category == 'Sortijas' ? 'selected' : '' }}>Sortijas</option>
              </select>
              @if ($errors->has('category'))
                <span class="text-danger">{{ $errors->first('category') }}</span>
              @endif
            </div>
          </div>

          <div class="mb-3 row">
            <label for="price" class="col-md-4 col-form-label text-md-end text-start">Precio</label>
            <div class="col-md-6">
              <input type="number" step=0.01 class="form-control @error('price') is-invalid @enderror" id="price"
                name="price" value="{{ $product->price }}" min="0" max="100000.00">
              @if ($errors->has('price'))
                <span class="text-danger">{{ $errors->first('price') }}</span>
              @endif
            </div>
          </div>

          <div class="mb-3 row">
            <label for="stock" class="col-md-4 col-form-label text-md-end text-start">Stock</label>
            <div class="col-md-6">
              <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock"
                name="stock" value="{{ $product->stock }}" min="0" max="1000000.00">
              @if ($errors->has('stock'))
                <span class="text-danger">{{ $errors->first('stock') }}</span>
              @endif
            </div>
          </div>


          <div class="mb-3 row">
            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Actualizar product">
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection
