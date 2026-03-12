<x-guest-layout>
    <h1>Log In</h1>

    <!-- Session Status -->
    @if (session('status'))
        <div class="success-msg" style="margin-bottom: 16px;">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Enter your email">
            @error('email') <p style="color: var(--danger); font-size: 13px; margin-top: 5px;">{{ $message }}</p> @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
            @error('password') <p style="color: var(--danger); font-size: 13px; margin-top: 5px;">{{ $message }}</p> @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-group" style="display: flex; align-items: center; gap: 8px;">
            <input id="remember_me" type="checkbox" name="remember" style="width: auto;">
            <label for="remember_me" style="margin: 0; font-weight: 500;">Remember me</label>
        </div>

        <button type="submit" class="btn-primary-form">Log In</button>

        <div class="back-link" style="margin-top: 16px;">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot your password?</a>
            @endif
        </div>
        <div class="back-link" style="margin-top: 12px;">
            <a href="{{ route('register') }}">Don't have an account? Register</a>
        </div>
    </form>
</x-guest-layout>
