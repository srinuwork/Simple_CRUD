@extends('layouts.custom')

@section('title', 'Edit Client')

@section('content')
<form class="form-container" action="{{ route('update') }}" method="POST">
    @csrf
    {{ method_field('PUT') }}

    <h1>Edit Client</h1>
    
    <div class="form-group">
        <label for="id">Client ID:</label>
        <input type="text" id="id" name="edit_id" value="{{ $user->id }}" readonly>
    </div>
    
    <div class="form-group">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="edit_form_name" placeholder="Enter client name" value="{{ old('edit_form_name', $user->name) }}" required>
    </div>
    
    <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="edit_form_email" placeholder="Enter client email" value="{{ old('edit_form_email', $user->email) }}" required>
    </div>
    
    <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="edit_form_phone" placeholder="Enter client phone" value="{{ old('edit_form_phone', $user->db_phone) }}" required>
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

    <button type="submit" class="btn-primary-form">Update Client</button>
    <div class="back-link"><a href="/">← Back to Dashboard</a></div>
</form>
@endsection