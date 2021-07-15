@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Order Details</h1>

    <h4 class="text-center"><strong>Grand Total:</strong> {{ $cart->total }}</h4>
    <div class="text-center mb-3">
        <form 
            action="{{route('orders.store')}}" 
            class="d-inline" 
            method="post">
            @csrf
            <input type="submit" value="Confirm Order" class="btn btn-success">
        </form>

    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->products as $obj)
                <tr>
                    <td>
                        <img height="100" src="{{ asset($obj->images->first()->path)}}" alt="" srcset="">
                    </td>
                    <td>{{ $obj->title }} ({{ $obj->id }}) </td>
                    <td>{{ $obj->price }}</td>
                    <td>{{ $obj->pivot->quantity }}</td>
                    <td>
                        <strong>
                            {{ $obj->total }}
                        </strong>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
            </div>
</div>
    
@endsection