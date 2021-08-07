<div class="card">
    <div id="carousel{{ $product->id }}" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            @foreach ($product->images as $image)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img height="400" class="d-block w-100 card-img-top" src="{{ asset( $image->path ) }}" alt="First slide">
              </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carousel{{ $product->id }}" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#carousel{{ $product->id }}" role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <div class="card-body">
        <p class="text-right">Lps.<strong> {{ $product->price }} </strong></p>
        <h4 class="card-title">{{ $product->title }}</h4>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text"> <strong> {{ $product->stock }} left </strong></p>

        @if (isset($cart))

        <p class="card-text"> <strong> {{ $product->pivot->quantity }} units and total ({{ $product->total }}) </strong>
        </p>

        <form class="d-inline" method="POST" action="{{ route('products.carts.destroy', compact('cart','product')) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Revome from cart</button>
        </form>
        @else
        <form class="d-inline" method="POST" action="{{ route('products.carts.store', $product) }}">
            @csrf
            <button type="submit" class="btn btn-success">Add to cart</button>
        </form>
        @endif
    </div>
</div>