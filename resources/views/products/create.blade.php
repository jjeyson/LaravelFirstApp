@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Create a product</h1>

    <form action="{{ route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title')}}" >
        </div>
        <div class="form-row">
            <label for="description">Description</label>
            <textarea name="description" id="description"  class="form-control">{{ old('description') }}</textarea>
        </div>
        <div class="form-row">
            <label for="price">Price</label>
            <input type="number" name="price" min="1.00" step="0.01" id="price" class="form-control" value="{{ old('price')}}" >
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" min="0" class="form-control" value="{{ old('stock')}}" >
        </div>
        <div class="form-row">
            <label for="Status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="" selected >Select...</option>
                <option {{ old('status')=='Available' ? 'selected' : ''}} value="Available" >Available</option>
                <option {{ old('status')=='Unavailable' ? 'selected' :''}} value="Unavailable" >Unavailable</option>
            </select>
        </div>
        <div class="formrow">
            <label>{{ __('Image') }}</label>

            <div class="col-md-6">
                <div class="custom-file">
                    <input type="file" accept="image/*" name="images[]" class="custom-file-input" multiple>
                    <label class="custom-file-label">
                        Product image...
                    </label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Create</button>
        </div>
    </form>
</div>
@endsection