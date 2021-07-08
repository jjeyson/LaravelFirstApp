@extends('layouts.master')

@section('content')
    <h1>List of products</h1>

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
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
    @endempty
    
@endsection