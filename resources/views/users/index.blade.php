@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2>
            @if(session('search_term'))
                Search Results for: "{{ session('search_term') }}"
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary ms-3">Clear Search</a>
            @else
                Users List
            @endif
        </h2>
    </div>
    <div class="col-md-4">
        <form action="{{ route('users.search') }}" method="GET" class="d-flex">
            <input type="text" name="name" class="form-control me-2" 
                   placeholder="Search by name..." 
                   value="{{ session('search_term') ?? '' }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>

@if(isset($error))
    <div class="alert alert-danger">{{ $error }}</div>
@endif

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>City</th>
                <th>Phone</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ substr($user['_id'] ?? '', -8) }}</td>
                    <td>{{ $user['name'] ?? 'N/A' }}</td>
                    <td>{{ $user['email'] ?? 'N/A' }}</td>
                    <td>{{ $user['age'] ?? 'N/A' }}</td>
                    <td>{{ $user['city'] ?? 'N/A' }}</td>
                    <td>{{ $user['phone'] ?? 'N/A' }}</td>
                    <td>{{ isset($user['createdAt']) ? date('Y-m-d', strtotime($user['createdAt'])) : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('users.show', $user['_id']) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('users.edit', $user['_id']) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('users.destroy', $user['_id']) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">
                        @if(session('search_term'))
                            No users found matching "{{ session('search_term') }}"
                        @else
                            No users found
                        @endif
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection