@extends('layouts.app')

@section('content')
    <a href="{{ route('product.create') }}" class="btn btn-success m-1">Nuevo Producto</a>
    @empty($products)
        <div class="alert alert-warning">
            No hay productos
        </div>
    @else
        <div class="table-responsive-sm">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Status</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $product)
                        <tr>
                            <td scope="row">{{ $product->id }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ Str::limit($product->description, 25) }}</td>
                            <td>{{  $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->status }}</td>
                            <td>
                                <a href="{{ route('product.show', $product) }}" class="btn btn-secondary btn-sm m-1">Ver</a>
                                <a href="{{ route('product.edit', $product) }}" class="btn btn-warning btn-sm m-1">Editar</a>
                                <form class="d-inline" action="{{ route('product.destroy', $product) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Desea eliminarlo... ?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $products->links() }} --}}
        </div>
    @endempty
@endsection
