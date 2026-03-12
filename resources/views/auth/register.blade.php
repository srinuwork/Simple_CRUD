<x-guest-layout>
    <h1>Create Account</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Enter your full name">
            @error('name') <p style="color: var(--danger); font-size: 13px; margin-top: 5px;">{{ $message }}</p> @enderror
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Enter your email">
            @error('email') <p style="color: var(--danger); font-size: 13px; margin-top: 5px;">{{ $message }}</p> @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Create a password">
            @error('password') <p style="color: var(--danger); font-size: 13px; margin-top: 5px;">{{ $message }}</p> @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
            @error('password_confirmation') <p style="color: var(--danger); font-size: 13px; margin-top: 5px;">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn-primary-form">Register</button>

        <div class="back-link" style="margin-top: 16px;">
            <a href="{{ route('login') }}">Already have an account? Log in</a>
        </div>
    </form>
</x-guest-layout>
