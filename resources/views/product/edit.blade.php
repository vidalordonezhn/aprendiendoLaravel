@extends('layouts.app')


@section('content')
    <h2>Nuevo Producto</h2>
    <div class="row">
        <div class="col-6">
            <form action="{{ route('product.update', $product) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Titulo"
                        value="{{ old('title') ?? $product->title }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <input type="text" class="form-control" id="description" name="description"
                        value="{{ old('description') ?? $product->description }}" required placeholder="Descripcion">
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number" class="form-control" id="price" name="price" min="1.00"
                        value="{{ old('price') ?? $product->price }}" required step="0.01" placeholder="Precio">
                </div>
                <div class="form-group">
                    <label for="stock">Cantidad</label>
                    <input type="number" class="form-control" id="stock" name="stock" min="1.00"
                        value="{{ old('stock') ?? $product->stock }}" required placeholder="Stock">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="">Seleccione una opcion</option>
                        <option {{ old('status') == 'available' ? 'selected' :  ($product->status == 'available' ? 'selected' : '') }} value="available">Disponible
                        </option>
                        <option {{ old('status') == 'unavailable' ? 'selected' :  ($product->status == 'unavailable' ? 'selected' : '') }} value="unavailable">No
                            disponible</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar producto</button>
            </form>
        </div>
    </div>
@endsection
