@extends('layouts.custom')

@section('title', 'Welcome')

@section('content')
<div class="view-container" style="text-align: center;">
    <h1>Welcome to the Application</h1>
    <p style="color: #555555; font-size: 1.1rem; margin-bottom: 2rem;">This is a simple welcome page.</p>
    <a href="{{ route('dashboard') }}" class="btn-primary-form" style="text-decoration: none; display: inline-block; width: auto; padding: 12px 24px;">Go to Dashboard</a>
</div>
@endsection