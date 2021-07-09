@extends('layouts.master')

@section('content')
    <h1>Edit a Product</h1>
    <form action="{{ route('products.update', ['product' => $product->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $product->title}}" >
        </div>
        <div class="form-row">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="2" >{{ $product->description}}</textarea>
        </div>
        <div class="form-row">
            <label for="price">Price</label>
            <input type="number" name="price" min="1.00" step="0.01" id="price" value="{{ $product->price}}" class="form-control" >
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" min="0" class="form-control" value="{{ $product->stock}}" >
        </div>
        <div class="form-row">
            <label for="Status">Status</label>
            <select name="status" id="status" class="form-control" >
                <option {{ $product->status == 'Available' ? 'selected' : ''}} value="Available" >Available</option>
                <option {{ $product->status == 'Unavailable' ? 'selected' : ''}} value="Unavailable" >Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Create</button>
        </div>
    </form>
@endsection