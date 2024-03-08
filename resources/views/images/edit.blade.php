@extends('images.layouts')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Modificar Imagen
                    </div>
                    <div class="float-end">
                        <a href="{{ route('images.index') }}" class="btn btn-primary btn-sm">&larr; Atras</a>
                    </div>
                </div>
                <div class="row">
                    <label for="code"
                        class="col-md-4 col-form-label text-md-end text-start"><strong>Imagen:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        <img src="/productImages/{{ $image->imgURL }}">
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('images.update', $image->id) }}" method="post">
                        @csrf
                        @method('PUT')


                        <div class="mb-3 row">
                            <label for="altText" class="col-md-4 col-form-label text-md-end text-start">Texto
                                Alternativo</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('altText') is-invalid @enderror"
                                    id="altText" name="altText" value="{{ $image->altText }}">
                                @if ($errors->has('altText'))
                                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" value="{{ $image->productoId }}">

                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Actualizar Imagen">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
