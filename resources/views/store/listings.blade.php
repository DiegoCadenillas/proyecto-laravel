@extends('layouts')

@section('content')
  <section class="auth-container" style="margin-bottom: 6.5rem">
    <div class="store-container">
      <!-- Category Filter and Search Bar -->
      <div class="filter-search-container">
        <select id="category-filter" class="filter-select">
          <option value="">Seleccione una categoría...</option>
          <option value="Pendientes">Pendientes</option>
          <option value="Cadenas">Cadenas</option>
          <option value="Sortijas">Sortijas</option>
        </select>
        <input type="text" id="search-bar" class="form-control" placeholder="Búsqueda...">
      </div>

      <input type="hidden" id="products-array" value="{{ json_encode($products) }}">
      <input type="hidden" id="product-images-route" value="{{ asset('/productImages') }}">
      <input type="hidden" id="store-link" value="{{ url('/tienda/') }}">

      <!-- Products Grid -->
      <section class="page-section" id="productos-calientes">
        <div class="container">
          <div class="row">
            @foreach ($products as $product)
              <div class="col-lg-4 col-sm-6 mb-4">
                <div class="productos-calientes-item">
                  <a class="productos-calientes-link" href="{{ route('store.getProduct', ['id' => $product->id]) }}">
                    <div class="productos-calientes-hover">
                      <div class="productos-calientes-hover-content">
                        {{-- <i class="fas fa-plus fa-3x"></i> --}}
                        @if ($product->images->isNotEmpty())
                          <img class="productos-calientes-img"
                            src="{{ asset('productImages/' . $product->images->first()->imgURL) }}"
                            alt="{{ $product->name }}">
                        @else
                          <img class="productos-calientes-img" alt="Imagen no encontrada...">
                        @endif
                      </div>
                    </div>
                    @if ($product->images->isNotEmpty())
                      <img class="productos-calientes-img"
                        src="{{ asset('productImages/' . $product->images->first()->imgURL) }}"
                        alt="{{ $product->name }}">
                    @else
                      <img class="productos-calientes-img" alt="Imagen no encontrada...">
                    @endif
                  </a>
                  <div class="productos-calientes-caption">
                    <div class="productos-calientes-caption-heading">{{ $product->name }}</div>
                    <div class="productos-calientes-caption-subheading text-muted">&euro;{{ $product->price }}</div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>
    </div>
  </section>
@endsection

@section('scripts')
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#category-filter, #search-bar').on('change keyup', function() {
        let category = $('#category-filter').val();
        let search = $('#search-bar').val().toLowerCase();

        $.ajax({
          url: "{{ route('products.filter') }}",
          type: 'GET',
          data: {
            category: category,
            search: search
          },
          success: function(data) {
            $('#products-grid').html(data);
          }
        });
      });
    });
  </script> --}}
  <script src="{{ asset('/js/storeListings.js') }}"></script>
@endsection
