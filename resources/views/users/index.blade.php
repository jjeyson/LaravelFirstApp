@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>List of users</h1>

    @empty($users)
        
    <div class="alert alert-warning">
        The List is empty
    </div>

    @else
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Admin Since</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $obj)
                    <tr>
                        <td>{{ $obj->id }}</td>
                        <td>{{ $obj->name }}</td>
                        <td>{{ $obj->email }}</td>
                        <td>
                            {{ optional($obj->admin_since)->diffForHumans() ?? 'Never' }}
                        </td>
                        <td>
                            <form class="d-inline" action="{{ route('users.admin.toggle', ['user' => $obj->id])}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-link">
                                    {{ $obj->isAdmin() ? 'Remove' : 'Make' }}
                                    Admin
                                </button>
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