@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">User Details</div>

            <div class="card-body">
                <table class="table">
                    <tr>
                        <th style="width: 150px;">ID:</th>
                        <td>{{ $user['_id'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td>{{ $user['name'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $user['email'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Age:</th>
                        <td>{{ $user['age'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>City:</th>
                        <td>{{ $user['city'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td>{{ $user['phone'] ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Created At:</th>
                        <td>{{ isset($user['createdAt']) ? date('Y-m-d H:i:s', strtotime($user['createdAt'])) : 'N/A' }}</td>
                    </tr>
                </table>

                <div class="mt-3">
                    <a href="{{ route('users.edit', $user['_id']) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection