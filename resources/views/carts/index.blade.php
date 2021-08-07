@extends('layouts.app')

@section('content')
    <h1>Your cart</h1>
    @if(!isset($cart) || $cart->products->isEmpty())
        <div class="alert alert-warning">
            <strong>your cart in empty!!</strong>
        </div>
    @else
        <a class="btn btn-success mb-2" href="{{ route('orders.create') }}">Start Order</a>
        <h4 class="text-center"><strong>Total: </strong>{{ $cart->total }}</h4>
         <div class="row">
             @foreach ($cart->products as $product)     
             <div class="col-3">
                @include('components.product-card')
            </div>
            @endforeach
         </div>
    @endif
@endsection