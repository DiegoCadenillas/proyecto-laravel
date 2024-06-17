@extends('layouts')

@section('content')
  <div class="auth-container">
    <section class="user-profile-section">
      <div class="profile-container">
        <!-- Display Profile Information -->
        <div id="profile-info">
          <p>Nombre: {{ auth()->user()->name }}</p>
          <p>Correo Electrónico: {{ auth()->user()->email }}</p>
          <button id="edit-profile-btn" class="edit-profile-btn">Editar Perfil</button>
        </div>

        <!-- Edit Profile Form -->
        <div id="profile-form" style="display: none;">
          <form method="POST" action="{{ route('user.update') }}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">Nombre de usuario</label>
              <input type="text" name="name" class="form-control" placeholder="Nombre de usuario"
                value="{{ old('name', auth()->user()->name) }}">
            </div>
            <div class="form-group">
              <label for="email">Correo Electrónico</label>
              <input type="email" class="form-control" name="email" placeholder="Correo Electrónico"
                value="{{ old('email', auth()->user()->email) }}">
            </div>
            <div class="form-group">
              <label for="old_password" class="col-md-4 col-form-label text-md-end text-start">Contraseña</label>
                <input type="password" placeholder="Contraseña antigua" class="form-control @error('password') is-invalid @enderror" id="old_password"
                  name="password">
                @if ($errors->has('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="new_password">Nueva Contraseña</label>
                <input type="password" class="form-control" name="new_password" placeholder="Nueva Contraseña">
              </div>
              <div class="form-group">
                  <input type="password" placeholder="Confirmar Nueva Contraseña" class="form-control" id="password_confirmation" name="password_confirmation">
              </div>
              <button type="submit" class="btn btn-success">Actualizar Datos</button>
              <button type="button" class="btn btn-warning" id="cancel-edit-profile-btn">Cancelar</button>
          </form>
        </div>
      </div>
    </section>

    <style>
      .user-profile-section {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px;
        width: 75%;
      }

      .profile-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
      }

      .edit-profile-btn,
      .update-profile-btn {
        padding: 10px 15px;
        background-color: #d3d3d3;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      .form-group {
        display: flex;
        flex-direction: column;
        gap: 10px;
      }

      .form-group input {
        padding: 15px;
        border: 1px solid #d3d3d3;
        border-radius: 5px;
        font-size: 16px;
      }

      form {
        display: flex;
        flex-direction: column;
        gap: 1.35rem;
      }

      #profile-info {
        display: flex;
        flex-direction: column;
        justify-content: center;
      }

      #profile-info p {
        text-align: center;
      }
    </style>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('js/profile.js') }}"></script>
@endsection
