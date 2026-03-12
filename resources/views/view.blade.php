@extends('layouts.custom')

@section('title', 'View Client')

@section('content')
<div class="view-container">
    <div class="badge">👁️ User Details</div>
    <h1>{{ $user->db_name }}</h1>
    
    <div class="info-group">
        <div class="info-label">Client ID</div>
        <div class="info-value">#{{ $user->id }}</div>
    </div>
    
    <div class="info-group">
        <div class="info-label">Full Name</div>
        <div class="info-value">{{ $user->name }}</div>
    </div>
    
    <div class="info-group">
        <div class="info-label">Email Address</div>
        <div class="info-value">{{ $user->email }}</div>
    </div>

    <div class="info-group">
        <div class="info-label">Phone Number</div>
        <div class="info-value">{{ $user->db_phone }}</div>
    </div>
    
    <div class="button-group">
        <a class="btn-view-action btn-view-edit" href="{{ route('edit', $user->id) }}">✏️ Edit User</a>
        <a class="btn-view-action btn-view-back" href="/">← Back to List</a>
    </div>
</div>
@endsection
