@extends('layouts.app')

@section('content')
    <h3>Payments Details</h3>
    <h4 class="text-center"><strong>Total: </strong>{{ $order->total }}</h4>

    <div class="text-center my-2">
        <form class="d-inline" method="POST" action="{{ route('orders.payment.store', $order) }}">
            @csrf
            <button type="submit" class="btn btn-success">Pay</button>
        </form>
    </div>
@endsection
