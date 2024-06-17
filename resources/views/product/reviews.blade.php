@extends('layouts')

@section('content')
  <div class="auth-container">
    <div class="container mt-5" style="display:flex;flex-direction:column;justify-content:center;">
      <h1 class="mb-4" style="text-align:center;width:100%;">Reseñas - {{ $product->name }}</h1>
      <img src="{{ asset('/productImages/' . $product->images->first()->imgURL) }}" alt="Imagen de {{ $product->name }}"
        style="width:25%;margin:auto;padding-bottom:1rem;">

      @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
          {{ $message }}
        </div>
      @endif

      @if ($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
          {{ $message }}
        </div>
      @endif

      @php
        $userReview = Auth::user()->getReviewsByCurrentProductId($product->id);
      @endphp

      @if ($userReview == null)
        <form method="POST" action="{{ route('reviews.store') }}" style="margin-bottom:2.5rem;margin-top:2rem;">
          @csrf
          <h4 class="mb-4" style="text-align:center;width:100%;">Escriba su propia reseña</h1>

            <div class="form-group">
              <label for="score">Puntuación</label>
              <select class="form-control" id="score" name="score" required>
                <option value="" disabled selected>Elija una opción</option>
                <option value="5">5 - Excelente</option>
                <option value="4">4 - Muy bueno</option>
                <option value="3">3 - Decente</option>
                <option value="2">2 - Regular</option>
                <option value="1">1 - Malo</option>
              </select>
            </div>

            <div class="form-group" style="margin-top:1.5rem">
              <label for="comment">Comentario</label>
              <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>

            <input type="hidden" name="productId" value="{{ $product->id }}" style="margin-top:1.5rem">

            <button type="submit" class="btn btn-primary" style="margin-top:1.5rem">Guardar Reseña</button>
        </form>
      @else
        <div class="card review-card" style="margin:1rem auto;width: 80%;" id="user-review">
          <div class="card-body">
            <h5 class="card-title">{{ $userReview->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $userReview->getUserName() }} -
              {{ $userReview->created_at->format('F j, Y') }}</h6>
            <p class="card-text">
              @for ($i = 0; $i < 5; $i++)
                <span class="fa fa-star{{ $i < $userReview->score ? '' : '-o' }} score"></span>
              @endfor
            </p>
            <p class="card-text">{{ $userReview->comment }}</p>
          </div>
          <div class="btn-group" role="group">
            <!-- Edit Button -->
            <button class="btn btn-secondary" style="width:5% !important" id="review-edit-btn">
              <i class="fas fa-edit"></i> Editar
            </button>

            <!-- Delete Button -->
            <form action="{{ route('reviews.destroy', ['review' => $userReview]) }}" method="POST"
              style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger"
                onclick="return confirm('Está seguro de que desea eliminar su reseña?')">
                <i class="fas fa-trash-alt"></i> Borrar
              </button>
            </form>
          </div>
        </div>
        <form method="POST"
          action="{{ route('reviews.edit', ['id' => $userReview->productId, 'reviewId' => $userReview->id]) }}"
          class="hidden-review-edit-form" id="review-edit-form">
          @csrf
          @method('PUT')
        </form>
      @endif

      @if (count($product->reviews) > 0)
        @foreach ($product->reviews as $review)
          @if ($review->userId != Auth::user()->id)
            <div class="card review-card" style="margin:1rem auto;width: 80%;">
              <div class="card-body">
                <h5 class="card-title">{{ $review->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $review->getUserName() }} -
                  {{ $review->created_at->format('F j, Y') }}</h6>
                <p class="card-text">
                  @for ($i = 0; $i < 5; $i++)
                    <span class="fa fa-star{{ $i < $review->score ? '' : '-o' }} score"></span>
                  @endfor
                </p>
                <p class="card-text">{{ $review->comment }}</p>
              </div>
            </div>
          @endif
        @endforeach
      @endif
      <!-- Pagination Links (if applicable) -->
    </div>
  </div>

  <style>
    .review-card {
      margin-bottom: 20px;
    }

    .score {
      color: #ffc107;
    }
  </style>
@endsection

@section('scripts')
  <script src="{{ asset('/js/reviews.js') }}"></script>
@endsection
