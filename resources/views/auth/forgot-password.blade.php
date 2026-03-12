<x-guest-layout>
    <h1>Forgot Password</h1>

    <p style="color: #555555; font-size: 14px; margin-bottom: 20px;">
        Forgot your password? No problem. Just enter your email below and we'll send you a password reset link.
    </p>

    @if (session('status'))
        <div class="success-msg" style="margin-bottom: 16px;">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email Address:</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your email">
            @error('email') <p style="color: var(--danger); font-size: 13px; margin-top: 5px;">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn-primary-form">Send Reset Link</button>

        <div class="back-link" style="margin-top: 16px;">
            <a href="{{ route('login') }}">← Back to Login</a>
        </div>
    </form>
</x-guest-layout>
