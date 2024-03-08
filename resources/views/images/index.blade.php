@extends('images.layouts')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">Listado de Imágenes</div>
                <div class="card-body">
                    <a href="{{ route('images.create') }}" class="btn btn-success btn-sm my-2"><i
                            class="bi bi-plus-circle"></i> Nueva imagen</a>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Nombre de Producto</th>
                                <th scope="col">Texto Alternativo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($images as $image)
                                <tr>
                                    <th scope="row">{{ $image->id }}</th>
                                    <td><img src="/productImages/{{ $image->imgURL }}"
                                            alt="{{ $image->altText }}"></td>
                                    <!-- Muestra de nombre del producto -->
                                    <td>{{ $productNames[$image->productId] }}</td>
                                    <td>{{ $image->altText }}</td>
                                    <td>
                                        <form action="{{ route('images.destroy', $image->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('images.show', $image->id) }}"
                                                class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Ver</a>

                                            <a href="{{ route('images.edit', $image->id) }}"
                                                class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i>
                                                Editar</a>

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Quieres Borrar esta imagen?');"><i
                                                    class="bi bi-trash"></i> Borrar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
