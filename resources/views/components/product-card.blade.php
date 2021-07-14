<div class="card">
    <img height="500" src="{{ asset($product->images->first()->path )}}" alt="" class="card-img-top">
    <div class="card-body">
        <h4 class="text-right"><strong>${{ $product->price }}</strong></h4>
        <h5 class="card-title">{{ $product->title}}</h5>
        <p class="text-right">{{ $product->description}}</p>
        <p class="text-right">{{ $product->stock}}</p>
        <p class="text-right"><strong>{{ $product->status}}</strong></p>
        <form action="{{route('products.carts.store',['product' => $product->id])}}" class="" method="post">
        @csrf
            <input type="submit" value="Add to Car" class="btn btn-success">
        </form>
    </div>
</div>
