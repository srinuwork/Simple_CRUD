@extends('layouts.custom')

@section('title', 'Create Client')

@section('content')
<form class="form-container" action="{{ route('store') }}" method="POST">
    @csrf
    <h1>Create New Client</h1>

    <div class="form-group">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="form_name" placeholder="Enter client name" value="{{ old('form_name') }}" required>
    </div>
    
    <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="form_email" placeholder="Enter client email" value="{{ old('form_email') }}" required>
    </div>

    <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="form_phone" placeholder="Enter client phone" value="{{ old('form_phone') }}" required>
    </div>
    
    @if ($errors->any())
        <div class="error-msg" style="background: #FEE2E2; color: #991B1B; padding: 15px; border-radius: 6px; margin-bottom: 20px; border-left: 5px solid #DC2626;">
            <ul style="margin-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <button type="submit" class="btn-primary-form">Create Client</button>
    <div class="back-link"><a href="/">← Back to Dashboard</a></div>
</form>
@endsection