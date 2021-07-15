@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Your Cart</h1>
    @if(!isset($cart) || $cart->products->isEmpty())
        <div class="alert alert-warning">
            You cart is empty
        </div>
    @else

        <h4 class="text-center"><strong>Your Cart total:</strong> {{ $cart->total }}</h4>
        <a href="{{ route('orders.create')}}" class="btn btn-primary mb-3" >Start Order</a>
        <div class="row">
            @foreach ($cart->products as $product)
                <div class="col-3">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
    @endif
    <p>Let's go</p>
</div>
@endsection
