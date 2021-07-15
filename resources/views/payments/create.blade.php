@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Order Details</h1>

    <h4 class="text-center"><strong>Grand Total:</strong> {{ $order->total }}</h4>
    <div class="text-center mb-3">
        <form 
            action="{{route('orders.payments.store',['order' => $order->id ])}}" 
            class="d-inline" 
            method="post">
            @csrf
            <input type="submit" value="Pay" class="btn btn-success">
        </form>

    </div>
</div>
    
@endsection