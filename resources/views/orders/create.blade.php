@extends('layouts.app')

@section('content')
    <h3>Order Details</h3>
    <h4 class="text-center"><strong>Total: </strong>{{ $cart->total }}</h4>
    <div class="text-center my-2">

        <form class="d-inline" method="POST" action="{{ route('orders.store') }}">
            @csrf
            <button type="submit" class="btn btn-success">Confirm order</button>
        </form>
    </div>
    <div class="table-responsive-sm">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->products as $product)
                <tr>
                    <td>
                        <img height="60" src="{{ asset( $product->images->first()->path ) }}" alt="producto">
                        {{ $product->title }}
                    </td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>
                        <strong>
                            {{ $product->total  }}
                        </strong>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
