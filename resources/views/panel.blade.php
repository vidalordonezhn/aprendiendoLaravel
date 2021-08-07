@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Panel') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        <a class="list-group-item" href="{{ route('product.index') }}">Productos</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
