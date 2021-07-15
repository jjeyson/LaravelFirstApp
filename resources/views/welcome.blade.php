@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Welcome</h1>
    @empty($products)
        <div class="alert alert-danger">
            No products yet!
        </div>
    @else
        {{-- @dump($products) --}}
        <div class="row">
            @foreach ($products as $product)
                <div class="col-3">
                    @include('components.product-card')
                </div>
            @endforeach
        </div>
        {{-- @dump($products) --}}

        {{-- @dd(\DB::getQueryLog()); --}}
    @endempty
    <p>Let's go</p>
</div>
@endsection
