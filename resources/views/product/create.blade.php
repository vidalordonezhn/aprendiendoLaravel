@extends('layouts.app')


@section('content')
    <h2>Nuevo Producto</h2>
    <form action="{{ route('product.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Titulo" required value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="description">Descripcion</label>
            <input type="text" class="form-control" id="description" name="description" required value="{{ old('description') }}" placeholder="Descripcion">
        </div>
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" class="form-control" id="price" name="price" min="1.00" value="{{ old('price') }}"  step="0.01" placeholder="Precio">
        </div>
        <div class="form-group">
            <label for="stock">Cantidad</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" placeholder="Stock">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                  <option value="">Seleccione una opcion</option>
                  <option {{ old('status') == 'available' ? 'selected' : '' }} value="available">Disponible</option>
                  <option {{ old('status') == 'unavailable' ? 'selected' : '' }} value="unavailable">No disponible</option>
                </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear producto</button>
    </form>
@endsection
