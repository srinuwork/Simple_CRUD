@extends('layouts.custom')

@section('title', 'All Clients')

@section('content')
<div class="directory-container">
    <div class="header">
        <h1>👥 Client Management System</h1>
        <button class="btn-add" onclick="location.href='{{ route('create') }}'">➕ Add New User</button> 
    </div>
    
    @if(session('message'))
        <div class="success-msg">✓ {{ session('message') }}</div>
    @endif
    
    <h2>User Directory</h2>
    <div class="table-wrapper">
        @if($users->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><strong>#{{ $user->id }}</strong></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->db_phone }}</td>
                            <td>
                                <div class="action-btns">
                                    <a class="btn-view" href="{{ route('view', $user->id) }}">👁️ View</a>
                                    <a class="btn-edit" href="{{ route('edit', $user->id) }}">✏️ Edit</a>
                                    <a class="btn-delete" href="{{ route('delete', $user->id) }}" onclick="return confirm('Are you sure you want to delete this user? This action cannot be undone.');">🗑️ Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-msg">📭 No users found. Click "Add New User" to create one.</div>
        @endif
    </div>
</div>
@endsection