@extends('layouts')

@section('content')
  <div class="auth-container">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="error-title">404 <br />Página no encontrada</h1>
          <p class="error-message">Ups! Parece que la página a la que has intentado acceder no existe...</p>
          <a href="{{ url('/') }}" class="btn btn-primary home-button">Volver al inicio</a>
        </div>
      </div>
    </div>
  </div>

  <style>

    .container {
      text-align: center;
    }

    .error-title {
      font-size: 6rem;
      font-weight: 700;
      color: #343a40;
    }

    .error-message {
      font-size: 1.25rem;
      color: #6c757d;
    }

    .home-button {
      margin-top: 20px;
      background-color: black;
      color: white;
      border: 0;
    }
  </style>
@endsection
