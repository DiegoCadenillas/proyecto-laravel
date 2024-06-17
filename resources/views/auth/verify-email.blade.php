@extends('layouts')

@section('content')
  <div class="auth-container">
    <div class="card">
      <div class="card-header">Verifique su correo electrónico</div>
      <div class="card-body">
        @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
            {{ $message }}
          </div>
        @endif
        Cuenta registrada con éxito. Revise su correo para encontrar el enlace de activación de cuenta. Si no lo
        encuentra, o si desea que se le envíe otro correo,
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
          @csrf
          <button type="submit" class="btn btn-link p-0 m-0 align-baseline">haga click aquí para pedir otro
            correo</button>.
        </form>
      </div>
    </div>
  </div>
@endsection
