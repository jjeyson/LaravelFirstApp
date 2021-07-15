<div class="card">
    <div class="card-body">
        <div class="carousel slide carousel-fade" id="carousel{{ $product->id }}">
            <div class="carousel-inner">
                @foreach ($product->images as $item)
                <div class="carousel-item {{ $loop->first ? 'active': '' }}">
                    <img class="d-block w-100 card-img-top" height="500" src="{{ asset($item->path)}}" alt="" class="card-img-top">
                    </div>
                @endforeach
            </div>
            <a href="#carousel{{ $product->id }}" class="carousel-control-prev" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a href="#carousel{{ $product->id }}" class="carousel-control-next" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
            </div>
            <h4 class="text-right"><strong>${{ $product->price }}</strong></h4>
            <h5 class="card-title">{{ $product->title}}</h5>
            <p class="text-right">{{ $product->description}}</p>
            <p class="text-right"><strong>{{ $product->stock}} left</strong></p>
            <p class="text-right">{{ $product->status}}</p>
        @if (isset($cart))
            <p class="card-text">{{ $product->pivot->quantity }} in your cart <strong> ${{ $product->total }}</strong> </p>
            <form 
                action="{{route('products.carts.destroy',['cart' => $cart->id, 'product' => $product->id])}}" 
                class="d-inline" method="post">
                @method('DELETE')
                @csrf
                    <input type="submit" value="Remove From Cart" class="btn btn-danger">
            </form>
            
        @else
            <form 
                action="{{route('products.carts.store',['product' => $product->id])}}" 
                class="d-inline" method="post">
                @csrf
                <input type="submit" value="Add to Car" class="btn btn-success">
            </form>
            
        @endif
    </div>
</div>
