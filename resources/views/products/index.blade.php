@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>List of products</h1>

    <a class="btn btn-primary mb-3" href="{{ route('products.create')}}">Create</a>
    @empty($products)
        
    <div class="alert alert-warning">
        The List is empty
    </div>

    @else
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $obj)
                    <tr>
                            <td>{{ $obj->id }}</td>
                            <td>{{ $obj->title }}</td>
                            <td>{{ $obj->description }}</td>
                            <td>{{ $obj->price }}</td>
                            <td>{{ $obj->stock }}</td>
                            <td>{{ $obj->status }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('products.show',['product' => $obj->title])}}">Show</a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('products.edit', ['product' => $obj->id])}}">Edit</a>
                            </td>
                            <td>
                                <form class="d-inline" action="{{ route('products.destroy', ['product' => $obj->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
</div>
    @endempty
    
@endsection