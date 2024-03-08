@extends('images.layouts')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Información de la Imagen
                    </div>
                    <div class="float-end">
                        <a href="{{ route('images.index') }}" class="btn btn-primary btn-sm">&larr; Atras</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <label for="code"
                            class="col-md-4 col-form-label text-md-end text-start"><strong>Imagen:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <img src="/productImages/{{ $image->imgURL }}">
                        </div>
                    </div>

                    <!-- MUESTRA DE NOMBRBE DE PRODUCTO -->
                    <div class="row">
                        <label for="product-name" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre de
                                Producto:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $productName }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="edad" class="col-md-4 col-form-label text-md-end text-start"><strong>Texto
                                Alternativo:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $image->altText }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
